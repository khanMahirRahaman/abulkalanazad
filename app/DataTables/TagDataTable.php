<?php

namespace App\DataTables;

use App\Helpers\Languages;
use App\Models\Term;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TagDataTable extends DataTable
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
                    <input type="checkbox" class="custom-control-input tag_checkbox" id="checkbox'.$query->id.'" name="tag_checkbox[]" value="'.$query->id.'"><label class="custom-control-label" for="checkbox'.$query->id.'"></label>
                </div>';
            })
            ->addColumn('action', function ($query) {
                $lang = (is_null(request('filter')) || request('filter') == '0') ?
                    Languages::codeSession() : request('filter');

                $showTranslations = $query->translation;

                if($showTranslations){
                    $translations = json_decode($query->translation, true);
                    foreach($translations as $key => $value) {
                        $translations[$key] = Term::tag()->firstWhere('slug', $value)->name;
                    }
                    $showTranslations = json_encode($translations);
                }

                return view('admin.tag._action', [
                    'table'    => 'tag-table',
                    'lang'     => $lang,
                    'model'    => collect($query)->merge(['show_translations' => $showTranslations]),
                    'del_url'  => route('tags.destroy', $query),
                    'edit_url' => route('tags.update', $query)
                ]);
            })
            ->rawColumns(['action','checkbox']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Term $model
     * @return Builder
     */
    public function query(Term $model)
    {
        if(is_null(request('filter')) || request('filter') == '0') {
            $reqLanguage = Languages::showIdLangSession();
        } else {
            $reqLanguage = request('filter');
        }

        return Term::select('id', 'name', 'slug', 'description', 'translation')
            ->tag()
            ->where('language_id', $reqLanguage)
            ->latest()
            ->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $script = 'data.filter = $("#custom-filter").val();';
        return $this->builder()
            ->setTableId('tag-table')
            ->columns($this->getColumns())
            ->minifiedAjax($url='', $script, [])
            ->dom("<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" .
                "<'row'<'col-sm-12'tr>>" .
                "<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>")
            ->orderBy(1)
            ->parameters([
                'responsive' => true,
                'autoWidth' => false,

                'drawCallback' => 'function() {
                    "use strict";

                    $(".link-edit").on("click", function(e) {
                        e.preventDefault()

                        let editurl = $(this).attr("href");
                        let query = $(this).data("model");
                        let lang = $(this).data("lang");

                        $("#name").val(query.name);
                        $("#description").val(query.description);
                        if (query.translation) {
                            showTranslation(query.name);
                        } else {
                            hideTranslation(query.name);
                        }

                        $.each( JSON.parse(query.show_translations) , function( key, value ) {
                          $("#translation-"+key).val(value);
                        });

                        $("form#insert").attr("href", editurl);

                        $("#btn-reset").removeAttr("hidden");
                        $("#btn-submit").attr("id","btn-submit-update");
                        $("button[type=submit]").html("'.__('term.button_tag_update').'");

                        $("#name").removeClass("is-invalid");
                        $(".msg-error-name").html("");
                        $("#description").removeClass("is-invalid");
                        $(".msg-error-description").html("");
                    });

                    $(".delete").on("click", function() {
                        let table = $(this).data("table");
                        let url = $(this).data("url");
                        sweetalert2(table, url);
                    })

                    $("#bulk_delete").on("click", function() {
                        let url = $(this).data("url");
                        let table = "tag-table";
                        let selectClass = "tag_checkbox";
                        multiDelCheckbox(table, url, selectClass);
                    })

                    $("#selectAll").on("click", function(e) {
                        if ($(this).is( ":checked" )) {
                            $(".tag_checkbox").prop("checked",true);
                        } else {
                            $(".tag_checkbox").prop("checked",false);
                        }
                    })

                     if(document.getElementById("translation")){
                        document.getElementById("translation").removeAttribute("disabled");
                    }
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
                ->footer('<button type="button" name="bulk_delete" id="bulk_delete" class="btn btn btn-xs btn-danger" data-url="'.route('tags.massdestroy').'">'.__('general.delete').'</button>'),
            Column::make('name')->title(__('term.column_name')),
            Column::make('slug')->title(__('term.column_slug')),
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
        return 'Tag_' . date('YmdHis');
    }
}
