<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatResource;
use App\Models\Cat;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CatController extends Controller
{
    public function all()
    {
        $cats=Cat::all();
        return CatResource::collection($cats); //return data as JSON
    }


    public function show($id)
    {
        $cat=Cat::find($id);
        if($cat==null)
        {
            return response()->json([
                'msg'=>'not found'
            ]);
        }
        return new CatResource($cat);
    }

    public function create(Request $request)
    {
        $validate=Validator::make($request->all(),[
        'name'=>'required|min:2|max:50',
        'description'=>'required|min:5',
        'image'=>'image|mimes:png,jpg',

        ]);
        if($validate->fails())
        {
            return response()->json([
                'msg'=>$validate->errors(),
            ]);

        }

        $filename=Storage::putFile('cats',$request->image);
        $cats=Cat::create([
        'name'=>$request->name,
        'description'=>$request->description,
        'image'=>$filename,
        ]);
        return response()->json([
            'msg'=>'data inserted succesfully',
            'data'=>new CatResource($cats),
        ]);

    }

    public function update(Request $request,$id)
    {
        $cat=Cat::find($id);

        if($cat==null)
        {
            return response()->json([
                'msg'=>"not found",
            ]);
        }
        $validate=Validator::make($request->all(),[
            'name'=>'required|min:2|max:50',
            'description'=>'required|min:5',
            'image'=>'image|mimes:png,jpg',
        ]);

        if($validate->fails())
        {
            return response()->json([
                'msg'=>$validate->errors(),
            ]);
        }

        if($request->has('image'))
        {
            Storage::delete($cat->image);
            $filename=Storage::putFile('cats',$request->image);
        }

       $cat->update([
        'name'=>$request->name,
        'description'=>$request->description,
        'image'=>$filename,
       ]);

        return response()->json([
            'msg'=>'data updated succesfully',
            'data'=>new CatResource($cat),
        ]);
    }


    public function destory($id)
    {
        $cat=Cat::find($id);
        if($cat==null)
        {
            return response()->json([
                'msg'=>'not found'
            ]);
        }

        Storage::delete($cat->image);
        $cat->delete($id);

        return response()->json([
            'msg'=>'data deleted succesfully',
            'data'=>new CatResource($cat),
        ]);
    }

}
