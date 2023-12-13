<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Languages;
use App\Http\Controllers\Controller;
use Cocur\Slugify\Slugify;
use App\Models\{Language, Menu, MenuItem};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\{JsonResponse, RedirectResponse, Request};
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MenuController extends Controller
{
    /**
     * MenuController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:read-menus');
        $this->middleware('permission:add-menus', ['only' => ['createnewmenu','generatemenucontrol','addcustommenu']]);
        $this->middleware('permission:delete-menus', ['only' => ['deletemenug', 'deleteitemmenu']]);
        $this->middleware('permission:update-menus', ['only' => ['updateitem']]);
    }

    /**
     * @param Request $request
     * @param $menu_id
     * @return JsonResponse
     */
    public function selectLanguageItemMenu(Request $request, $menu_id)
    {
        $lang = Languages::showCodeLanguage(request('language'));
        return response()->json([
            'menu_id' => $menu_id,
            'lang' => $lang
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return RedirectResponse
     */
    public function index()
    {
        return redirect()->route('menus.show.item', ['menu_id' => 1,'lang' => Languages::codeSession()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|string|min:2|unique:menus'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $languages = Language::select('id')->where('active', 'y')->get();

        foreach($languages as $lagunguage) {
            $language_id[] = $lagunguage->id;
        }

        Menu::create([
            'name' => strip_tags(request('name')),
        ])->languages()->sync($language_id);

        return response()->json(['success' => __('notification.saved_successfully')]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function storeItemMenu(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'label' => 'required|min:2',
            'url' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $explodeLinkMenuArr = explode('/', request('url'));

        $slugify = new Slugify();

        foreach($explodeLinkMenuArr as $key => $value){
            if($value == end($explodeLinkMenuArr)){
                $explodeLinkMenuArr[$key] = $slugify->slugify(end($explodeLinkMenuArr));
            }
        }

        $link = implode('/', $explodeLinkMenuArr);

        $menu = MenuItem::create([
            'label' => request('label'),
            'link' => $link,
            'menu_id' => request('menu'),
            'language' => request('language')
        ]);

        return response()->json(['success' => __('notification.saved_successfully'), 'menu' => $menu]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function showMenu(Request $request)
    {
        return redirect()->route('menus.show.item', ['menu_id' => request('menu'),'lang'=>Languages::codeSession()]);
    }

    /**
     * @param $menu_id
     * @param $lang
     * @return Application|Factory|View
     */
    public function showMenuItem($menu_id, $lang)
    {
        $id = $menu_id;
        $lang_id = Languages::findId($lang);

        $menuoptions = Menu::pluck('name', 'id');

        $datas = MenuItem::with('menu')
            ->where('language', $lang_id)
            ->orderBy('sort', 'ASC')->get();

        $json = '';

        if (!$datas->isEmpty()) {
            $array_with_elements = array();

            foreach($datas as $data) {
                $array_with_elements[$data->parent][] = $data;
            }

            function add_children($array_with_elements, $level) {
                $nested_array = array();
                foreach($array_with_elements[$level] as $wp_post){
                    $obj = new \stdClass();
                    $obj->id = $wp_post['id'];
                    if(isset($array_with_elements[$wp_post['id']])){
                        $obj->children = add_children($array_with_elements, $wp_post['id']);
                    }
                    $nested_array[] = $obj;
                }
                return $nested_array;
            }

            $return_arr = add_children($array_with_elements, 0);

            $json = json_encode($return_arr);
        }



        return view('admin.menu.menuitem', compact('json', 'id', 'lang_id', 'menuoptions'));
    }

    /**
     * @param $menu_id
     * @return Application|Factory|View
     */
    public function menulist($menu_id, $lang)
    {
        $id = $menu_id;
        $menus = Menu::find($id)
            ->items()
            ->where('language', Languages::findId($lang))
            ->where('parent', 0)->orderBy('sort', 'ASC')
            ->get();

        return view('admin.menu.menulist', compact('menus', 'id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $menu = Menu::with('items')->findOrFail($id);
        $menus = MenuItem::with('menu')->where("menu_id", $menu->id)->where('parent', 0)->orderBy("sort", "asc")->get();
        $datas = MenuItem::with('items')->orderBy('sort', 'ASC')->get();

        $array_with_elements = array();

        foreach($datas as $data) {
            $array_with_elements[$data->parent][] = $data;
        }

        function add_children($array_with_elements, $level) {
            $nested_array = array();
            foreach($array_with_elements[$level] as $wp_post){
                $obj = new \stdClass();
                $obj->id = $wp_post['id'];
                if(isset($array_with_elements[$wp_post['id']])){
                    $obj->children = add_children($array_with_elements, $wp_post['id']);
                }
                $nested_array[] = $obj;
            }
            return $nested_array;
        }

        // starting with level 0
        $return_arr = add_children($array_with_elements, 0);

        // and convert this to json
        $json = json_encode($return_arr);

        return view('admin.menu.menuitem', compact('menus', 'json', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|string|' . Rule::unique('menus')->ignore($id, 'id') .'|min:3|alpha_dash'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $menu = Menu::findOrFail($id);
        $menu->name = request('name');
        $menu->save();

        return response()->json(['success' => __('notification.updated_successfully')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $menu_id
     * @param $item_id
     * @return JsonResponse
     */
    public function editItemMenu($menu_id, $item_id)
    {
        $items = MenuItem::find($item_id);
        return response()->json(['data' => $items]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function updateMenuStructure(Request $request, $id)
    {
        $jsondata = request('menuitem');

        $arraydata = json_decode($jsondata, true);

        function saveMenuItem($array, $level = 0, $id = 0) {
            foreach($array as $key => $value) {
                $menuitem = MenuItem::find($value['id']);
                $menuitem->parent = $id;
                $menuitem->sort = $key;
                $menuitem->depth = $level;
                $menuitem->save();
                if (array_key_exists('children', $value)) {
                    saveMenuItem($value['children'], $level + 1, $value['id']);
                }
            }
        }

        saveMenuItem($arraydata);

        return redirect()->route('menus.show.item', ['menu_id' => request('menuid'),'lang'=>Languages::showCodeLanguage(request('language'))]);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function updateItemMenu(Request $request, int $id): JsonResponse
    {
        $validator = Validator::make(request()->all(), [
            'label' => 'required|min:3',
            'url' => 'required',
            'class' => 'nullable|alpha_num'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $explodeLinkMenuArr = explode('/', request('url'));

        $slugify = new Slugify();

        foreach($explodeLinkMenuArr as $key => $value){
            if($value == end($explodeLinkMenuArr)){
                $explodeLinkMenuArr[$key] = $slugify->slugify(end($explodeLinkMenuArr));
            }
        }

        $link = implode('/', $explodeLinkMenuArr);

        $menuitem = MenuItem::find($id);
        $menuitem->link = $link;
        $menuitem->label = request('label');
        $menuitem->class = request('class');
        $menuitem->save();

        return response()->json(['success' => __('notification.updated_successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        Menu::destroy($id);
        return response()->json(['success' => __('notification.deleted_successfully')]);
    }

    /**
     * @return JsonResponse
     */
    public function deleteitemmenu()
    {
        $menuitem = MenuItem::find(request('id'));
        $menuitem->delete();

        return response()->json(['success' => __('menu.deleted_menu_item_successfully')]);
    }

}
