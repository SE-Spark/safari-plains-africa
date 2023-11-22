<?php

namespace App\Livewire;

use App\Models\User;
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

final class UserTable extends PowerGridComponent
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
        return User::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('first_name')

           /** Example of custom column using a closure **/
            ->addColumn('first_name_lower', fn (User $model) => strtolower(e($model->first_name)))

            ->addColumn('last_name')
            ->addColumn('email')
            ->addColumn('phone')
            ->addColumn('is_staff', fn (User $model) => $model->is_staff?'Yes':'No')
            ->addColumn('created_at_formatted', fn (User $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('First name', 'first_name')
                ->sortable()
                ->searchable(),

            Column::make('Last name', 'last_name')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Phone', 'phone')
                ->sortable()
                ->searchable(),

            Column::make('Is staff', 'is_staff'),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('first_name')->operators(['contains']),
            Filter::inputText('last_name')->operators(['contains']),
            Filter::inputText('email')->operators(['contains']),
            Filter::inputText('phone')->operators(['contains']),
            Filter::boolean('is_staff'),
            // Filter::datetimepicker('created_at'),
        ];
    }


    public function actions(\App\Models\User $row): array
    {
        return [
            Button::add('edit')
                ->slot('<i class="bi bi-pencil-fill text-success"></i>')
                ->class('btn btn-transparent')
                ->dispatch('editUser', ['rowId' => $row->id]),
            Button::add('delete')
                ->slot('<i class="bi bi-trash-fill text-danger"></i>')
                ->id()
                ->class('btn btn-transparent')
                ->dispatch('deleteUser', ['rowId' => $row->id]),
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
