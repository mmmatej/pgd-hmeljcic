<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Image;
use App\News;
use Illuminate\Http\Request;

class NewsImagesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $newsId)
    {
        $this->validate($request, [
            'description' => 'required',
            'image'       => 'required|image|dimensions:min_width=100,min_height=100'
        ]);

        $news = News::findOrFail($newsId);
        $news->clearCache();

        $imgPath = $request->file('image')->store('images/news', 'public');

        $image = new Image();
        $image->news_id = $newsId;
        $image->description = $request->get('description');
        $image->path = $imgPath;

        $image->save();

        return response()
            ->redirectTo('/admin/novice/' . $newsId . '/uredi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($newsId, $id)
    {
        $news = News::findOrFail($newsId);
        if ($news->images()->count() > 1) {
            Image::findOrFail($id)->findOrFail($id)->delete();

            $news->clearCache();
        }

        return response()
            ->redirectTo('/admin/novice/' . $newsId . '/uredi');
    }
}