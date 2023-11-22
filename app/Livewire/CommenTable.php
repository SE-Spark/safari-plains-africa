<?php

namespace App\Livewire;

use App\Models\Blogcomment;
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

final class CommenTable extends PowerGridComponent
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
        return Blogcomment::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('id')
            ->addColumn('post_id')

           /** Example of custom column using a closure **/
            ->addColumn('post_id_lower', fn (Blogcomment $model) => strtolower(e($model->post_id)))

            ->addColumn('comment')
            ->addColumn('parent_id')
            ->addColumn('level')
            ->addColumn('lft')
            ->addColumn('rgt')
            ->addColumn('depth')
            ->addColumn('children_count')
            ->addColumn('created_by')
            ->addColumn('updated_by')
            ->addColumn('approved')
            ->addColumn('created_at_formatted', fn (Blogcomment $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Id', 'id'),
            Column::make('Post id', 'post_id')
                ->sortable()
                ->searchable(),

            Column::make('Comment', 'comment')
                ->sortable()
                ->searchable(),

            Column::make('Parent id', 'parent_id'),
            Column::make('Level', 'level'),
            Column::make('Lft', 'lft'),
            Column::make('Rgt', 'rgt'),
            Column::make('Depth', 'depth'),
            Column::make('Children count', 'children_count'),
            Column::make('Created by', 'created_by'),
            Column::make('Updated by', 'updated_by'),
            Column::make('Approved', 'approved')
                ->toggleable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('post_id')->operators(['contains']),
            Filter::inputText('comment')->operators(['contains']),
            Filter::boolean('approved'),
            Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(\App\Models\Blogcomment $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: '.$row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
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
