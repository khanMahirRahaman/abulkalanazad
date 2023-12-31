<?php

namespace App\DataTables;

use App\Models\Socialmedia;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SocialmediaDataTable extends DataTable
{
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
                    <input type="checkbox" class="custom-control-input socialmedia_checkbox" id="checkbox'.$query->id.'" name="socialmedia_checkbox[]" value="'.$query->id.'"><label class="custom-control-label" for="checkbox'.$query->id.'"></label>
                </div>';
            })
            ->addColumn('action', function ($query) {
                return view('layouts.partials._action', [
                    'table'    => 'socialmedia-table',
                    'model'    => $query,
                    'del_url'  => route('socialmedia.destroy', $query->id),
                    'edit_url' => route('socialmedia.update', $query->id)
                ]);
            })
            ->rawColumns(['checkbox']);;
    }

    /**
     * Get query source of dataTable.
     *
     * @param Socialmedia $model
     * @return Builder
     */
    public function query(Socialmedia $model)
    {
        return $model->latest()->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('socialmedia-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" .
                "<'row'<'col-sm-12'tr>>" .
                "<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>")
            ->orderBy(1)
            ->parameters([
                'responsive' => true,
                'autoWidth' => false,

                'drawCallback' => 'function() {
                    $(".link-edit").click(function(e) {
                        e.preventDefault()
                        editurl = $(this).attr("href")
                        query = $(this).data("model")
                        $("#name").val(query.name)
                        $("#url").val(query.url)
                        $("#icon").val(query.icon)
                        $("#color").val(query.color)
                        $("#basic-addon2").html("<i class=\'"+query.icon+"\'></i>")
                        $("#cp2 i").css("background", query.color);
                        $("input").removeClass("is-invalid")

                        $("#btn-reset").removeAttr("hidden")
                        $("#btn-submit").attr("id","btn-update");
                        $("button[type=submit]").html("'.__('socialmedia.button_update').'")
                    })

                    $(".delete").click(function() {
                        table = $(this).data("table");
                        url   = $(this).data("url");
                        sweetalert2(table,url);
                    })

                    $("#bulk_delete").click(function() {
                        url         = $(this).data("url");
                        table       = "socialmedia-table";
                        selectClass = "socialmedia_checkbox";
                        multiDelCheckbox(table,url,selectClass);
                    })

                    $("#selectAll").on("click", function(e) {
                        if ($(this).is( ":checked" )) {
                            $(".socialmedia_checkbox").prop("checked",true);
                        } else {
                            $(".socialmedia_checkbox").prop("checked",false);
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
                ->footer('<button type="button" name="bulk_delete" id="bulk_delete" class="btn btn btn-xs btn-danger" data-url="'.route('socialmedia.massdestroy').'">'.__('general.delete').'</button>'),
            Column::make('icon')->title(__('socialmedia.column_icon')),
            Column::make('name')->title(__('socialmedia.column_name')),
            Column::make('url')->title(__('socialmedia.column_url')),
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
        return 'Socialmedia_' . date('YmdHis');
    }
}
