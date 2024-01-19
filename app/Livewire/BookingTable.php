<?php

namespace App\Livewire;

use App\Models\{Bookings, Booking_Items, Packages};
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class BookingTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        // $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        $query = Bookings::query();
        if (!\App\Helpers\HP::isAdmin()) {            
            $userId = Auth::id();
            $query = $query->where('customer_id', $userId);
        }

        return $query;
    }
    public function isAdmin (){return \App\Helpers\HP::isAdmin();}

    public function relationSearch(): array
    {
        return [
            'package' => [
                'name',
            ],
            'bookItem' => [
                'title',
            ],
        ];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('booking_date_from_formatted', fn (Bookings $model) => Carbon::parse($model->booking_date_from)->format('d/m/Y'))
            ->addColumn('booking_date_to_formatted', fn (Bookings $model) => Carbon::parse($model->booking_date_to)->format('d/m/Y'))
            ->addColumn('package.name')
            ->addColumn('bookItem.title')
            ->addColumn('number_of_people')
            ->addColumn('status', fn (Bookings $model) => $model->status == 1 ? 'Approved' : ($model->status == 2 ? 'Rejected' : 'Pending'))
            ->addColumn('created_at_formatted', fn (Bookings $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        $isAdmin = \App\Helpers\HP::isAdmin();

        $actionColumn = $isAdmin
            ? Column::action('Action')
            : Column::action('Action')->hidden();
        return [
            Column::make('Booking date from', 'booking_date_from_formatted', 'booking_date_from')
                ->sortable(),
            Column::make('Booking date to', 'booking_date_to_formatted', 'booking_date_to')
                ->sortable(),
            Column::make('Package', 'package.name')
                ->searchable(),
            Column::make('Booking', 'bookItem.title')
                ->searchable(),
            Column::make('Number of people', 'number_of_people'),
            Column::make('Status', 'status'),
            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),
            $actionColumn
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('booking_date_from'),
            Filter::datepicker('booking_date_to'),
            Filter::select('package.name', 'package_id')
                ->dataSource(Packages::all())
                ->optionValue('id')
                ->optionLabel('name'),
            Filter::select('bookItem.title', 'booking_item_id')
                ->dataSource(Booking_Items::all())
                ->optionValue('id')
                ->optionLabel('name'),
            Filter::datetimepicker('created_at'),
        ];
    }

    public function actions(\App\Models\Bookings $row): array
    {
        if(!$this->isAdmin())return [];
        
        return [
            Button::add('edit')
                ->slot('<i class="bi bi-pencil-fill text-success"></i>')
                ->id()
                ->class('btn btn-transparent')
                ->dispatch('editBooking', ['rowId' => $row->id]),
            Button::add('delete')
                ->slot('<i class="bi bi-trash-fill text-danger"></i>')
                ->id()
                ->class('btn btn-transparent')
                ->dispatch('deleteBooking', ['rowId' => $row->id]),
        ];
    }

    // public function actionRules($row): array
    // {
    //    return [
    //         // Hide button edit for ID 1
    //         Rule::button('edit')
    //             ->when(fn($row) => $row->id === 1)
    //             ->hide(),
    //     ];
    // }
}
