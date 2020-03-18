<?php

namespace App\Http\Controllers;
use App\Models\Tutorial;
use App\Models\Material;
use App\Models\Tool;
use App\Models\Step;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use DB;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tutorial $tutorial)
    {
        if (!isset($_COOKIE['category'])) {
            setcookie('category', 'bransoletki', (time() + (3600*2)), '/');
            $tutorials = DB::table('tutorials')->join('users', 'tutorials.user_id', '=', 'users.id')
            ->select('tutorials.*', 'users.name')->orderBy('date', 'desc')->get();
        }
        else {
            $category= $_COOKIE['category'];
            $tutorials = DB::table('tutorials')->join('users', 'tutorials.user_id', '=', 'users.id')
            ->select('tutorials.*', 'users.name')->orderBy('date', 'desc')->get();//->where('category', [$category])
        }
        
        return view('pages/home',['tutorials'=>$tutorials]);
    }

    public function profile(Tutorial $tutorial)
    {
        $tutorials = DB::table('tutorials')->join('users', 'tutorials.user_id', '=', 'users.id')
        ->select('tutorials.*', 'users.name')->where('users.id', [auth()->id()])->get();
        
        return view('pages/profile',['tutorials'=>$tutorials]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/addTutorial');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tutorial = new Tutorial();
        $tutorial->user_id = auth()->id();
        $tutorial->title = $request->input('title');
        $tutorial->description = $request->input('description_0');

        $image=$request->file('image_0');
        $imageNew=rand()."-".time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/tutorials/'), $imageNew);

        $tutorial->title_picture = $imageNew;
        $tutorial->category = $request->input('category');
        $tutorial->save();

        $tutorialId = $tutorial->id;

        $materialsLength= $_COOKIE['materials'];
        for ($i = 1; $i <= $materialsLength; $i++) {
            $material = new Material();
            $material->tutorial_id = $tutorialId;
            $material->material = $request->input('materials_'.$i);
            $material->save();
        }

        $toolsLength= $_COOKIE['tools'];
        for ($i = 1; $i <= $toolsLength; $i++) {
            $tool = new Tool();
            $tool->tutorial_id = $tutorialId;
            $tool->tool = $request->input('tools_'.$i);
            $tool->save();
        }

        $stepsLength= $_COOKIE['steps'];
        for ($i = 1; $i <= $stepsLength; $i++) {
            $step = new Step();
            $step->tutorial_id = $tutorialId;
            $step->step = $i;

            $image=$request->file('image_'.$i);
            $imageNew=rand()."-".time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/tutorials/'), $imageNew);

            $step->picture = $imageNew;
            $step->description = $request->input('description_'.$i);
            $step->save();
        }
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tutorials = Tutorial::find($id);
        $materials = DB::table('materials')->where('tutorial_id', [$id])->orderBy('material', 'asc')->get();
        $tools = DB::table('tools')->where('tutorial_id', [$id])->orderBy('tool', 'asc')->get();
        $steps = DB::table('steps')->where('tutorial_id', [$id])->orderBy('step', 'asc')->get();
        $comments = DB::table('comments')->join('users', 'comments.user_id', '=', 'users.id')
        ->select('comments.*', 'users.name')->where('tutorial_id', [$id])->orderBy('date', 'desc')->get();

        return view('pages/showTutorial',['tutorials'=>$tutorials, 'materials'=>$materials, 'tools'=>$tools, 'steps'=>$steps, 'comments'=>$comments]);
    }

    public function showProfile($id)
    {
        $users=User::find($id);
        if ($id == auth()->id()) {
            $tutorials = DB::table('tutorials')->join('users', 'tutorials.user_id', '=', 'users.id')
            ->select('tutorials.*', 'users.name')->where('users.id', [auth()->id()])->get();
        
            return view('pages/profile',['tutorials'=>$tutorials]);
        }
        else {
            $tutorials = DB::table('tutorials')->join('users', 'tutorials.user_id', '=', 'users.id')
            ->select('tutorials.*', 'users.name')->where('users.id', [$id])->get();

            return view('pages/showProfile',['tutorials'=>$tutorials, 'users'=>$users]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
