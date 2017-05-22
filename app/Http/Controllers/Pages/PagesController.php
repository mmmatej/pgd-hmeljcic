<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Mail\ContactEmail;
use App\Member;
use App\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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
            'news' => Cache::rememberForever('coverNews', function () {
                return News::getCover();
            })
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
     * GET: /vozila-in-tehnika/{sub}
     * @param $sub
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getVehiclesAndSystems($sub)
    {
        return view('pages.vehicles-and-systems');
    }

    /**
     * GET: /novice
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getNews()
    {
//        TODO: caching
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
        $news = Cache::rememberForever('news-' . $slug, function () use ($slug) {
            return News::with('images')->where('slug', $slug)
                ->firstOrFail();
        });

        $newsList = Cache::rememberForever('last10news', function () {
            return News::with('images')
                ->orderBy('id', 'desc')
                ->limit(10)
                ->get();
        });

        return view('pages.news-details', ['news' => $news, 'newsList' => $newsList]);
    }

    /**
     * GET: /clani
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getMembers()
    {
        $data = [
            'members' => Cache::rememberForever('members', function () {
                return Member::all();
            })
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getCharitable(Request $request)
    {
        return view('pages.charitable');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function postCharitable(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'post' => 'required',
            'tax' => 'required',
            'office' => 'required|not_in:0',
            'percent' => 'required'
        ], [
            'name.required' => "Polje 'Ime oz.naziv upravičenca' je obvezno.",
            'address.required' => "Polje 'Naselje, ulica, hišna številka' je obvezno.",
            'post.required' => "Polje 'Poštna številka, ime pošte' je obvezno.",
            'tax.required' => "Polje 'Davčna številka' je obvezno.",
            'office.not_in' => "Polje 'Pristojni finančni urad, izpostava' je obvezno.",
            'percent.required' => "Polje 'Odstotek' je obvezno.",
        ]);

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdf.charitable', $request->all());
        return $pdf->stream('dobrodelen.pdf');
    }
}