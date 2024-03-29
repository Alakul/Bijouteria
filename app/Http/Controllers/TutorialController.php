<?php

namespace App\Http\Controllers;
use App\Models\Tutorial;
use App\Models\Material;
use App\Models\Tool;
use App\Models\Step;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Redirect;
use DB;
use File;
use Storage;

class TutorialController extends Controller
{
    public function index()
    {
        $tutorials = DB::table('tutorials')->join('users', 'tutorials.user_id', '=', 'users.id')
        ->select('tutorials.*', 'users.name')->orderBy('date', 'desc')->paginate(30);
        
        return view('pages/home',['tutorials'=>$tutorials]);
    }

    public function gallery($categorySelected)
    {
        $tutorials = DB::table('tutorials')->join('users', 'tutorials.user_id', '=', 'users.id')
        ->select('tutorials.*', 'users.name')->where('category', $categorySelected)->orderBy('date', 'desc')->paginate(30);
        
        return view('pages/home',['tutorials'=>$tutorials]);
    }

    public function search($keyword)
    {
        $tutorials = DB::table('tutorials')->join('users', 'tutorials.user_id', '=', 'users.id')
        ->select('tutorials.*', 'users.name')->where('tutorials.title', 'like', '%' . $keyword . '%')->orderBy('date', 'desc')->paginate(30);
        
        return view('pages/home',['tutorials'=>$tutorials]);
    }

    public function searchEdit()
    {
        return view('pages/showSearch');
    }

    public function searchForm(Request $request)
    {
        $keyword = $request->input('search');
        if ($keyword==null) {
            return Redirect::to('/') ;
        }
        return Redirect::to('wyszukiwanie/'.$keyword);
    }

    public function create()
    {
        $categories=DB::table('categories')->get();
        return view('pages/user/addTutorial',['categories'=>$categories]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=> 'required',
        ]);

        $tutorial = new Tutorial();
        $tutorial->user_id = auth()->id();
        $tutorial->title = $request->input('title');
        $tutorial->description = $request->input('description_0');

        $image=$request->file('image_0');
        $imageNew=rand().time().'.'.$image->getClientOriginalExtension();
        Storage::disk('public')->putFileAs('tutorialsIMG', $image, $imageNew, 'public');

        $tutorial->title_picture = $imageNew;
        $tutorial->category = $request->input('category');
        $tutorial->save();

        $tutorialId = $tutorial->id;

        $materialsLength = $request->input('materials_length');
        for ($i = 1; $i <= $materialsLength; $i++) {

            $this->validate($request,[
                'material_'.$i=> 'required',
            ]);

            $material = new Material();
            $material->tutorial_id = $tutorialId;
            $material->lp = $i;
            $material->material = $request->input('material_'.$i);
            $material->save();
        }

        $toolsLength = $request->input('tools_length');
        for ($i = 1; $i <= $toolsLength; $i++) {

            $this->validate($request,[
                'tool_'.$i=> 'required',
            ]);

            $tool = new Tool();
            $tool->tutorial_id = $tutorialId;
            $tool->lp = $i;
            $tool->tool = $request->input('tool_'.$i);
            $tool->save();
        }

        $stepsLength = $request->input('steps_length');
        for ($i = 1; $i <= $stepsLength; $i++) {

            $this->validate($request,[
                'description_'.$i=> 'required',
            ]);

            $step = new Step();
            $step->tutorial_id = $tutorialId;
            $step->step = $i;

            $image=$request->file('image_'.$i);
            $imageNew=rand().time().'.'.$image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('tutorialsIMG', $image, $imageNew, 'public');

            $step->picture = $imageNew;
            $step->description = $request->input('description_'.$i);
            $step->save();
        }
        
        return redirect()->back()->with('success', 'Poradnik został opublikowany.');
    }

    public function show($id)
    {
        $tutorials = Tutorial::find($id);
        $materials = DB::table('materials')->where('tutorial_id', [$id])->orderBy('lp', 'asc')->get();
        $tools = DB::table('tools')->where('tutorial_id', [$id])->orderBy('lp', 'asc')->get();
        $steps = DB::table('steps')->where('tutorial_id', [$id])->orderBy('step', 'asc')->get();
        $comments = DB::table('comments')->join('users', 'users.id', '=', 'comments.user_id')
        ->join('profiles', 'users.id', '=', 'profiles.user_id')
        ->select('comments.*', 'users.name', 'profiles.avatar')->where('tutorial_id', [$id])->orderBy('date', 'desc')->get();

        $profiles = Profile::where('user_id', $tutorials->user_id)->first();
        $users=User::find($tutorials->user_id);

        return view('pages/showTutorial',['tutorials'=>$tutorials, 'materials'=>$materials, 'tools'=>$tools,
        'steps'=>$steps, 'comments'=>$comments, 'profiles'=>$profiles, 'users'=>$users]);
    }

    public function edit($id)
    {
        $tutorials = Tutorial::find($id);
        $materials = DB::table('materials')->where('tutorial_id', [$id])->orderBy('material', 'asc')->get();
        $tools = DB::table('tools')->where('tutorial_id', [$id])->orderBy('tool', 'asc')->get();
        $steps = DB::table('steps')->where('tutorial_id', [$id])->orderBy('step', 'asc')->get();
        $categories=DB::table('categories')->get();

        return view('pages/user/editTutorial',['tutorials'=>$tutorials, 'materials'=>$materials, 'tools'=>$tools,
        'steps'=>$steps, 'categories'=>$categories]);
    }

    public function update(Request $request, $id)
    {
        $tutorial = Tutorial::where('id', $id)->first();
        $tutorial->title = $request->input('title');
        $tutorial->description = $request->input('description_0');

        $image=$request->file('image_0');
        if ($image!=null){
            $imageOld = $tutorial->title_picture;
            unlink(storage_path('app/public/tutorialsIMG/'.$imageOld));

            $imageNew=rand().time().'.'.$image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('tutorialsIMG', $image, $imageNew, 'public');
            $tutorial->title_picture = $imageNew;
        }
        $tutorial->category = $request->input('category');
        $tutorial->save();

        $materialsLength = $request->input('materials_length');
        for ($i = 1; $i <= $materialsLength; $i++) {
            $material = Material::where('tutorial_id', $id)->where('lp', '=', $i)->first();
            $material->material = $request->input('material_'.$i);
            $material->lp = $i;
            $material->save();
        }

        $toolsLength = $request->input('tools_length');
        for ($i = 1; $i <= $toolsLength; $i++) {
            $tool = Tool::where('tutorial_id', $id)->where('lp', '=', $i)->first();
            $tool->lp = $i;
            $tool->tool = $request->input('tool_'.$i);
            $tool->save();
        }

        $stepsLength = $request->input('steps_length');
        for ($i = 1; $i <= $stepsLength; $i++) {
            $step = Step::where('tutorial_id', '=', $id)->where('step', '=', $i)->first();

            $image=$request->file('image_'.$i);
            if ($image!=null){
                $imageOld = $step->picture;
                unlink(storage_path('app/public/tutorialsIMG/'.$imageOld));

                $imageNew=rand().time().'.'.$image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('tutorialsIMG', $image, $imageNew, 'public');
                $step->picture = $imageNew;
            }
            $step->description = $request->input('description_'.$i);
            $step->save();
        }

        return redirect()->back()->with('success', 'Zmiany zostały zapisane.');
    }

    public function destroy($id)
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
}
