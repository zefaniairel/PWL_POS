<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // JS4-Prak2.6
    public function index()
    {
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }

    public function tambah()
    {
        return view('user_tambah');
    }

    public function tambah_simpan(Request $request)
    {
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make('$request->password'),
            'level_id' => $request->level_id
        ]);

        return redirect('/user');
    }

    public function ubah($id)
    {
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }
    
    public function ubah_simpan($id, Request $request)
    {
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make('$request->password');
        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/user');
    }

    public function hapus($id)
    {
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user');
    }

}

    // public function index()
    // {
        // $user = UserModel::create([
        //     'username' => 'manager11',
        //     'nama' => 'Manager11',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2,
        // ]);

        // $user->username = 'manager12';

        // $user->save();

        // $user->wasChanged();    // true
        // $user->wasChanged('username'); // true
        // $user->wasChanged(['username', 'level_id']); // true
        // $user->wasChanged('nama');    // false
        // dd($user->wasChanged(['nama', 'username'])); // true

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