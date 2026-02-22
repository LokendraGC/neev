<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\SectorRepository;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class SectorController extends Controller
{
    private $categoryRepository;
    private $sectorRepository;
    private $categoryType;

    public function __construct(CategoryRepository $categoryRepository, SectorRepository $sectorRepository)
    {
        $this->categoryType = 'sector';
        $this->categoryRepository = $categoryRepository;
        $this->sectorRepository = $sectorRepository;
    }


    public function index()
    {
        $type = $this->categoryRepository->encodeType($this->categoryType);

        $categories = Category::with('children')
            ->where('type', $this->categoryType)
            ->where('parent', 0)
            ->orderBy('name', 'ASC')
            ->get();

        return view('backend.sector.index-sector', [
            'categories' => $categories,
            'categoryType' => $this->categoryType,
            'page_title' => 'Sectors',
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
            $metaDatas = $this->sectorRepository->processMetaData($category, $request);

            foreach ($metaDatas as $key => $value) {
                $this->categoryRepository->updateOrCreateMeta($category, $key, $value);
            }

            session()->flash('success', 'Sector Created.');

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

        return view('backend.sector.edit-sector', [
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
                $metaDatas = $this->sectorRepository->processMetaData($category, $request);

                foreach ($metaDatas as $key => $value) {
                    $this->categoryRepository->updateOrCreateMeta($category, $key, $value);
                }


                session()->flash('success', 'Sector Updated.');

                return redirect()->route('backend.category.sector.update', $id);
            } else {

                session()->flash('error', 'Error While Updating: Unable to update the sector.');
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

        session()->flash('success', 'Sector Deleted.');
        return redirect()->back();
    }
}
