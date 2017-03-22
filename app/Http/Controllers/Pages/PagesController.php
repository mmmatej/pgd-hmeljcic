<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Mail\ContactEmail;
use App\Member;
use App\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    /**
     * GET: /
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        $data = [
            'news' => News::getCover()
        ];

        return view('pages.home', $data);
    }

    /**
     * GET: /o-drustvu
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAboutUs()
    {
        return view('pages.about-us');
    }

    /**
     * GET: /novice
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getNews()
    {
        $news = News::orderBy('id', 'desc')->paginate(20);

        return view('pages.news', ['news' => $news]);
    }

    /**
     * GET: /novice/{slug}
     * @param $slug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getNewsDetails($slug)
    {
        $news = News::where('slug', $slug)
            ->firstOrFail();

        $newsList = News::with('images')
            ->where('id', '!=', $news->id)
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();

        return view('pages.news-details', ['news' => $news, 'newsList' => $newsList]);
    }

    /**
     * GET: /clani
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getMembers()
    {
        $data = [
            'members' => Member::all()
        ];

        return view('pages.members', $data);
    }

    /**
     * GET: /kontakt
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getContact()
    {
        return view('pages.contact');
    }

    /**
     * POST: /kontakt
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'name' => 'required',
            'content' => 'required'
        ]);

        $data = $request->all();
        $data['datetime'] = Carbon::now();
        $data['ip'] = $request->getClientIp();

        Mail::to("matej@pankped.si")
            ->send(new ContactEmail($data));

        return view('pages.contact', ['sent' => true]);
    }
}