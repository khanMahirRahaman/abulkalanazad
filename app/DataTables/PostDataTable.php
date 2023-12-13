<?php

namespace App\DataTables;

use App\Models\{Post, User};
use App\Services\ArticleService;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Auth;
use App\Helpers\{Languages, Settings};
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder;

class PostDataTable extends DataTable
{
    protected $actions = ['sql'];

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('checkbox', function($query){
                return '<div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input post_checkbox" id="checkbox'.$query->id.'" name="post_checkbox[]" value="'.$query->id.'"><label class="custom-control-label" for="checkbox'.$query->id.'"></label>
                </div>';
            })
            ->editColumn('post_title', function ($query) {
                if ($query->post_visibility === 'private') {
                    $visibility = "&mdash; <i class='fas fa-lock text-info'></i>";
                } else {
                    $visibility = "";
                }
                return "<a href='" . Settings::linkPost($query) . "' target='_blank'>" . $query->post_title . "</a> $visibility";
            })
            ->addColumn('category', function ($query) {
                return $query->terms()->category()->get()->map(function ($term) {
                        return $term->name;
                    })->implode(', ');
            })
            ->addColumn('tag', function ($query) {
                return $query->terms()->tag()->get()->map(function ($term) {
                    return $term->name;
                })->implode(', ');
            })
            ->addColumn('date', function ($query) {
                return $query->created_at->format('Y/m/d h:m a');
            })
            ->addColumn('action', function ($query) {
                $action = [
                    'table' => 'post-table',
                    'model' => $query,
                ];

                if ( Auth::user()->hasRole(['super-admin']) ) {
                    $action['del_url'] = route('posts.destroy', $query->id);
                    $action['edit_url'] = route('posts.edit', $query->id);
                }

                if( Auth::id() == $query->post_author ){
                    $action['del_url'] = route('posts.destroy', $query->id);
                    $action['edit_url'] = route('posts.edit', $query->id);
                }

                if ( User::findOrFail($query->post_author)->getRoleNames()->first() == 'author' ) {
                    if ( Auth::user()->can('delete-post-author') ) {
                        $action['del_url'] = route('posts.destroy', $query->id);
                    }

                    if ( Auth::user()->can('edit-post-author') ) {
                        $action['edit_url'] = route('posts.edit', $query->id);
                    }
                }

                return view('layouts.partials._action', $action);
            })
            ->rawColumns(['post_title','checkbox']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Post $model
     * @return Builder
     */
    public function query(ArticleService $article, Post $model)
    {
        $posts = $model::article();

        $q = (is_null(request('filter')) || request('filter') == '0')
                ? $posts->languageCurrentAuthSession() 
                : $posts->wherePostLanguage(request('filter'));

        return Auth::user()->hasRole('super-admin') 
                ? $q->latest()->newQuery()
                : $article->qryDataTable($q);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $script = 'data.filter = $("#custom-filter").val()';
        return $this->builder()
            ->setTableId('post-table')
            ->columns($this->getColumns())
            ->minifiedAjax($url='', $script, [])
            ->dom("<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" .
                "<'row'<'col-sm-12'tr>>" .
                "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'i><'col-sm-12 col-md-4'p>>")
            ->orderBy(1)
            ->buttons(
                Button::make('create')->className('btn btn-sm btn-info')->text(__('post.button_create'))
            )
            ->parameters([
                'responsive' => true,
                'autoWidth' => false,
                'drawCallback' => 'function() {
                    "use strict";

                    $(".delete").on("click", function() {
                        let table = $(this).data("table");
                        let url = $(this).data("url");
                        sweetalert2(table, url);
                    })

                    $("#bulk_delete").on("click", function() {
                        let url = $(this).data("url");
                        let table = "post-table";
                        let selectClass = "post_checkbox";
                        multiDelCheckbox(table, url, selectClass);
                    })

                    $("#selectAll").on( "click", function(e) {
                        if ($(this).is( ":checked" )) {
                            $(".post_checkbox").prop("checked",true);
                        } else {
                            $(".post_checkbox").prop("checked",false);
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
                ->footer('<button type="button" name="bulk_delete" id="bulk_delete" class="btn btn btn-xs btn-danger" data-url="'.route('posts.massdestroy').'">'.__('general.delete').'</button>'),
            Column::make('post_title')->title(__('post.column_title')),
            Column::make('user.name')->title(__('post.column_author')),
            Column::make('category')->title(__('post.column_category')),
            Column::make('tag')->title(__('post.column_tag')),
            Column::make('date')->title(__('post.column_date')),
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
        return 'Post_' . date('YmdHis');
    }
}
