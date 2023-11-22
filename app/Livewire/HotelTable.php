<?php

namespace App\Livewire;

use App\Models\Hotels;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Blade;
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

final class HotelTable extends PowerGridComponent
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
        return Hotels::query();
    }

    public function relationSearch(): array
    {
        return [];
    }


    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('name')
            ->addColumn('address')
            ->addColumn('star_rating', function (Hotels $model) {
                $i=0;
                $content = '';
                for($i;$i < $model->star_rating; $i++){
                    $content .='<svg class="bi bi-star-fill" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 12.912l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L8 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                    </svg>';
                }

                return  Blade::render(<<<HTML
                    $content 
                HTML);
            })
            ->addColumn('description')
            ->addColumn('status', fn (Hotels $model) => $model->status == 1 ? 'Active' : 'Inactive')
            ->addColumn('created_at_formatted', fn (Hotels $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Address', 'address')
                ->sortable()
                ->searchable(),

            Column::make('Star rating', 'star_rating'),
            // ->customView('livewire.powergrid.rating-column'),
            Column::make('Description', 'description')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'status'),
            // ->toggleable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('name')->operators(['contains']),
            Filter::inputText('address')->operators(['contains']),
            Filter::inputText('description')->operators(['contains']),
            Filter::boolean('status'),
            // Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(\App\Models\Hotels $row): array
    {
        return [
            Button::add('edit')
                ->slot('<i class="bi bi-pencil-fill text-success"></i>')
                ->id()
                ->class('btn btn-transparent')
                ->dispatch('editHotel', ['rowId' => $row->id]),
            Button::add('delete')
                ->slot('<i class="bi bi-trash-fill text-danger"></i>')
                ->id()
                ->class('btn btn-transparent')
                ->dispatch('deleteHotel', ['rowId' => $row->id]),
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
