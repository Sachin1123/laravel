<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\TokenResource;

use App\Http\Requests\User\CreateUserRequest;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\HasApiTokens;

class UserController extends Controller
{
  
    public function getUser()
    {
        return new UserResource(User::all());
    }

    public function getUserId($id){
        $user = user::find($id);
        return new UserResource($user);
    }

  
    public function createUser(CreateUserRequest $request)
    {   
        try 
        {
            $data = $request->all();
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password =bcrypt($data['password']);
            $user->save();
            $token = $user->createToken('LaravelAuthApp')->accessToken;
            $user->token = $token;
            return new TokenResource($user);
        } 
        catch (\Exception $e) 
        {
            $content = array(
            'success' => false,
            'message' => 'There was an error while processing your request: ' .
            $e->getMessage()
            );
            return response($content)->setStatusCode(500);
        }

    }

    public function updateUser(Request $request)
    {
        
        if(auth()->user()){
      
            $user=auth()->user();
            $user->name = $request->name ??  $user->name ;
          
            if (!empty($request->password))
            {
                $user->password = bcrypt($request->password);
            }
            $user->first_name = $request->first_name ?? $user->first_name;
            $user->last_name = $request->last_name ?? $user->last_name;
            $user->gender = $request->gender ?? $user->gender;
            $user->address = $request->address ?? $user->address;
            $user->zip_code = $request->zip_code ?? $user->zip_code;
            $user->city = $request->city ?? $user->city;
            $user->state = $request->state ?? $user->state;
            $user->country = $request->country ?? $user->country;
            $user->save();
            return new UserResource($user);
       
        }
  
    }



    public function login(CreateUserRequest $request)
    {
        
        $data = $request->all();     
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data))
        {
            $user = auth()->user();
            $token = $user->createToken('MyApp')->accessToken;
            $user->token = $token;
            return new TokenResource($user);
        }
    
    }
        
           
      
        
    
    

   

   
     
  

    

}