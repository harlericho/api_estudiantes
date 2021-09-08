<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccesoRequest;
use App\Http\Requests\RegistroRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AutenticarController extends Controller
{
    public function registroUser(RegistroRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json([
            'respuesta' => true,
            'mensaje' => 'Usuario registrado'
        ], 200);
    }
    public function AccesoUser(AccesoRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'mensaje' => ['Las credenciales son incorrectas'],
            ]);
        }

        $token = $user->createToken($request->email)->plainTextToken;
        return response()->json([
            'respuesta' => true,
            'token' => $token
        ],200);
    }
    public function salirUser(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'respuesta' => true,
            'token' => 'Token eliminado'
        ],200);
    }
}
