<?php

namespace App\Http\Controllers;

use App\Models\Descipline;
use App\Models\Designation;
use App\Models\Role;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request ) {
        if ( $request->ajax() ) {
            $data = User::latest()->get();
            return DataTables::of( $data )
                ->addColumn( 'discipline', function ( $data ) {
                    if($data->discipline){
                        return $data->discipline['name'];
                    }                   
                } )
                ->addColumn( 'designation', function ( $data ) {
                    if($data->designation){
                        return $data->designation['name'];
                    }                    
                } )
                ->addColumn( 'role', function ( $data ) {
                    if($data->role){
                        return $data->role['name'];
                    }                    
                } )
                ->addColumn( 'action', function ( $data ) {
                    $button = '<a href="' . route( 'user.edit', $data->id ) . '" class="edit btn btn-primary">Edit</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" route="' . route( 'user.destroy', $data->id ) . '" class="delete btn btn-danger">Delete</button>';
                    return $button;
                } )
                ->rawColumns( ['discipline', 'designation', 'role', 'action'] )
                ->rawColumns( ['action'] )
                ->addIndexColumn()
                ->make( true );
        }

        return view( 'user.index' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $disciplines = Descipline::all();
        $designations = Designation::all();
        $roles = Role::all();

        return view( 'user.create', compact( 'disciplines', 'designations', 'roles' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $request->validate( [
            'name'           => 'required|string|max:255',
            'email'          => 'required|string|max:255',
            'phone'          => 'nullable|max:15|unique:users',
            'address'        => 'nullable|string|max:255',
            'password'       => 'required|string|min:8',
            'designation_id' => 'nullable',
            'descipline_id'  => 'nullable',
            'role_id'        => 'nullable',
        ] );

        // $input = $request->all();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->designation_id = $request->designation_id;
        $user->descipline_id = $request->descipline_id;
        $user->role_id = $request->role_id;

        $user->save();

        $notification = array( 'message' => 'User Added!', 'alert-type' => 'success' );
        return redirect()->route( 'user.index' )->with( $notification );

        // User::create($input);
        // return redirect()->route('user.index')->with('success', 'New User has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id ) {
        $user = User::findOrFail( $id );
        $disciplines = Descipline::all();
        $designations = Designation::all();
        $roles = Role::all();
        return view( 'user.edit', compact( 'user', 'disciplines', 'designations', 'roles' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id ) {

        $user = User::findOrFail( $id );

        if ( $user->phone == $request->phone ) {
            $request->validate( [
                'name'           => 'required|string|max:255',
                'phone'          => 'nullable|max:15',
                'address'        => 'nullable|string|max:255',
                'designation_id' => 'nullable',
                'descipline_id'  => 'nullable',
                'role_id'        => 'nullable',
            ] );
        } else {
            $request->validate( [
                'name'           => 'required|string|max:255',
                'phone'          => 'nullable|max:15|unique:users',
                'address'        => 'nullable|string|max:255',
                'designation_id' => 'nullable',
                'descipline_id'  => 'nullable',
                'role_id'        => 'nullable',
            ] );
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->designation_id = $request->designation_id;
        $user->descipline_id = $request->descipline_id;
        $user->role_id = $request->role_id;

        $user->save();

        $notification = array( 'message' => 'User Updated!', 'alert-type' => 'success' );
        return redirect()->route( 'user.index' )->with( $notification );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        $user = User::findOrFail( $id );
        $user->delete();

        $notification = array( 'message' => 'User Deleted', 'alert-type' => 'success' );
        return redirect()->back()->with( $notification );
    }
}
