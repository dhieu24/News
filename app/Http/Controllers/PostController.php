<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Keyword;
use App\Models\Language;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class PostController extends Controller
{
    public function index(){
        $numberOfPosts = Post::where('user_id', auth()->id())->count();

        $numberOfTagsByCategoriesMax = Tag::selectRaw('name, count(*)')->join('posts', 'posts.id', '=', 'tags.post_id')
                                                ->where('posts.user_id', auth()->user()->id)
                                                ->groupBy('tags.name')
                                                ->orderByRaw('count(*) DESC')
                                                ->limit(5)->get();

        $numberOfTagsByLanguagesMax = Post::selectRaw('language, count(*)')
                                ->groupBy('language')
                                ->where('posts.user_id', auth()->user()->id)
                                ->orderByRaw('count(*) DESC')->limit(5)->get();


        $numberOfTagsByCountriesMax = Country::selectRaw('name, count(*)')->join('posts', 'posts.id', '=', 'countries.post_id')
                                                ->where('posts.user_id', auth()->user()->id)
                                                ->groupBy('countries.name')
                                                ->orderByRaw('count(*) DESC')
                                                ->limit(5)->get();

        $numberOfKeywordsMax = Keyword::selectRaw('name, count(*)')->join('posts', 'posts.id', '=', 'keywords.post_id')
                                                ->where('posts.user_id', auth()->user()->id)
                                                ->groupBy('keywords.name')
                                                ->orderByRaw('count(*) DESC')
                                                ->limit(5)->get();

        $numberOfTagsByCategoriesMin = Tag::selectRaw('name, count(*)')->join('posts', 'posts.id', '=', 'tags.post_id')
                                                ->where('posts.user_id', auth()->user()->id)
                                                ->groupBy('tags.name')
                                                ->orderByRaw('count(*) ASC')
                                                ->limit(5)->get();

        $numberOfTagsByLanguagesMin = Post::selectRaw('language, count(*)')
                                                ->where('posts.user_id', auth()->user()->id)
                                                ->groupBy('language')->orderByRaw('count(*) ASC')->limit(5)->get();


        $numberOfTagsByCountriesMin = Country::selectRaw('name, count(*)')->join('posts', 'posts.id', '=', 'countries.post_id')
                                                ->where('posts.user_id', auth()->user()->id)
                                                ->groupBy('countries.name')
                                                ->orderByRaw('count(*) ASC')
                                                ->limit(5)->get();

        $numberOfKeywordsMin = Keyword::selectRaw('name, count(*)')->join('posts', 'posts.id', '=', 'keywords.post_id')
                                                ->where('posts.user_id', auth()->user()->id)
                                                ->groupBy('keywords.name')
                                                ->orderByRaw('count(*) ASC')
                                                ->limit(5)->get();
        $responseData = [
            'numPosts' => $numberOfPosts,
            'numCategoriesMax' => $numberOfTagsByCategoriesMax,
            'numLanguagesMax' => $numberOfTagsByLanguagesMax,
            'numCountriesMax' => $numberOfTagsByCountriesMax,
            'numCategoriesMin' => $numberOfTagsByCategoriesMin,
            'numLanguagesMin' => $numberOfTagsByLanguagesMin,
            'numCountriesMin' => $numberOfTagsByCountriesMin,
            'numKeywordsMax' => $numberOfKeywordsMax,
            'numKeywordsMin' => $numberOfKeywordsMin

        ];

        return view('posts.index', $responseData);
    }

    public function retrieve(Request $request){
        // dd($request);
        $keyword = "";
        if(!empty($request->titleKeyword)) $keyword = $request->titleKeyword;

        // dd($keyword);
        $postsTopK = Post::where('user_id', auth()->user()->id)
            ->when($keyword, function ($query) use ($keyword) {
                return $query->where('title', 'like', '%'.$keyword.'%');
            })
             ->orderBy('created_at', 'desc')
             ->limit(intval($request->k))
             ->with('tags')
             ->with('countries')
             ->with('keywords')
             ->with('creators')
             ->get();
             
        return response($postsTopK);
    }
}
