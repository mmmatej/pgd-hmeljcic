<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Member;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    /**
     * GET: /admin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $members = Member::paginate(20);

        return view('admin.members.index', ['members' => $members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.members.edit', ['member' => new Member()]);
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
            'name'  => 'required',
            'group' => 'required|in:Mladina,Člani,Članice,Veterani',
            'image' => 'required|image|dimensions:min_width=100,min_height=100'
        ]);

        $imgPath = $request->file('image')->store('images/members', 'public');

        $member = new Member();
        $member->name  = $request->get('name');
        $member->group = $request->get('group');
        $member->img_path = $imgPath;
        $member->save();

        return response()
            ->redirectTo('/admin/clani');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('admin.members.edit', ['member' => $member]);
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
        $this->validate($request, [
            'name'  => 'required',
            'group' => 'required|in:Mladina,Člani,Članice,Veterani',
            'image' => 'nullable|image|dimensions:min_width=100,min_height=100'
        ]);

        $member = Member::findOrFail($id);
        $member->name  = $request->get('name');
        $member->group = $request->get('group');

        if($request->hasFile('image')) {
            $imgPath = $request->file('image')->store('images/members', 'public');
            $member->img_path = $imgPath;
        }

        $member->save();

        return response()
            ->redirectTo('/admin/clani');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::findOrFail($id)->delete();

        return response()
            ->redirectTo('/admin/clani');
    }
}