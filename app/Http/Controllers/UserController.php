<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller{

    public function index(){
        
        $users = User::all();

        return view('admin.users',compact('users'));
    }

    public function create(){
        // Created via Social login
    }

    public function store(Request $request){
        // Created via Social login
    }

    public function show($id){
        // Not applicable
    }

    public function edit($id){
        // Not applicable
    }

    public function update(Request $request, $id){
        // Not applicable
    }

    public function destroy($id){
        // Not applicable
    }

}
