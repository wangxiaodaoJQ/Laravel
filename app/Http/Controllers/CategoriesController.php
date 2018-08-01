<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * 分类详情页面。
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category     $category
     * @param \App\Models\Topic        $topic
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, Category $category, Topic $topic)
    {
        $topics = $topic->withOrder($request->order)
            ->where('category_id', $category->id)
            ->paginate(20);
        return view('web.topics.index', compact(
            'topics',
            'category'
        ));
    }
}