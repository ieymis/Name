<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return User::all();
        // return 'all';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required','string'],
        //     'email' => ['required', 'email', 'unique:users,email'],
        //     'PhoneNumber' =>[ 'required' ,'phone:mobile,SA'],
        //     'password'=>['required','min:6']
        // ]);
        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required','string'],
                'email' => ['required', 'email', 'unique:users,email'],
                'PhoneNumber' =>[ 'required' ,'phone:mobile,SA'],
                'password'=>['required','min:6']
            ], [
                'required' => 'The :attribute field is required.',
                'min' => 'The :atrribute should be greeeeeeeater than :min',
                'phone'=> ' must be saudi number'
            ],
            [
                'email' => 'E-maill'
            ]
        );

        $validator->validate();

        // return User::create($request->all());

        return User::create([
            'name'=> $request->name,
            'age'=> $request->age,
            'PhoneNumber'=> '966'. ltrim($request->PhoneNumber, '0'),
            'gender'=> $request->gender,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),


        ]);



        return 'store';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return User::where('id',$id)->get();
        return 'show';

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return User::where('id',$id)->get();
        return 'edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        return 'update';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return 'destroy';
    }
}
