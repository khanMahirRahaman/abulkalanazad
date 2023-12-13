<?php

namespace App\DataTables;

use App\Models\AdPlacement;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PlacementDataTable extends DataTable
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
            ->addColumn('ad', function ($query) {
                if($query->ad()->exists()){
                    return $query->ad->name;
                }else{
                    return '';
                }
            })
            ->addColumn('active', function ($query) {
                $checked = $query->active == 'y' ? 'checked' : '';
                $id = $query->id;
                return view('admin.placement._checked', compact('checked', 'id'));
            })
            ->addColumn('action', function ($query) {
                return view('layouts.partials._action', [
                    'table'    => 'placement-table',
                    'model'    => $query,
                    'edit_url' => route('placements.edit', $query->id)
                ]);
            })
            ->rawColumns(['checkbox']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param AdPlacement $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AdPlacement $model)
    {
        return $model->with('ad')->latest()->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('placement-table')
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
                    $(".toggle-class").bootstrapToggle();
                    $(".toggle-class").change(function() {
                        var active = $(this).prop("checked") == true ? "y" : "n";
                        var id = $(this).data("id");
                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: "/admin/change-placement-active",
                            data: {"active": active, "id": id},
                            success: function(response) {
                                notification(response)
                            },
                            error: function(response) {
                                toastr.error(response.responseJSON.message, {timeOut: 5000})
                            }
                        })
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
            Column::make('id')->title('ID')
                ->addClass('text-center'),
            Column::make('name')->title(__('advertisement.column_name')),
            Column::make('ad')->title(__('advertisement.column_ad')),
            Column::computed('active')->title(__('advertisement.column_active')),
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
        return 'Placement_' . date('YmdHis');
    }
}
