<?php

namespace App\DataTables;

use App\Helpers\Languages;
use App\Helpers\Terms;
use App\Models\Term;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
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
                    <input type="checkbox" class="custom-control-input category_checkbox" id="checkbox'.$query->id.'" name="category_checkbox[]" value="'.$query->id.'"><label class="custom-control-label" for="checkbox'.$query->id.'"></label>
                </div>';
            })
            ->editColumn('image', function ($query) {
                return '<img src="'.Terms::getImage($query->image).'" width="100px">';
            })
            ->addColumn('action', function($query){
                $name = $query->parent == 0 ? '' : Term::find($query->parent)->name;

                $lang = (is_null(request('filter')) || request('filter') == '0') ?
                    Languages::codeSession() : request('filter');

                $showTranslations = $query->translation;

                if($showTranslations){
                    $translations = json_decode($query->translation, true);
                    foreach($translations as $key => $value) {
                        $translations[$key] = Term::category()->firstWhere('slug', $value) ? Term::category()->firstWhere('slug', $value)->name : '';
                    }
                    $showTranslations = json_encode($translations);
                }

                $dataMerge = [
                    'parent_name' => $name,
                    'show_translations' => $showTranslations
                ];

                return view('admin.category._action',[
                    'table'    => 'category-table',
                    'lang'     => $lang,
                    'model'    => collect($query)->merge($dataMerge),
                    'del_url'  => route('categories.destroy', $query),
                    'edit_url' => route('categories.update', $query)]);
            })
            ->rawColumns(['action','checkbox','image']);
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

        return Term::select('id', 'name', 'slug', 'parent', 'description', 'translation', 'image')
                ->category()
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
            ->setTableId('category-table')
            ->columns($this->getColumns())
            ->minifiedAjax($url = '', $script, [])
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

                        if(query.parent != 0){
                            $("#parent").html("<option value="+query.parent+">"+query.parent_name+"</option>");
                        }else{
                            $("#parent").html("");
                        }

                        $("#description").val(query.description);
                        if (query.translation) {
                            showTranslation(query.name);
                        } else {
                            hideTranslation(query.name);
                        }

                        $.each( JSON.parse(query.show_translations) , function( key, value ) {
                          $("#translation-"+key).val(value);
                        });

                        $("#insert").attr("href", editurl);

                        $("#btn-reset").removeAttr("hidden");
                        $("#btn-submit").attr("id","btn-submit-update");
                        $("button[type=submit]").html("'.__('term.button_category_update').'");

                        $("#name").removeClass("is-invalid");
                        $(".msg-error-name").html("");
                        $("#description").removeClass("is-invalid");
                        $(".msg-error-description").html("");

                        if (query.image) {
                            $(".upload-image").addClass("ready");
                            $("#image_preview_container").attr("src", "'. asset('/storage/images/') .'/" + query.image);
                            $("input[name=isupload]").val("true");
                        } else {
                            $("#display").removeAttr("hidden");
                            $("#reset").attr("hidden");
                            $(".upload-image").removeClass("ready result");
                            $("#image_preview_container").attr("src", "#");
                            $("#upload")[0].value = "";
                        }
                    });

                    $(".delete").on("click", function() {
                        let table = $(this).data("table");
                        let url = $(this).data("url");
                        sweetalert2(table, url);
                    })

                    $("#bulk_delete").on("click", function() {
                        let url = $(this).data("url");
                        let table = "category-table";
                        let selectClass = "category_checkbox";
                        multiDelCheckbox(table, url, selectClass);
                    })

                    $("#selectAll").on( "click", function(e) {
                        if ($(this).is( ":checked" )) {
                            $(".category_checkbox").prop("checked",true);
                        } else {
                            $(".category_checkbox").prop("checked",false);
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
                ->footer('<button type="button" name="bulk_delete" id="bulk_delete" class="btn btn btn-xs btn-danger" data-url="'.route('categories.massdestroy').'">'.__('general.delete').'</button>'),
            Column::make('image')->title(__('term.column_image')),
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
        return 'Category_' . date('YmdHis');
    }
}
