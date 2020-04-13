<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use App\Models\User;
use App\Models\Tutorial;
use Illuminate\Http\Request;
use DB;
use File;
use Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users=User::find($id);
        $tutorials = DB::table('tutorials')->join('users', 'tutorials.user_id', '=', 'users.id')
        ->select('tutorials.*', 'users.name')->where('users.id', [$id])->orderBy('date', 'desc')->paginate(8);
        $profiles = Profile::where('user_id', [$id])->first();

        return view('pages/showProfile',['tutorials'=>$tutorials, 'users'=>$users, 'profiles'=>$profiles]);
    }

    public function profile(Tutorial $tutorial)
    {
        $tutorials = DB::table('tutorials')->join('users', 'tutorials.user_id', '=', 'users.id')
        ->select('tutorials.*', 'users.name')->where('users.id', [auth()->id()])->orderBy('date', 'desc')->paginate(8);
        $profiles = Profile::where('user_id', [auth()->id()])->first();

        return view('pages/profile',['tutorials'=>$tutorials, 'profiles'=>$profiles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $profiles = Profile::where('user_id', [auth()->id()])->first();
        return view('pages/editProfile',['profiles'=>$profiles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $profile = Profile::where('user_id', auth()->id())->first();

        $image=$request->file('avatar');
        if ($image!=null){
            if ($profile->avatar!="avatar-default.png"){
                $imageOld = $profile->avatar;
                unlink(storage_path('app/public/avatarsIMG/'.$imageOld));
            }
            $imageNew=auth()->id().'.'.$image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('avatarsIMG', $image, $imageNew, 'public');
            $profile->avatar = $imageNew;
        }

        $profile->info = $request->input('info');
        $profile->save();

        return redirect()->back()->with('success', 'Profil został zedytowany.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}