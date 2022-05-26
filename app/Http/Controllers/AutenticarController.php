<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AccesoRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistroRequest;
use Illuminate\Validation\ValidationException;

class AutenticarController extends Controller
{
    public function registro(RegistroRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return response()->json([
            'resp' => true,
            'msg' => 'Usuario creado exitosamente'
        ],200);

    }

    public function acceso(AccesoRequest $request)
    {
        
    $user = User::where('email', $request->email)->first();
    

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['Las credenciales son incorrectas'],
        ]);
    }

    $token = $user->createToken($request->email)->plainTextToken;

    return response()->json([
        'resp' => true,
        'msg' => 'Acceso correcto',
        'Token' => $token
    ],200);
 

    }

    public function cerrarsesion(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'msg' => 'Se cerro la session y se borro el token'
        ]);

    }
}
