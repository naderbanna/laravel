<?php

namespace App\Http\Controllers;

use App\Models\myUser;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function index()

    {
        return myUser::all();
    }

    public function create(){
        //ensure first name, last name, and email are entered when creating a user
        request()->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
        ]);

        return myUser::create([
            'firstName' => request('firstName'),
            'lastName' => request('lastName'),
            'email' => request('email'),
        ]);
    }

    public function update(myUser $user){
        //require user id to update
        $success = $user->update([
            'firstName' => request('firstName'),
            'lastName' => request('lastName'),
            'email' => request('email'),
        ]);

        return [
            'success' => $success    
        ];
        //return true or false if update was successful
    }

    public function delete(myUser $user){
        //require user id to update
        $success = $user->update([
            'firstName' => request('firstName'),
            'lastName' => request('lastName'),
            'email' => request('email'),
        ]);

        return [
            'success' => $success    
        ];
        //return true or false if update was successful
        }
}
