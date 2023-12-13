<?php

namespace App\DataTables;

use App\Helpers\Languages;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PageDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract|EloquentDataTable
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('checkbox', function($query){
                return '<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input page_checkbox" id="checkbox'.$query->id.'" name="page_checkbox[]" value="'.$query->id.'"><label class="custom-control-label" for="checkbox'.$query->id.'"></label>
                </div>';
            })
            ->editColumn('post_title', function ($query) {
                return "<a href='" . route('page.show', $query) . "' target='_blank'>" . $query->post_title . "</a>";
            })
            ->addColumn('action', function ($query) {
                return view('layouts.partials._action', [
                    'table'    => 'page-table',
                    'model'    => $query,
                    'del_url'  => route('pages.destroy', $query->id),
                    'edit_url' => route('pages.edit', $query->id)
                ]);
            })
            ->rawColumns(['post_title','checkbox']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Post $model
     * @return Builder
     */
    public function query(Post $model)
    {
        $pages = Post::page()->with('user');
            if(is_null(request('filter')) || request('filter') == '0') {
                $q = $pages->languageCurrentAuthSession();
            } else {
                $q = $pages->wherePostLanguage(request('filter'));
            }
            return $q->latest()->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return Builder
     */
    public function html()
    {
        $script = 'data.filter = $("#custom-filter").val()';
        return $this->builder()
            ->setTableId('page-table')
            ->columns($this->getColumns())
            ->minifiedAjax($url='', $script, [])
            ->dom("<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" .
                "<'row'<'col-sm-12'tr>>" .
                "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'i><'col-sm-12 col-md-4'p>>")
            ->orderBy(1)
            ->buttons(
                Button::make('create')->className('btn btn-sm btn-info')->text(__('page.button_create'))
            )
            ->parameters([
                'responsive' => true,
                'autoWidth' => false,

                'drawCallback' => 'function() {
                    $(".delete").click(function() {
                        table = $(this).data("table");
                        url = $(this).data("url");
                        sweetalert2(table,url);
                    })

                    $("#bulk_delete").click(function() {
                        url = $(this).data("url");
                        table = "page-table";
                        selectClass = "page_checkbox";
                        multiDelCheckbox(table,url,selectClass);
                    })

                    $("#selectAll").on( "click", function(e) {
                        if ($(this).is( ":checked" )) {
                            $(".page_checkbox").prop("checked",true);
                        } else {
                            $(".page_checkbox").prop("checked",false);
                        }
                    })

                }'
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('checkbox')
                ->title('')
                ->footer('<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="selectAll"><label class="custom-control-label" for="selectAll"></label></div>')
                ->addClass('text-center')
                ->orderable(false)
                ->searchable(false)
                ->width(3),
            Column::make('id')->title('ID')
                ->footer('<button type="button" name="bulk_delete" id="bulk_delete" class="btn btn btn-xs btn-danger" data-url="'.route('pages.massdestroy').'">'.__('general.delete').'</button>'),
            Column::make('post_title')->title(__('page.column_title')),
            Column::make('post_name')->title(__('page.column_slug')),
            Column::computed('action')->title(__('general.action'))
                ->addClass('text-center')
                ->width(60),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Page_' . date('YmdHis');
    }
}
