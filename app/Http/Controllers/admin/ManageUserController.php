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
        // dd($user);
        $data = array('user' => $user);
        return view('admin.manage_user', $data);
    }


    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        $user = User::join('detail_user', 'users.id', 'detail_user.id_user')
        ->select('users.*', 'detail_user.id as detail_user_id', 'detail_user.type')->where('users.id', $id)->first();
        // dd($user);
        $data = array('user' => $user);
        return view('admin.manage_user_edit', $data);
    }

    public function update(Request $request)
    {
        $๊user = User::find($request->id);
        $๊user->approve = $request->approve;
        $๊user->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $๊user = User::find($id);
        $๊user->delete();
        return redirect()->back();
    }

    public function approve(Request $request)
    {
        $๊user = User::find($request->id);
        $๊user->approve = "Y";
        $๊user->save();
        return response()->json(['status' => 200]);
    }
}
