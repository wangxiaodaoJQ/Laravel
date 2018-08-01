<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\Category;

class TopicsController extends Controller
{
    /**
     * TopicsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * 话题列表页。
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Topic        $topic
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, Topic $topic)
    {
        $topics = $topic->paginate(20);
        
        return view('web.topics.index', compact('topics'));
    }

    /**
     * 话题详情页。
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Topic        $topic
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, Topic $topic)
    {
        return view('web.topics.show', compact('topic'));
    }

    /**
     * 话题创建页。
     *
     * @param \App\Models\Topic $topic
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Topic $topic)
    {
        $categories = Category::all();
        return view('web.topics.topic', compact('topic', 'categories'));
    }

    /**
     * 话题创建操作。
     *
     * @param \App\Http\Requests\Web\TopicFormRequest $request
     * @param \App\Models\Topic                       $topic
     */
    public function store(TopicFormRequest $request, Topic $topic)
    {
    }

    /**
     * 话题编辑页。
     *
     * @param \App\Models\Topic $topic
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Topic $topic)
    {
        return view('web.topics.topic');
    }

    /**
     * 话题更新操作。
     *
     * @param \App\Http\Requests\Web\TopicFormRequest $request
     * @param \App\Models\Topic                       $topic
     */
    public function update(TopicFormRequest $request, Topic $topic)
    {
    }
    
    /**
     * 话题删除操作。
     *
     * @param \App\Models\Topic $topic
     */
    public function destroy(Topic $topic)
    {
    }
}