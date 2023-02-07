<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\art_form;

class Art_formController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.web');
    }

    public function index()
    {
        $art_form = art_form::all();
        $data = array('art_form' => $art_form);
        return view('admin.art_form', $data);
    }

    public function store(Request $request)
    {
        $af = new art_form;
        $af->art_name = $request->art_name;
        $af->save();
        return back();
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
