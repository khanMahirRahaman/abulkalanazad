<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
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
                    <input type="checkbox" class="custom-control-input user_checkbox" id="checkbox'.$query->id.'" name="user_checkbox[]" value="'.$query->id.'"><label class="custom-control-label" for="checkbox'.$query->id.'"></label>
                </div>';
            })
            ->addColumn('roles', function($query) {
                foreach ($query->getRoleNames() as $role) {
                    $roles[] =  "<small class='badge badge-success'>$role</small>";
                }
                return implode(' ', $roles);
            })
            ->addColumn('active', function ($query) {
                if ($query->getAttributeValue('banned_at')  == null) {
                    return "<small class='badge badge-success'>".__('Active')."</small>";
                } else {
                    return "<small class='badge badge-danger'>".__('Blocked') ."</small>";
                }
            })
            ->addColumn('action', function ($query) {
                $action = [
                    'table' => 'user-table',
                    'model' => $query,
                ];

                if (Auth::User()->hasRole('super-admin')) {
                    if (!$query->hasRole('super-admin')){
                        $action['del_url'] = route('users.destroy', $query);
                        $action['edit_url'] = route('users.edit', $query);
                    }
                } elseif (Auth::User()->hasRole(['admin'])) {
                    if (!$query->hasRole('super-admin') OR Auth::id() == $query->id) {
                        $action['del_url'] = route('users.destroy', $query);
                        $action['edit_url'] = route('users.edit', $query);
                    }
                } else {
                    if (!$query->hasRole('super-admin') OR !$query->hasRole('admin') OR Auth::id() == $query->id) {
                        $action['del_url'] = route('users.destroy', $query);
                        $action['edit_url'] = route('users.edit', $query);
                    }
                }
                return view('layouts.partials._action', $action);
            })
            ->rawColumns(['roles','checkbox','active']);;
    }

    /**
     * Get query source of dataTable.
     *
     * @param User $model
     * @return Builder
     */
    public function query(User $model): Builder
    {
        $roles = $model->showRoles();

        return Auth::user()->hasRole('super-admin') ?
            $model->with('roles')->latest()->newQuery() :
            $model->role($roles)->with('roles')->latest()->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('user-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" .
                "<'row'<'col-sm-12'tr>>" .
                "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'i><'col-sm-12 col-md-4'p>>")
            ->orderBy(1)
            ->buttons(
                Button::make('create')->className('btn btn-sm btn-info')->text(__('user.button_create'))
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
                        let table = "user-table";
                        let selectClass = "user_checkbox";
                        multiDelCheckbox(table, url, selectClass);
                    })

                    $("#selectAll").on("click", function(e) {
                        if ($(this).is( ":checked" )) {
                            $(".user_checkbox").prop("checked",true);
                        } else {
                            $(".user_checkbox").prop("checked",false);
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
            Column::make('name')->title(__('user.column_name'))
                ->footer('<button type="button" name="bulk_delete" id="bulk_delete" class="btn btn btn-xs btn-danger" data-url="'.route('users.massdestroy').'">'.__('general.delete').'</button>'),
            Column::make('roles')->title(__('user.column_roles')),
            Column::make('active')->title(__('user.column_status'))->orderable(false),
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
        return 'Users_' . date('YmdHis');
    }
}
