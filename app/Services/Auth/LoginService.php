<?php

//use vendor\Tymon\JWTauth\JWTGuard;
namespace App\Services\Auth;


use Exception;

class LoginService{

    /**
     * @throws Exception
     */

    public function execute(array $credentials)
    {
            //Autenticar por 6 horas
            if (!$token = auth()->setTTL(6*60)->attempt(($credentials)))
                throw new Exception("Não Autorizado", 401);
      
            return ['acess_token' => $token,
                'token_type' => 'Bearer',
                'expires_in' => auth()->factory()->getTTL(),
                'user' => auth()->user(),
            ];               
    }

}