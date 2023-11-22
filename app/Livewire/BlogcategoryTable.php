<?php

namespace App\Livewire;

use App\Models\Blogcategory;
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

final class BlogcategoryTable extends PowerGridComponent
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
        return Blogcategory::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('name')
            ->addColumn('description')
            ->addColumn('status', fn(Blogcategory $model) => $model->status==1?'Active':'IN Active');
            // ->addColumn('created_at_formatted', fn (Blogcategory $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Description', 'description')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'status'),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('name')->operators(['contains']),
            Filter::inputText('description')->operators(['contains']),
            Filter::boolean('status'),
            // Filter::datetimepicker('created_at'),
        ];
    }


    public function actions(\App\Models\Blogcategory $row): array
    {
        return [
            Button::add('edit')
                ->slot('<i class="bi bi-pencil-fill text-success"></i>')
                ->id()
                ->class('btn btn-transparent')
                ->dispatch('editCategory', ['rowId' => $row->id]),
                
            Button::add('delete')
                ->slot('<i class="bi bi-trash-fill text-danger"></i>')
                ->id()
                ->class('btn btn-transparent')
                ->dispatch('deleteCategory', ['rowId' => $row->id]),
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
