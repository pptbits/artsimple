<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\DetailUser;

class ManageUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.web');
    }

    public function index()
    {
        $user = User::join('detail_user', 'users.id', 'detail_user.id_user')->select('users.*', 'detail_user.id as detail_user_id', 'detail_user.type')->get();
        dd($user);
        $data = array('user' => $user);
        return view('admin.manage_user', $data);
    }


    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        $art_form = art_form::find($id);
        $data = array('art_form' => $art_form);
        return view('admin.art_form_edit', $data);
    }

    public function update(Request $request)
    {
        $af = art_form::find($request->id);
        $af->art_name = $request->art_name;
        $af->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $af = art_form::find($id);
        $af->delete();
        return redirect()->back();
    }
}
