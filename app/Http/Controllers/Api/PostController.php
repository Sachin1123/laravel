<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Http\Requests\User\CreatePostRequest;
use Auth;
use Illuminate\Support\Facades\Validator;
class PostController extends Controller
{
    //
  
    public function getPost(){
        
        return new PostResource(Post::all());
    }

    public function storePost(CreatePostRequest $request){
      
       
     
        try {
            $data = $request->all();

            if(!empty($data['gallery'])){
                $imageName = time().'.'.$request->gallery->extension();  
                $request->gallery->move(public_path('images'), $imageName);
                $data['gallery']='/images/'.$imageName;
            }
            if(!empty($data['image'])){
                $imageName = time().'.'.$request->image->extension();  
               $request->image->move(public_path('images'), $imageName);
               $data['image']='/images/'.$imageName;
            }
           
           

            $post=Post::create($data);
            return new PostResource($post);
           
        } catch (\Exception $e) {
            $content = array(
                'success' => false,
               
                'message' => 'There was an error while processing your request: ' .
                    $e->getMessage()
            );
            return response($content)->setStatusCode(500);
        }
        
    }



    public function getPostId($id){
        $post = post::find($id);
        return new PostResource($post);
    }


}
