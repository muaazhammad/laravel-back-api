<?php                     //controller for login and register and logout user, get user apis

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterAuthRequest;
use App\User;
use http\Exception;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;



class ApiController extends Controller
{
    public $loginAfterSignUp = true;

    public function register(RegisterAuthRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        if ($this->loginAfterSignUp) {
            return $this->login($request);
        }

        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }

    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $jwt_token = null;

        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }
        return response()->json([
            'success' => true,
            'token' => $jwt_token,
        ]);
    }

    public function logout(Request $request)
    {

        // Get JWT Token from the request header key "Authorization"
        $token = $request->header("Authorization");
        // Invalidate the token
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json([
                "status" => "success",
                "message"=> "User successfully logged out."
            ]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json([
                "status" => "error",
                "message" => "Failed to logout, please try again."
            ], 500);
        }

    }



    public function getAuthUser(Request $request)
    {

//        $this->validate($request, [
//            'token' => 'required'
//        ]);
        if($request->header("Authorization")) {

            $user = JWTAuth::authenticate($request->header("Authorization"));

            return response()->json(['user' => $user]);
        }
        else {
            return response()->json(['Message' => 'Please provide the token']);

        }
    }

}
