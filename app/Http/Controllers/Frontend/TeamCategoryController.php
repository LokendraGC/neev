<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Repositories\CategoryRepository;


class TeamCategoryController extends Controller
{
    private $categoryRepository;
    private $categoryType;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->categoryType = 'team_category';
    }

    public function index($slug)
    {
        $cat = Category::where('slug', $slug)->where('type', $this->categoryType)->first();
        $posts = NULL;
        $teams = NULL;

        if ($cat) {

            $catMeta = $this->categoryRepository->getMetaDatas($cat);

            $teams = $cat->posts()->orderBy('post_title', 'ASC')->get();

            return view('frontend.category-team_category', [
                'posts' => $posts,
                'teams' => $teams,
                'cat' => $cat,
                'catMeta' => $catMeta,
            ]);
        } else {

            abort(403, 'Team Category Not Found');
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $cat = Category::where('type', $this->categoryType)->first();
        if ($cat) {

            $catMeta = $this->categoryRepository->getMetaDatas($cat);
        }

        $teams = Post::where('post_type', 'team')
            ->where('post_title', 'like', '%' . $query . '%')
            ->orWhere('post_content', 'like', '%' . $query . '%')->get();

        return view('frontend.category-team_category', ['teams' => $teams, 'cat' => $cat, 'catMeta' => $catMeta]);
    }
}
