<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\PostResource;

use App\Models\User;
use App\Models\Post;

use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
  
    public function getUser(){
        return new UserResource(User::all());
    }

    public function storePost(Request $request){
       
        $data = $request->all();

        $validator = \Validator::make($request->all(), [
            'title' => 'required',
                'image' => 'required',
                'gallery' => 'required',
                'description' => 'required',
        ]);

        if ($validator->fails()) {
           return response()->json($validator->errors(), 422);
        }
        try {
 
            if(!empty($data['gallery'])){
                $imageName = time().'.'.$request->gallery->extension();  
                $request->gallery->move(public_path('images'), $imageName);
                $imgPath='/images/'.$imageName;
            }
            if(!empty($data['image'])){
                $imageName = time().'.'.$request->image->extension();  
               $request->image->move(public_path('images'), $imageName);
               $GalleryPath='/images/'.$imageName;
            }
            $Post = new Post();
            $Post->title = $data['title'];
            $Post->description = $data['description'];
            $Post->gallery = $GalleryPath;
            $Post->image = $imgPath;

            $Post->save();

         
            return new PostResource($Post);
            return response($content)->setStatusCode(200);
        } catch (\Exception $e) {
            $content = array(
                'success' => false,
                'data' => 'something went wrong.',
                'message' => 'There was an error while processing your request: ' .
                    $e->getMessage()
            );
            return response($content)->setStatusCode(500);
        }
        
    }
}
