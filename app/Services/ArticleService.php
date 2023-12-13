<?php

namespace App\Services;

use App\Helpers\Localization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class ArticleService
{

    /**
     * @return mixed
     */
    public function query()
    {
        $posts = \App\Models\Post::article()->publish();

        if (Auth::check()) {
            if (Auth::user()->hasRole('super-admin')) {
                $posts->where(function($query) {
                    $query->public()
                        ->orWhere(function($r){
                            $r->whereHas('user.roles', function(Builder $p){
                                $p->whereName('super-admin');
                            })->private()->where('post_author', Auth::id());
                        })
                        ->orWhere(function($r){
                            $r->whereHas('user.roles', function(Builder $p){
                                $p->whereIn('name', ['admin','author']);
                            })->private();
                        });
                });
            } else {
                if (Auth::user()->can('read-private-post')) {
                    if (Auth::user()->hasRole('admin')) {
                        $posts->where(function($query) {
                            $query->public()
                                ->orWhere(function($r){
                                    $r->whereHas('user.roles', function(Builder $p){
                                        $p->whereName('admin');
                                    })->private()->where('post_author', Auth::id());
                                })
                                ->orWhere(function($r){
                                    $r->whereHas('user.roles', function(Builder $p){
                                        $p->whereName('author');
                                    })->private();
                                });
                        });
                    }
                } else {
                    if(Auth::user()->hasRole('author')) {
                        $posts->where(function($query) {
                            $query->public()
                                ->orWhere(function($r){
                                    $r->whereHas('user.roles', function(Builder $p){
                                        $p->whereName('author');
                                    })->private()->where('post_author', Auth::id());
                                });
                        });
                    }
                }
            }
        } else {
            $posts->public();
        }

        return $posts;
    }


    /**
     * @return mixed
     */
    public function currentLanguage()
    {
        return $this->query()->wherePostLanguage(Localization::getCurrentLocaleId());
    }


    /**
     * @param $q
     * @return mixed|void
     */
    public function qryDataTable($q)
    {
        if (Auth::user()->can('read-private-post')) {
            if (Auth::user()->hasRole('admin')) {
                return $q->where(function($query) {
                    $query->public()
                        ->orWhere(function($r){
                            $r->whereHas('user.roles', function(Builder $p){
                                $p->whereName('admin');
                            })->private()->where('post_author', Auth::id());
                        })
                        ->orWhere(function($r){
                            $r->whereHas('user.roles', function(Builder $p){
                                $p->whereName('author');
                            })->private();
                        });
                })->latest()->newQuery();
            }else{
                return $q->latest()->newQuery();
            }
        } else {
            if(Auth::user()->hasRole('author')) {
                return $q->where(function ($query) {
                    $query->public()
                        ->orWhere(function($r){
                            $r->whereHas('user.roles', function(Builder $p){
                                $p->whereName('author');
                            })->private()->where('post_author', Auth::id());
                        });
                })->latest()->newQuery();
            }
        }
    }


    /**
     * @param $language
     * @return mixed
     */
    public function dynamicLanguage($language)
    {
        return $this->query()->wherePostLanguage($language);
    }

}
