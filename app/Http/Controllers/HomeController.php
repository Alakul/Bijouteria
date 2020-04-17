<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

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

    public function comments()
    {
        $comments = DB::table('comments')->join('users', 'users.id', '=', 'comments.user_id')
        ->orderBy('date', 'desc')->get();
        return view('pages/admin/showComments', ['comments'=>$comments]);
    }

    public function destroyComment()
    {
        
    }

    public function users()
    {
        $users=DB::table('users')->get();
        return view('pages/admin/showUsers', ['users'=>$users]);
    }
    public function destroyUser()
    {
        
    }

    public function tutorials()
    {
        $tutorials = DB::table('tutorials')->join('users', 'users.id', '=', 'tutorials.user_id')
        ->select('tutorials.*', 'users.name')->get();
        return view('pages/admin/showTutorials', ['tutorials'=>$tutorials]);
    }
    public function destroyTutorial()
    {
        
    }
}
