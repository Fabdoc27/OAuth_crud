<?php

namespace App\Http\Controllers;

use App\Mail\LoginLink;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller {
    public function login( Request $request ) {
        $this->validate( $request, [
            'email' => 'required|email|exists:users',
        ] );

        Mail::to( $request->email )->send( new LoginLink( $request->email ) );

        return back()->with( 'success', 'We have sent a magic login link to your email' );
    }

    public function loginByLink( User $user ) {
        auth()->login( $user );
        return redirect()->route( 'dashboard' );
    }

    public function logout( Request $request ) {
        auth()->logout();
        return redirect()->route( 'home' );
    }
}