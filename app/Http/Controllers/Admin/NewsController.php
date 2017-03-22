<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * GET: /admin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $news = News::withDraft()->orderBy('id', 'desc')->paginate(20);

        return view('admin.news.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.edit', ['news' => new News()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required',
            'abstract'    => 'required',
            'content'     => 'required',
            'author'      => 'required',
            'slug'        => 'nullable|unique:news,slug',
            'cover_style' => 'required|in:float,top'
        ]);

        $news = new News();
        $news->title       = $request->get('title');
        $news->slug        = $request->get('slug');
        $news->abstract    = $request->get('abstract');
        $news->content     = $request->get('content');
        $news->author      = $request->get('author');
        $news->cover_style = $request->get('cover_style');
        $news->cover_text  = $request->get('cover_text');
        $news->published   = $request->get('publish', false) !== false;

        if ($news->slug == '')
            $news->slug = str_slug($news->title);

        if(News::withDraft()->where('slug', $news->slug)->exists()) {
            $news->slug = $news->slug . '-' . str_random(5);
        }

        $news->save();

        return $news->published
            ? response()->redirectTo('/admin/novice')
            : response()->redirectTo('/admin/novice/' . $news->id . '/uredi');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.news.edit', ['news' => News::withDraft()->findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        if ($request->get('set-as-cover-news', false) !== false) {
            $id = intval($id);
            News::query()->update(['is_cover_news' => DB::raw("IF(id=$id,1,0)")]);
        } else {
            $this->validate($request, [
                'title'    => 'required',
                'abstract' => 'required',
                'content'  => 'required',
                'author'   => 'required',
                'cover_style' => 'required|in:float,top'
            ]);

            $news = News::withDraft()->findOrFail($id);

            $news->title = $request->get('title');
            $news->abstract = $request->get('abstract');
            $news->content = $request->get('content');
            $news->author      = $request->get('author');
            $news->cover_style = $request->get('cover_style');
            $news->cover_text = $request->get('cover_text');
            $news->published = $request->get('publish', false) !== false;

            $news->save();
        }

        return response()->redirectTo('/admin/novice');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::withDraft()->findOrFail($id)->delete();

        return response()
            ->redirectTo('/admin/novice');
    }
}