<?php

namespace App\Http\Controllers;
use App\Models\Tutorial;
use App\Models\Material;
use App\Models\Tool;
use App\Models\Step;
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
        $tutorials = $tutorial->all();
        return view('pages/home',['tutorials'=>$tutorials]);
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
        $image->move(public_path('/images/'), $imageNew);

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
            $image->move(public_path('/images/'), $imageNew);

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

        return view('pages/showTutorial',['tutorials'=>$tutorials, 'materials'=>$materials, 'tools'=>$tools, 'steps'=>$steps]);
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
