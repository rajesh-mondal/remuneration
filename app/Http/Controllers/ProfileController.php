<?php

namespace App\Http\Controllers;
use App\Models\Descipline;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {
    public function show() {
        $user = Auth::user();
        return view( 'profile.show', ['user' => $user] );
    }

    public function edit() {
        $user = Auth::user();
        $disciplines = Descipline::all();
        $designations = Designation::all();
        return view( 'profile.edit', compact( 'user', 'disciplines', 'designations' ) );
    }

    public function update( Request $request ) {
        $user = Auth::user();

        $validatedData = $request->validate( [
            'name'           => 'required|string|max:255',
            'phone'          => 'nullable|string|max:15',
            'address'        => 'nullable|string|max:255',
            'designation_id' => 'nullable|exists:designations,id',
            'discipline_id'  => 'nullable|exists:disciplines,id',
        ] );

        $user->update( $validatedData );

        return redirect()->route( 'profile.edit' )->with( 'success', 'Profile updated successfully.' );
    }
}
