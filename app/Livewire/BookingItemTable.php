<?php

namespace App\Livewire;

use App\Helpers\HP;
use App\Models\{Booking_Items, Booking_Items_Type};
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
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

final class BookingItemTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

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
        return Booking_Items::query();
    }

    public function relationSearch(): array
    {
        return [
            'category' => [
                'name',
            ],
        ];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('title')
            ->addColumn('description')
            ->addColumn('img_url', function (Booking_Items $model) {
                return HP::renderImg($model->img_url);
            })
            ->addColumn('category.name')
            ->addColumn('booking_date_from')
            ->addColumn('booking_date_to')
            ->addColumn('number_of_people')
            ->addColumn('status', fn (Booking_Items $model) => $model->status == 1 ? 'Active' : 'Inactive');
    }

    public function columns(): array
    {
        return [
            Column::make('Title', 'title')
                ->sortable()
                ->searchable(),

            Column::make('Description', 'description')
                ->sortable()
                ->searchable(),

            Column::make('Image', 'img_url'),

            Column::make('category', 'category.name'),

            Column::make('Date From', 'booking_date_from')
                ->sortable()
                ->searchable(),

            Column::make('Date To', 'booking_date_to')
                ->sortable()
                ->searchable(),

            Column::make('Persons', 'number_of_people'),

            Column::make('Status', 'status'),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('title')->operators(['contains']),
            Filter::boolean('status'),
            Filter::select('category.name', 'booking_item_type_id')
                ->dataSource(Booking_Items_Type::all())
                ->optionValue('id')
                ->optionLabel('name'),
        ];
    }

    public function actions(\App\Models\Booking_Items $row): array
    {
        return [
            Button::add('edit')
                ->slot('<i class="bi bi-pencil-fill text-success"></i>')
                ->id()
                ->class('btn btn-transparent')
                ->dispatch('editPackage', ['rowId' => $row->id]),
            Button::add('delete')
                ->slot('<i class="bi bi-trash-fill text-danger"></i>')
                ->id()
                ->class('btn btn-transparent')
                ->dispatch('deletePackage', ['rowId' => $row->id]),
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
