<?php

namespace App\Http\Controllers;

use App\Coating;
use App\Lense;
use Illuminate\Http\Request;

class LenseCoatingController extends Controller
{
    public function index(){
        $lenses = Lense::all();
        $coatings = Coating::all();
        return view('app.index')->with([
            'lenses' => $lenses,
            'coatings' => $coatings
        ]);
    }
    public function lens_save(Request $request){
        Lense::create($request->all());
        return redirect()->back()->with('success','Lens Created Successfully');
    }

    public function lens_update(Request $request){
        Lense::find($request->id)->update($request->all());
        return redirect()->back()->with('success','Lens Updated Successfully');
    }

    public function lens_delete(Request $request){
        Lense::find($request->id)->delete();
        return redirect()->back()->with('danger','Lens Deleted Successfully');
    }

    public function coating_save(Request $request){
        Coating::create($request->all());
        return redirect()->back()->with('success','Coating Created Successfully');
    }

    public function coating_update(Request $request){
        Coating::find($request->id)->update($request->all());
        return redirect()->back()->with('success','Coating Updated Successfully');
    }

    public function coating_delete(Request $request){
        Coating::find($request->id)->delete();
        return redirect()->back()->with('danger','Coating Deleted Successfully');
    }

    public function getLenses(){
        return Lense::all();
    }
    public function getCoatings(){
        return Coating::all();
    }
}
