<?php

namespace App\Livewire;

use App\Helpers\HP;
use App\Models\{Blogpost, Blogcategory};
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

final class PostTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()
                ->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Blogpost::query();
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
            ->addColumn('image_url', function (Blogpost $model) {
                return HP::renderImg($model->image_url);
            })
            ->addColumn('content', fn (Blogpost $model) => $model->content)
            // ->addColumn('is_published')
            ->addColumn('is_published', fn (Blogpost $model) => (int) $model->is_published == 1 ? 'Published' : 'Not Published')
            // ->addColumn('category_name', fn (Blogpost $model) => e($model->category->name));
            ->addColumn('category.name');
        // ->addColumn('created_at_formatted', fn (Blogpost $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Title', 'title')
                ->sortable()
                ->searchable(),

            Column::make('Image url', 'image_url')
                ->sortable()
                ->searchable(),

            Column::make('Content', 'content')
                ->sortable()
                ->searchable(),

            Column::make('Is published', 'is_published')
                // ->toggleable(true, 'Yes', 'No')
                ->searchable(),
            Column::make('Category', 'category.name')
                ->sortable()
                ->searchable(),

            // Column::make('Created at', 'created_at_formatted', 'created_at')
            //     ->sortable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('title')->operators(['contains']),
            Filter::boolean('is_published'),
            Filter::select('category.name', 'blogcategory_id')
                ->dataSource(Blogcategory::all())
                ->optionValue('id')
                ->optionLabel('name'),
            // Filter::datetimepicker('created_at'),
        ];
    }

    public function actions(\App\Models\Blogpost $row): array
    {
        return [
            Button::add('edit')
                ->slot('<i class="bi bi-pencil-fill text-success"></i>')
                ->class('btn btn-transparent')
                ->route('admin.post.edit', ['selection' => $row->id]),
                
            Button::add('delete')
                ->slot('<i class="bi bi-trash-fill text-danger"></i>')
                ->id()
                ->class('btn btn-transparent')
                ->dispatch('deleteId', ['destinationId' => $row->id]),
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
