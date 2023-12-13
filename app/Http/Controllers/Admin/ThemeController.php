<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Settings;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};

class ThemeController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:read-themes');
    }


    /**
     * @return void
     */
    public function activated()
    {
        Setting::where('name', 'current_theme')->update(['value' => request('theme')]);
        Setting::where('name', 'current_theme_dir')->update(['value' => request('theme_dir')]);
        return request()->session()->flash('success', __('notification.theme_successfully_activated'));
    }

    /**
     * @return mixed
     */
    public function theme()
    {
        $theme = request('theme');
        return Settings::get_theme(last(explode('/', $theme)));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $dirs = glob('themes/*' , GLOB_ONLYDIR);
        return view('admin.theme.index', compact('dirs'));
    }
}
