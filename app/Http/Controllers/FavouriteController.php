<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use Illuminate\Http\Request;
use DB;

class FavouriteController extends Controller
{
    public function index()
    {
        $tutorials = DB::table('tutorials')->join('favourites', 'tutorials.id', '=', 'favourites.tutorial_id')
        ->select('tutorials.*', 'favourites.*')->where('favourites.user_id', [auth()->id()])->where('favourites.state', "y")->orderBy('favourites.id', 'desc')->paginate(8);

        return view('pages/favourites',['tutorials'=>$tutorials]);
    }

    public function add($id)
    {
        $favourite = Favourite::where('tutorial_id', $id)->where('user_id', auth()->id())->first();
        if ($favourite==null){
            $favourite = new Favourite();
            $favourite->user_id = auth()->id();
            $favourite->tutorial_id = $id;
            $favourite->state = "y";
            $favourite->save();

            return redirect()->back()->with('success', 'Dodano do ulubionych.');
        }
        else if ($favourite->state == "n") {
            $favourite->state = "y";
            $favourite->save();

            return redirect()->back()->with('success', 'Dodano do ulubionych.');  
        }
        else {
            return redirect()->back()->with('fail', 'Poradnik należy do ulubionych.');
        }
    }

    public function destroy($id)
    {
        $favourite = Favourite::find($id);
        $favourite->state = "n";
        $favourite->save();
        
        return redirect()->back()->with('success', 'Poradnik został usunięty z ulubionych.');
    }
}
