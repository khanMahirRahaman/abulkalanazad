<?php

namespace App\DataTables;

use App\Models\Language;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class LanguagesDataTable extends DataTable
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
                    <input type="checkbox" class="custom-control-input language_checkbox" id="checkbox'.$query->id.'" name="language_checkbox[]" value="'.$query->id.'"><label class="custom-control-label" for="checkbox'.$query->id.'"></label>
                </div>';
            })
            ->addColumn('country', function($query){
                return '<img src="'.asset('vendor/flag-icons/flags/4x3/'.strtolower($query->country_code).'.svg').'" style="width:2rem">';
            })
            ->addColumn('active', function ($query) {
                $checked = $query->active == 'y' ? 'checked' : '';
                $code = $query->language_code;
                $default = $query->default == 'y' ? 'checked' : '';
                return view('admin.language._active', compact('checked', 'code', 'default'));
            })
            ->addColumn('default', function ($query) {
                $checked = $query->default == 'y' ? 'checked' : '';
                $item = $query->language_code;
                return view('admin.language._default', compact('checked', 'item'));
            })
            ->addColumn('action', function($query){
                return view('admin.language._action',[
                    'table'    => 'languages-table',
                    'model'    => $query,
                    'default'  => $query->default,
                    'del_url'  => route('languages.destroy', $query),
                    'edit_url' => route('languages.edit', $query)
                ]);
            })
            ->rawColumns(['active','checkbox','country']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Language $model
     * @return Builder
     */
    public function query(Language $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('languages-table')
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
                    $(".toggle-class, .toggle-class-default").bootstrapToggle();
                    $(".toggle-class").change(function() {
                        var status = $(this).prop("checked") == true ? "y" : "n";
                        var code = $(this).data("code");
                        $.ajax({
                            type: "PATCH",
                            dataType: "json",
                            url: "/admin/manage/languages/"+code+"/active",
                            data: {"set": status},
                            success: function(response) {
                                notification(response);
                            },
                            error: function(data) {
                                 notification(response);
                            }
                        })
                    })

                    $(".default").on("click", function() {
                        var item = $(this).data("item");
                        $.ajax({
                            type: "PATCH",
                            dataType: "json",
                            url: "/admin/manage/languages/"+item+"/default",
                            success: function(response) {
                                notification(response);
                                $("#languages-table").DataTable().ajax.reload();
                            }
                        })
                    })

                    $(".delete").on("click", function() {
                        let table = $(this).data("table");
                        let url = $(this).data("url");
                        sweetalert2(table, url);
                    })

                    $("#bulk_delete").on("click", function() {
                        let url = $(this).data("url");
                        let table = "languages-table";
                        let selectClass = "language_checkbox";
                        multiDelCheckbox(table, url, selectClass);
                    })

                    $("#selectAll").on( "click", function(e) {
                        if ($(this).is( ":checked" )) {
                            $(".language_checkbox").prop("checked",true);
                        } else {
                            $(".language_checkbox").prop("checked",false);
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
            Column::make('id')->title(__('ID'))
                ->footer('<button type="button" name="bulk_delete" id="bulk_delete" class="btn btn btn-xs btn-danger" data-url="'.route('languages.massdestroy').'">'. __('general.delete') .'</button>'),
            Column::make('language')->title(__('localization.column_language')),
            Column::make('country')->title(__('localization.column_country')),
            Column::make('active')
                ->orderable(false)
                ->searchable(false)
                ->title(__('localization.column_active')),
            Column::make('default')
                ->orderable(false)
                ->searchable(false)
                ->title(__('localization.column_default')),
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
        return 'Languages_' . date('YmdHis');
    }
}
