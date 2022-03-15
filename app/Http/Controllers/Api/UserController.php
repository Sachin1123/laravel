<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Requests\User\CreateUserRequest;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\HasApiTokens;

class UserController extends Controller
{
  
    public function getUser(){
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
        $User = new User();
        $User->name = $data['name'];
        $User->email = $data['email'];
        $User->password =bcrypt($data['password']);
        $User->save();
        return new UserResource($User);
    } 
    catch (\Exception $e) {
        $content = array(
        'success' => false,
        'data' => 'something went wrong.',
        'message' => 'There was an error while processing your request: ' .
        $e->getMessage()
        );
            return response($content)->setStatusCode(500);
    }
    }

      public function updateUser(Request $request)
      {
        
        print_r('auth()->user()');die;
        $data = $request->all();     
        try {
            $data = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ];
        $userProfile = User::where('id', Auth::id())->update($data);
        print_r(Auth::id()); die;
        return new UserResource($data);
        }
        catch (\Exception $e) {
        $content = array(
            'success' => false,
            'data' => 'something went wrong.',
            'message' => 'There was an error while processing your request: ' .
            $e->getMessage()
        );
        return response($content)->setStatusCode(500);
            
        }}



        public function Login(CreateUserRequest $request)
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
            // print_r($token); die;
            return response()->json(['success' => false, 'message' => $token->token ]);
            $user = auth()->user();
            $user->token = $token;
            return new UserResource($user);
        } else
        {
            $data = User::Where('email', $request->email)->first();
            if (!$data)
            {
                return response()->json(['success' => false, 'message' => "User Doesn't Exists. Please Sign Up"], 400);
            } else
            {
                return response()->json(['success' => false, 'message' => "Password is incorrect. Try Again!"], 400);
            }
        }
    }
        
           
      
        
    
    

   

   
     
  

    

}