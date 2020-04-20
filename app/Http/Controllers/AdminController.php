<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutorial;
use App\Models\Comment;
use App\Models\Profile;
use App\Models\User;
use DB;

class AdminController extends Controller
{
    public function tutorials()
    {
        $tutorials = DB::table('tutorials')->join('users', 'users.id', '=', 'tutorials.user_id')
        ->select('tutorials.*', 'users.name')->paginate(30);
        return view('pages/admin/showTutorials', ['tutorials'=>$tutorials]);
    }

    public function destroyTutorial($id)
    {
        $tutorial = Tutorial::find($id);
        $image = $tutorial->title_picture;
        unlink(storage_path('app/public/tutorialsIMG/'.$image));

        $steps = DB::table('steps')->where('tutorial_id', $id)->get();
        foreach($steps as $step){
            $image = $step->picture;
            unlink(storage_path('app/public/tutorialsIMG/'.$image));
        }

        $tutorial -> delete();
        return redirect()->back()->with('success', 'Poradnik został usunięty.');
    }


    public function comments()
    {
        $comments = DB::table('comments')->join('tutorials', 'comments.tutorial_id', '=', 'tutorials.id')
        ->join('users', 'users.id', '=', 'comments.user_id')
        ->select('comments.*', 'users.name', 'tutorials.title')->paginate(30);
        return view('pages/admin/showComments', ['comments'=>$comments]);
    }

    public function destroyComment($id)
    {
        $comment = Comment::find($id);
        $comment -> delete();

        return back();
    }


    public function users()
    {
        $users=DB::table('users')->paginate(30);
        return view('pages/admin/showUsers', ['users'=>$users]);
    }

    public function destroyUser($id)
    {
        $profile = Profile::where('user_id', $id)->first();
        if ($profile->avatar!="avatar-default.png"){
            $imageOld = $profile->avatar;
            unlink(storage_path('app/public/avatarsIMG/'.$imageOld));
        }

        $tutorials= DB::table('tutorials')->where('user_id', $id)->get();
        foreach($tutorials as $tutorial){
            $image = $tutorial->title_picture;
            unlink(storage_path('app/public/tutorialsIMG/'.$image));

            $steps = DB::table('steps')->where('tutorial_id', $tutorial->id)->get();
            foreach($steps as $step){
                $image = $step->picture;
                unlink(storage_path('app/public/tutorialsIMG/'.$image));
            }
        }

        $user = User::find($id);
        $user -> delete();

        return back();
    }



    public function admin(){
        $tutorials = DB::table('tutorials')->join('users', 'tutorials.user_id', '=', 'users.id')
        ->select('tutorials.*', 'users.name')->orderBy('date', 'desc')->paginate(8);
        
        return view('pages/admin/home',['tutorials'=>$tutorials]);
    }
}
