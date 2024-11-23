<?php

namespace App\DataTables;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class GenresDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($genre){
                $btn = '';
                $btn = $btn.'<a href="'.route('genre.edit', ['genre' => $genre->id]).'"
                                class="d-block btn btn-primary btn-sm w-50 mb-1"
                                style="width: 30px; margin-right: 10px">
                                    Изменить <i class="fas fa-edit"></i>
                            </a>
                            <button id="delete"
                                class="d-block btn btn-danger btn-sm w-50 mb-1"
                                style="width: 30px; margin-right: 10px"
                                attr_id="'.$genre->id.'"
                                >
                                    Удалить <i class="fas fa-edit"></i>
                            </button>'
                ;

                $html = '<div class="row">'.$btn.'</div>';
                return $html;
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Genre $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('genres-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('title')->addClass('text-center'),
            Column::make('action')->addClass('d-flex flex-row-reverse'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Genres_' . date('YmdHis');
    }
}
