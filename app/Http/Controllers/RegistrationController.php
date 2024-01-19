<?php

namespace App\Http\Controllers;

use App\Mail\LoginLink;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller {
    public function register( Request $request ) {
        $this->validate( $request, [
            'name'  => 'required|string',
            'email' => 'required|email',
        ] );

        User::create( [
            'name'  => $request->input( 'name' ),
            'email' => $request->input( 'email' ),
        ] );

        Mail::to( $request->email )->send( new LoginLink( $request->email ) );

        return back()->with( 'success', 'We have sent a magic login link to your email' );
    }
}