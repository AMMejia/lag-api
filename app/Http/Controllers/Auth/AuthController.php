<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Laravel\Passport\Client as OClient;
use App\Notifications\VerifyEmail;

class AuthController extends Controller
{
    /**
     * Log to the system.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request) {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $oClient = OClient::where('password_client', 1)->first();
            return $this->getTokenAndRefreshToken($oClient, request('email'), request('password'));
        }
        else {
            return response()->json(
                [
                    'message' => 'Credenciales incorrectas',
                    'error' => 'Unauthorised',
                ], 401);
        }
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
          'message' => 'Successfully logged out']);
    }

    /**
     * Get information of current User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    /**
     * Get old token and refresh to new token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTokenAndRefreshToken(OClient $oClient, $email, $password) {
        $oClient = OClient::where('password_client', 1)->first();
        $params = [
            'grant_type' => 'password',
            'client_id' => $oClient->id,
            'client_secret' => $oClient->secret,
            'username' => $email,
            'password' => $password,
            'scope' => '*',
        ];

        $req = Request::create('/oauth/token', 'POST', $params);
        $res = app()->handle($req);
        return $res;
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refreshToken(Request $request) {
        $refresh_token = $request->header('Refreshtoken');
        $oClient = OClient::where('password_client', 1)->first();

        try {
            $params = [
                'grant_type' => 'refresh_token',
                'refresh_token' => $request->header('Refreshtoken'),
                'client_id' => $oClient->id,
                'client_secret' => $oClient->secret,
                'scope' => '*',
            ];

            $req = Request::create('/oauth/token', 'POST', $params);
            $res = app()->handle($req);
            return $res;

        } catch (\Exception $e) {
            return response()->json("unauthorized", 401);
        }
    }

      /**
     * Register the client.
     *
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function register(Request $request)
    {
        $validation = \Validator::make($request->all(),[
            'email' => 'required|unique:users',
        ]);

        if($validation->fails()){
            $errors = $validation->errors();

            return response()->json([
                'message' => 'El usuario ya fue registrado',
                'errors' => $errors,
                'status' => 'error'
            ],403);
        }

        try{
            $user = new User();
            $user->name = $request->name;
            $user->email =  $request->email;
            $user->matricula =  $request->matricula;
            $user->password = bcrypt($request->password);
            $user->save();

            $user->notify(new VerifyEmail());
            return response()->json([
                'message' => 'Registro exitoso, verifica tu email para la confirmación.',
                'status' => 'success'
            ], 200);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

     /**
     * Resend email to client.
     *
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function resendEmail(Request $request)
    {
        try{
            $user = User::where('email', $request->email)->firstOrFail();

            if($user->resend_email == null){
                $user->update(["resend_email" => now()]);
                $user->notify(new VerifyEmail());
                return response()->json([
                    'message' => 'E-mail enviado con éxito.',
                    'status' => 'success'
                ], 200);
            } else {
                $date = new \Date($user->resend_email);
                if(now() >= $date->addMinutes(5))
                {
                    $user->update(["resend_email" => now()]);
                    $user->notify(new VerifyEmail());
                    return response()->json([
                        'message' => 'E-mail enviado con éxito.',
                        'status' => 'success'
                    ], 200);
                } else {
                    return response()->json([
                        'message' => 'Espera unos minutos para reenviar.',
                        'status' => 'success'
                    ], 200);
                }
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
