<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages/home');
    }

    public function addTutorial()
    {
        return view('pages/addTutorial');
    }

    public function titleImageUpload(Request $request)
    {
        $this->validate($request, [
            'fileToUpload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image=$request->file('fileToUpload');
        $imageNew=rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageNew);

        return back()
            ->with('success','You have successfully upload image.')
            ->with('fileToUpload',$imageNew);
    }

}
