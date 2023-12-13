<?php

namespace App\DataTables;

use App\Helpers\Languages;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\TranslationLoader\LanguageLine;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TranslationDataTable extends DataTable
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
                    <input type="checkbox" class="custom-control-input translation_checkbox" id="checkbox'.$query->id.'" name="translation_checkbox[]" value="'.$query->id.'"><label class="custom-control-label" for="checkbox'.$query->id.'"></label>
                </div>';
            })
            ->editColumn('text', function($query){
                $text = json_decode($query, true);
                $lang = is_null(request('filter')) || request('filter') == '0' ? Auth::user()->language : Languages::showCodeLanguage(request('filter'));
                return data_get($text['text'], $lang);
            })
            ->addColumn('action', function($query){
                return view('layouts.partials._action',[
                    'table'    => 'translation-table',
                    'model'    => $query,
                    'edit_url' => route('translations.edit', $query->id)
                ]);
            })
            ->rawColumns(['action','checkbox','translations']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param LanguageLine $model
     * @return Builder
     */
    public function query(LanguageLine $model)
    {
        DB::statement(DB::raw('set @rownum=0'));

        $data = $model->select(['*',
            DB::raw('@rownum  := @rownum  + 1 AS rownum')]);

        if($this->request->has('group')) {
            if(request('group') == '0') {
                return $data->newQuery();
            } else {
                $queries = $data->where('group', request('group'));
                return $queries->newQuery();
            }
        }
        return $data->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $script = '
        data.group = $("#translation-group").val();
        data.filter = $("#custom-filter").val()
        ';
        return $this->builder()
            ->setTableId('translation-table')
            ->columns($this->getColumns())
            ->minifiedAjax($url = '', $script, [])
            ->dom("<'row'<'col-sm-12 col-md-6 buttonAction'B><'col-sm-12 col-md-6'f>>" .
                "<'row'<'col-sm-12'tr>>" .
                "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'i><'col-sm-12 col-md-4'p>>")
            ->orderBy(1)
            ->parameters([
                'responsive' => true,
                'autoWidth' => false,
                'buttons'      => [
                    ['extend' => 'create', 'className' => 'btn btn-sm btn-info d-none', 'text' => '<i class="fa fa-plus"></i> '. __('localization.button_create')],
                ],
                'drawCallback' => 'function() {
                    "use strict";
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
            Column::make('group')->title(__('localization.column_group')),
            Column::make('key')->title(__('localization.column_key')),
            Column::make('text')->title(__('localization.column_text')),
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
        return 'Translation_' . date('YmdHis');
    }
}
