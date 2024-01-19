<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller {
    public function index() {
        // return all contacts records
        $contacts = Contact::all();
        return view( 'contacts.index', compact( 'contacts' ) );
    }

    public function create() {
        return view( 'contacts.create' );
    }

    public function store( Request $request ) {
        $this->validate( $request, [
            'name'  => 'required',
            'phone' => 'required',
            'email' => 'required',
        ] );

        Contact::create( [
            'name'  => $request->input( 'name' ),
            'phone' => $request->input( 'phone' ),
            'email' => $request->input( 'email' ),
        ] );

        return redirect()->route( 'index' );
    }

    public function edit( string $id ) {
        $contact = Contact::findOrFail( $id );
        return view( 'contacts.edit', compact( 'contact' ) );
    }

    public function update( Request $request, string $id ) {
        $this->validate( $request, [
            'name'  => 'required',
            'phone' => 'required',
            'email' => 'required',
        ] );

        $contact = Contact::findOrFail( $id );

        $contact->update( [
            'name'  => $request->input( 'name' ),
            'phone' => $request->input( 'phone' ),
            'email' => $request->input( 'email' ),
        ] );

        return redirect()->route( 'index' );
    }

    public function destroy( string $id ) {
        Contact::find( $id )->delete();
        return redirect()->route( 'index' );
    }
}