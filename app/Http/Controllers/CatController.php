<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class CatController extends Controller
{
   public function create()
   {
    return view("categories.create");
   }

   public function display()
   {

        $cats=Cat::get();
        return view("categories.display",compact('cats'));


   }

   public function store(Request $request)
   {

    $data=$request->validate([
        'name'=>'required|min:1|max:50',
        'description'=>'required|min:5',
        'image'=>'image|mimes:png,jpg,gif'
    ]);

    $fileName=Storage::putFile("cats",$request->image);
    $request->image=$fileName;
    Cat::create([
        'name'=>$request->name,
        'description'=>$request->description,
        'image'=>$request->image

    ]);

    session()->flash("success","category added successfuly");
    return redirect(url('display'));

    }

    public function edit($id)
    {
        $cats=Cat::find($id);
        return view("categories.edit",compact('cats'));
    }


    public function update(Request $request,$id)
    {

        $data=$request->validate([
            'name'=>'required|min:1|max:50',
            'description'=>'required|min:5',
            'image'=>'image|mimes:png,jpg,gif'
        ]);

        $cat=Cat::find($id);
        if($request->has('image'))
        {
           Storage::delete($cat->image);
           $fileName=Storage::putFile("cats",$data['image']);
           $data['image']=$fileName;
        }

        $cat->update($data);
        session()->flash("success","category Updated successfuly");
        return redirect(url('display'));

    }

    public function delete($id)
    {
        $cat=Cat::find($id);

        Storage::delete($cat->image);

       $cat->delete();

       session()->flash("success","category deleted successfuly");
       return redirect(url('display'));

    }
}
