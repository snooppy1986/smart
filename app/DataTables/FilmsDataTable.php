<?php

namespace App\DataTables;

use App\Models\Film;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FilmsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('image', function ($film){
                $name = $film->image;
                $html = "<img src=\"".asset('storage/images/'.$name)."\" width=\"100\">";
                return $html;
            })
            ->addColumn('is_visible', function ($film){
                $checked = $film->is_visible ? 'checked' : ' ';
                return "<div class=\"form-check form-switch\">
                            <input class=\"form-check-input status\"
                                type=\"checkbox\" id=\"flexSwitchCheckChecked\"
                                attr_id = $film->id
                                $checked>
                        </div>";
            })
            ->addColumn('action', function ($film){
                $btn = '';
                $btn = $btn.'<a href="'.route('film.edit', ['film' => $film->id]).'"
                                class="d-block btn btn-primary btn-sm w-50 mb-1"
                                style="width: 30px; margin-right: 10px">
                                    Изменить <i class="fas fa-edit"></i>
                            </a>
                            <button id="delete"
                                class="d-block btn btn-danger btn-sm w-50 mb-1"
                                style="width: 30px; margin-right: 10px"
                                attr_id="'.$film->id.'"
                                >
                                    Удалить <i class="fas fa-edit"></i>
                            </button>'
                ;

                $html = '<div class="row">'.$btn.'</div>';
                return $html;
            })
            ->rawColumns(['image', 'is_visible', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Film $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('films')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        /*Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')*/
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')
                ->addClass('text-center align-middle'),
            Column::make('title')
                ->addClass('text-center align-middle'),
            Column::make('is_visible')
                ->addClass('text-center align-middle'),
            Column::make('image'),
            Column::make('action')
                ->addClass('text-center align-middle'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Films_' . date('YmdHis');
    }
}
