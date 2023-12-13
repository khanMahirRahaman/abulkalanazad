<?php

namespace App\DataTables;

use App\Models\Advertisement;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AdvertisementDataTable extends DataTable
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
                    <input type="checkbox" class="custom-control-input ad_checkbox" id="checkbox'.$query->id.'" name="ad_checkbox[]" value="'.$query->id.'"><label class="custom-control-label" for="checkbox'.$query->id.'"></label>
                </div>';
            })
            ->addColumn('active', function ($query) {
                $checked = $query->active == 'y' ? 'checked' : '';
                $id = $query->id;
                return view('admin.advertisement._checked', compact('checked', 'id'));
            })
            ->addColumn('action', function ($query) {
                return view('layouts.partials._action', [
                    'table' => 'ad-table',
                    'model' => $query,
                    'edit_url' => route('advertisement.edit', $query->id),
                    'del_url' => route('advertisement.destroy', $query->id),
                ]);
            })
            ->rawColumns(['checkbox','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Advertisement $model
     * @return Builder
     */
    public function query(Advertisement $model)
    {
        return $model->latest()->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('ad-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" .
                "<'row'<'col-sm-12'tr>>" .
                "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'i><'col-sm-12 col-md-4'p>>")
            ->orderBy(1)
            ->buttons(
                Button::make('create')->className('btn btn-sm btn-info')->text(__('advertisement.button_addnew_unit'))
            )
            ->parameters([
                'responsive' => true,
                'autoWidth' => false,

                'drawCallback' => 'function() {

                    $(".delete").on("click", function() {
                        let table = $(this).data("table");
                        let url = $(this).data("url");
                        sweetalert2(table, url);
                    })

                    $("#bulk_delete").on("click", function() {
                        let url = $(this).data("url");
                        let table = "ad-table";
                        let selectClass = "ad_checkbox";
                        multiDelCheckbox(table, url, selectClass);
                    })

                    $("#selectAll").on( "click", function(e) {
                        if ($(this).is( ":checked" )) {
                            $(".ad_checkbox").prop("checked",true);
                        } else {
                            $(".ad_checkbox").prop("checked",false);
                        }
                    })

                    $(".toggle-class").bootstrapToggle();
                    $(".toggle-class").change(function() {
                        var active = $(this).prop("checked") == true ? "y" : "n";
                        var id = $(this).data("id");

                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: "/admin/change-ad-active",
                            data: {"active": active, "id": id},
                            success: function(response) {
                                notification(response)
                            }
                        })
                    })
                }'
            ]);
    }

    public function custom()
    {
        return 'custom';
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
                ->addClass('text-center')
                ->footer('<button type="button" name="bulk_delete" id="bulk_delete" class="btn btn btn-xs btn-danger" data-url="'.route('ads.massdestroy').'">'.__('general.delete').'</button>'),
            Column::make('name')->title(__('advertisement.column_name')),
            Column::make('size')->title(__('advertisement.column_size')),
            Column::make('active')->title(__('advertisement.column_status')),
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
        return 'Ad_' . date('YmdHis');
    }
}
