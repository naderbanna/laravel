<?php

namespace App\Http\Controllers;

use App\Models\myUser;
use Illuminate\Http\Request;
//use Illuminate\Validation\ValidationException;

class UserApiController extends Controller
{
    public function index()
    {
        //display all users in db
        return myUser::all();
    }

    public function create(){
        //require all 3 fields to create new user
        request()->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|unique:my_users,email',
        ]);

        //return the newly created user
        return [
            myUser::create([
                'firstName' => request('firstName'),
                'lastName' => request('lastName'),
                'email' => request('email'),
            ])
        ];
    }
    
    //require user id to update
    public function update(Request $request, myUser $user){
       
        //validate unique email
        $request->validate([
            'email' => 'unique:my_users,email'
        ]);

        //update only the provided db fields
        $success = $user->update($request->only(['firstName', 'lastName', 'email']));

        //return true or false if update was successful
        return [
            'success' => $success    
        ];
    }

    //require user id to update
    public function delete(myUser $user){
        //delete user
        $success = $user->delete();

        //return true or false if delete was successful
        return [
            'success' => $success    
        ];
        }
}
