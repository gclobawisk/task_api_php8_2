<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Support\Facades\Auth;


//use App\Services\Auth;
use App\Services\Auth\LoginService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    private $loginService;

    public function __construct(LoginService $loginService){

        $this->loginService = $loginService;

    }

    public function login(Request $request){

        try {

            $request->password = Hash::make($request->password);
            
            $credencials = $request->only('email', 'password');
            $auth = $this->loginService->execute($credencials);

            
            return response()->json($auth);
            
        } catch (\Exception $ex) {

            return response()->json(['error' => true, 'message' => $ex->getMessage()]);
        }
        
    }

    public function logout(){

        try {         
            
            
            auth()->logout(true);
            echo "Deslogado com sucesso!";

        } catch (Exception $ex) {

            return response()->json(['error' => true, 'message' => $ex->getMessage()]);
        }
        
    }


}
