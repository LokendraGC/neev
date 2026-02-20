<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\TeamCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TeamCategoryController extends Controller
{
    private $categoryRepository;
    private $teamCategoryRepository;
    private $categoryType;

    public function __construct(CategoryRepository $categoryRepository, TeamCategoryRepository $teamCategoryRepository)
    {
        $this->categoryType = 'team_category';
        $this->categoryRepository = $categoryRepository;
        $this->teamCategoryRepository = $teamCategoryRepository;
    }

    public function index()
    {
        $type = $this->categoryRepository->encodeType($this->categoryType);

        $categories = Category::with('children')
            ->where('type', $this->categoryType)
            ->where('parent', 0)
            ->orderBy('name', 'ASC')
            ->get();

        return view('backend.team-category.index-team_category', [
            'categories' => $categories,
            'categoryType' => $this->categoryType,
            'page_title' => 'Team Categories',
            'type' => $type,
        ]);
    }

    public function store(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required',
        ]);


        $type = isset($request->type) ? $this->categoryRepository->decodeType($request->type) : 'NOT FOUND';

        // check category type exists or not
        $this->categoryRepository->checkCategoryTypeExists($type);

        try {

            // create new category
            $category = $this->categoryRepository->createCategory($request, $this->categoryType);

            $metaDatas = [];
            $metaDatas = $this->teamCategoryRepository->processMetaData($category, $request);

            foreach ($metaDatas as $key => $value) {
                $this->categoryRepository->updateOrCreateMeta($category, $key, $value);
            }

            session()->flash('success', 'Team Category Created.');

            return redirect()->back();
        } catch (\Exception $e) {

            session()->flash('error', 'Error While Creating: ' . $e->getMessage());
            Log::error($e);
            return redirect()->back();
        }
    }

    public function edit(Request $request, $id)
    {
        $category = Category::where('id', $id)->where('type', $this->categoryType)->FindOrFail($id);

        $metaDatas = $this->categoryRepository->getMetaDatas($category);

        if ($category == NULL) {
            abort(404);
        }

        $categories = Category::with('children')
            ->where('type', $this->categoryType)
            ->where('id', '!=', $id)
            ->where('parent', 0)
            ->orderBy('name', 'ASC')
            ->get();

        return view('backend.team-category.edit-team_category', [
            'id' => $id,
            'category' => $category,
            'categories' => $categories,
            'metaDatas' => $metaDatas,
        ]);
    }

    public function update(Request $request, Category $id)
    {
        // validation
        $request->validate([
            'name' => 'required',
        ]);

        try {

            $data = $this->categoryRepository->updateCategory($request, $id, $this->categoryType);

            if ($data['status'] && $data['category']) {

                $category = $data['category'];

                $metaDatas = [];
                $metaDatas = $this->teamCategoryRepository->processMetaData($category, $request);

                foreach ($metaDatas as $key => $value) {
                    $this->categoryRepository->updateOrCreateMeta($category, $key, $value);
                }


                session()->flash('success', 'Team Category Updated.');

                return redirect()->route('backend.category.team_category.update', $id);
            } else {

                session()->flash('error', 'Error While Updating: Unable to update the team category.');
            }
        } catch (\Exception $e) {

            session()->flash('error', 'Error While Updating: ' . $e->getMessage());
            Log::error($e);
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $category = Category::where('type', $this->categoryType)->findOrFail($id);
        $category->delete();

        session()->flash('success', 'Team Category Deleted.');
        return redirect()->back();
    }

}
