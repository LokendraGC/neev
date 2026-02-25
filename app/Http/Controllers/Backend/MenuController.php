<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use App\Models\Category;
use App\Models\PostMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Repositories\MenuRepository;
use App\Repositories\CategoryRepository;

class MenuController extends Controller
{
    private $categoryRepository;
    private $categoryType;
    private $postModel;
    private $catModel;
    private $menuRepository;

    public function __construct(Post $postModel, Category $catModel, CategoryRepository $categoryRepository, MenuRepository $menuRepository)
    {
        $this->categoryType = 'nav_menu';
        $this->postModel = $postModel;
        $this->catModel = $catModel;
        $this->categoryRepository = $categoryRepository;
        $this->menuRepository = $menuRepository;
    }

    public function index()
    {
        $categories = $this->catModel
            ->where('type', $this->categoryType)
            ->where('parent', 0)
            ->orderBy('name', 'ASC')
            ->get();

        return view('backend.menus.index-menu', compact('categories'));
    }

    public function edit($id)
    {
        $menu = $this->categoryRepository->findCategory($id);
        $type = $this->categoryRepository->encodeType($this->categoryType);

        return view('backend.menus.edit-menu', [
            'menu' => $menu,
            'type' => $type,
            'page_title' => 'Edit Menu',
            'mode' => $this->mode ?? '',
            'demo' => $this->demo ?? ''
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id
        ]);

        try {
            $type = isset($request->type) ? $this->categoryRepository->decodeType($request->type) : 'NOT FOUND';
            $this->categoryRepository->checkCategoryTypeExists($type);

            $this->categoryRepository->updateCategory($id, $request, $this->categoryType);

            session()->flash('success', 'Menu Updated Successfully.');
            return redirect()->route('backend.menu');
        } catch (\Exception $e) {
            session()->flash('error', 'Error While Updating: ' . $e->getMessage());
            Log::error($e);
            return redirect()->back();
        }
    }

    public function create()
    {
        $type = $this->categoryRepository->encodeType($this->categoryType);
        return view('backend.menus.create-menu', compact('type'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name'
        ]);

        $type = isset($request->type) ? $this->categoryRepository->decodeType($request->type) : 'NOT FOUND';

        // check category type exists or not
        $this->categoryRepository->checkCategoryTypeExists($type);

        try {

            // create new category
            $category = $this->categoryRepository->createCategory($request, $this->categoryType);

            session()->flash('success', 'Menu Created.');

            return redirect()->route('backend.menu');
        } catch (\Exception $e) {

            session()->flash('error', 'Error While Creating: ' . $e->getMessage());
            Log::error($e);
            return redirect()->back();
        }
    }

    public function addEditMenuItems(Category $id)
    {
        $cat = $menu = $id;
    
        if ( $cat->type != $this->categoryType ) { abort(404); }
    
        // sidebar lists for menu
        $pages = $this->postModel->where([ 'post_type' => 'page', 'post_status' => 'publish'])->orderBy('post_title', 'ASC')->get();
        // $posts = $this->postModel->where([ 'post_type' => 'post', 'post_status' => 'publish'])->orderBy('post_title', 'ASC')->get();
        $categories = $this->catModel->where([ 'type' => 'category'])->orderBy('name', 'ASC')->get();
        $sector_categories = $this->catModel->where([ 'type' => 'sector'])->orderBy('name', 'ASC')->get();
      
        $posts = [];
    
        $allMenuItems = $menu->posts;
        // $parentMenuItems = $allMenuItems->filter(function ($item) {
        //     // Assuming postmetas relationship is defined on the post model
        //     dd($item->postMeta);
        //     return $item->postMeta->menu_item_parent_id === 0;
        // });
    
        $allMenuItems = $parentMenuItems = $allMenuItems->filter(function ($item) {
            // Check if the item has a postmeta entry with meta_key 'menu_item_parent_id' and meta_value '0'
            return $item->postMeta->contains(function ($meta) {
                return $meta->meta_key === 'menu_item_parent_id' && $meta->meta_value === '0';
            });
        })->sortBy('menu_order');
    
    
        // return $parentMenuItems;
    
        // return view('backend.menus.add-edit-menu-item', compact('menu', 'pages', 'posts', 'categories', 'allMenuItems') );
        return view('backend.menus.add-edit-menu-item', [
            'menu' => $menu,
            'depth' => $menu->menu_order,
            'pages' => $pages,
            'posts' => [],
            'categories' => $categories,
            'allMenuItems' => $allMenuItems,
            'sector_categories' => $sector_categories,
        ]);
    
    }
    public function updateEditMenuItems(Category $id, Request $request)
    {

        $menu = $id;

        try {

            // create new category
            // $category = $this->categoryRepository->createCategory($request, $this->categoryType);

            $status = $this->menuRepository->createMenuItem($menu, $this->postModel, $this->catModel, $this->categoryType, $request);


            session()->flash($status ? 'success' : 'warning', $status ? 'Item has been added.' : 'Please select items before add.');
        } catch (\Exception $e) {

            session()->flash('error', 'Error While Creating: ' . $e->getMessage());
            Log::error($e);
        }

        return redirect()->back();
    }

    public function sortMenu(Request $request, $id)
    {
        $list = $request->list;

        if (isset($list)) {

            $order = 1;

            foreach ($list as $depth_0 => $data_0) {

                $parent = Post::where('id', $data_0['id'])->first();
                $parent->menu_order = $order;
                $parent->update();

                $parent->postMeta()->updateOrInsert(
                    ['post_id' => $parent->id, 'meta_key' => 'menu_item_parent_id'],
                    ['meta_value' => 0]
                );

                $order++;

                if (isset($data_0['children'])) {

                    foreach ($data_0['children'] as $depth_1 => $data_1) {

                        $children_0 = Post::where('id', $data_1['id'])->first();
                        $children_0->menu_order = $order;
                        $children_0->update();

                        $order++;

                        $children_0->postMeta()->updateOrInsert(
                            ['post_id' => $children_0->id, 'meta_key' => 'menu_item_parent_id'],
                            ['meta_value' => $parent->id]
                        );

                        if (isset($data_1['children'])) {

                            foreach ($data_1['children'] as $depth_2 => $data_2) {

                                $children_1 = Post::where('id', $data_2['id'])->first();
                                $children_1->menu_order = $order;
                                $children_1->update();

                                $order++;

                                $children_1->postMeta()->updateOrInsert(
                                    ['post_id' => $children_1->id, 'meta_key' => 'menu_item_parent_id'],
                                    ['meta_value' => $children_0->id]
                                );
                            }
                        }
                    }
                }
            }
        }

        return $list;
    }

    public function menuItemDelete(Request $request, $menu_id, $id)
    {
        $menu = Post::where(['id' => $id, 'post_type' => 'nav_menu_item'])->first();

        if ($menu) {
            $deleteIds = [$menu->id];
            $menuMeta = PostMeta::where(['meta_key' => 'menu_item_parent_id', 'meta_value' => $menu->id])->get();
            $postIds = $menuMeta->pluck('post_id')->toArray();
            $ids = array_merge($deleteIds, $postIds);
            Post::whereIn('id', $ids)->forceDelete();
            return true;
        }

        return false;
    }

    public function menuItemUpdate(Request $request)
    {

        if (isset($request->menu_item_id)) {

            $menuItem = Post::where('id', $request->menu_item_id)->first();

            if (isset($request->menu_item_main_title)) {
                $title = $request->menu_item_main_title;
                $menuItem->post_title = $request->menu_item_main_title;
                $menuItem->update();
            } else {
                $title = $menuItem->post_title;
            }

            if ($menuItem) {

                $meta = [];
                $meta['menu_item_classes'] = isset($request->menu_item_classes) ? $request->menu_item_classes : null;
                $meta['menu_item_attr_title'] = isset($request->menu_item_attr_title) ? $request->menu_item_attr_title : null;
                $meta['menu_item_url'] = isset($request->menu_item_url) ? $request->menu_item_url : null;
                $meta['menu_item_target'] = isset($request->menu_item_target) ? $request->menu_item_target : null;

                foreach ($meta as $key => $value) {
                    $this->menuRepository->updateOrCreateMeta($menuItem, $key, $value);
                }
            }

            return [
                'status' => true,
                'menu_item_id' => $menuItem->id,
                'menu_item_main_title_' => $title,
            ];
        }

        return ['status' => false];
    }
}