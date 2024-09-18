<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        //JS4-PR2.4
        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager22',
        //         'nama'=> 'Manager Dua Dua',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        // return view('user', ['data' => $user]);
        
        // JS4-PR2.4
        $user = UserModel::firstOrNew(
            [
                'username' => 'manager33',
                'nama'=> 'Manager Tiga Tiga',
                'password' => Hash::make('12345'),
                'level_id' => 2 
            ],
        );

        $user->save();
        return view('user', ['data' => $user]);

    }
}