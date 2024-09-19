<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = UserModel::create([
            'username' => 'manager11',
            'nama' => 'Manager11',
            'password' => Hash::make('12345'),
            'level_id' => 2,
        ]);

        $user->username = 'manager12';

        $user->save();

        $user->wasChanged();    // true
        $user->wasChanged('username'); // true
        $user->wasChanged(['username', 'level_id']); // true
        $user->wasChanged('nama');    // false
        dd($user->wasChanged(['nama', 'username'])); // true

        // $user = UserModel::create([
        //     'username' => 'manager55',
        //     'nama'=> 'Manager55',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2
        // ]);

        // $user->username = 'manager56';

        // $user->isDirty(); // True
        // $user->isDirty('username'); //True
        // $user->isDirty('nama'); // false
        // $user->isDirty(['nama', 'username']); // true

        // $user->isClean(); //false
        // $user->isClean('username'); // false
        // $user->isClean('nama'); // true
        // $user->isClean(['nama', 'username']); // false

        // $user->save();

        // $user->isDirty(); // false
        // $user->isClean(); // true
        // dd($user->isDirty());


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
        
        // 
        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager33',
        //         'nama'=> 'Manager Tiga Tiga',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2 
        //     ],
        // );

        // $user->save();
        // return view('user', ['data' => $user]);

    }
}