<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Models\Category;
use App\Models\Post;

class SectorController extends Controller
{
    private $categoryRepository;
    private $categoryType;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->categoryType = 'sector';
    }

    public function index($slug)
    {
        $cat = Category::where('slug', $slug)
            ->where('type', $this->categoryType)
            ->first();

        if (!$cat) {
            abort(403, 'Sector Not Found');
        }

        $catMeta = $this->categoryRepository->getMetaDatas($cat);

        $otherCategories = Category::where('type', $this->categoryType)
            ->where('id', '!=', $cat->id)
            ->get();

        // Get all companies
        $allCompanies = Post::where('post_type', 'company')
            ->where('post_status', 'publish')
            ->latest()
            ->get();

        $companies = $allCompanies->filter(function ($company) use ($cat) {
            $companyMeta = $company->GetAllMetaData();
            $sectors = isset($companyMeta['sector_categories']) ? unserialize($companyMeta['sector_categories']) : [];

            if (!is_array($sectors))
                $sectors = [];

            // Remove duplicate sector IDs
            $sectors = array_unique($sectors);

            return in_array($cat->id, $sectors);
        })->values();

        // Optional: convert back to a collection if needed
        $companies = $companies->values();


         // Get all stories
         $allStories = Post::where('post_type', 'story')
         ->where('post_status', 'publish')
         ->latest()
         ->get();

     $stories = $allStories->filter(function ($story) use ($cat) {
         $storyMeta = $story->GetAllMetaData();
         $sectors = isset($storyMeta['sector_categories']) ? unserialize($storyMeta['sector_categories']) : [];

         if (!is_array($sectors))
             $sectors = [];

         // Remove duplicate sector IDs
         $sectors = array_unique($sectors);

         return in_array($cat->id, $sectors);
     })->values();

     // Optional: convert back to a collection if needed
     $stories = $stories->values();

        // Return view
        return view('frontend.category-sector', [
            'cat' => $cat,
            'catMeta' => $catMeta,
            'companies' => $companies, 
            'stories' => $stories,
            'otherCategories' => $otherCategories,
        ]);
    }
}
