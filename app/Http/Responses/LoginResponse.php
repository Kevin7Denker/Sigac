<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $redirectPath = match (optional(Auth::user()->role)->nome ?? null) {
            'aluno'        => route('aluno.dashboard'),
            'coordenador'  => route('coordenador.dashboard'),
            default        => '/dashboard',
        };

        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect()->intended($redirectPath);
    }
}
