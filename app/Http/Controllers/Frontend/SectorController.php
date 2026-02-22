<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Models\Category;

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
        $cat = Category::where('slug', $slug)->where('type', $this->categoryType)->first();
        $posts = NULL;

        if ($cat) {

            $catMeta = $this->categoryRepository->getMetaDatas($cat);

            $posts = $cat->posts()->orderBy('post_title', 'ASC')->get();

            return view('frontend.category-sector', [
                'posts' => $posts,
                'cat' => $cat,
                'catMeta' => $catMeta,
            ]);
        } else {

            abort(403, 'Sector Not Found');
        }
    }
}
