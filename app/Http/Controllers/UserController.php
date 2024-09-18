<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {

        // JS 4 - PR2.1
        $user = UserModel::findOr(1, ['username', 'nama'], function() {
            abort(404);
        }) ;
        return view('user', ['data' => $user]);


        // tambah data user dengan Eloquent Model
        // JS4 - Pr1
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password'=> Hash::make('12345')
        // ];
        // UserModel::create($data);

        // UserModel::where('username', 'customer-1')->update($data); //update data user

        // // tambah data user dengan Eloquent Model
        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 3
        // ];
        // UserModel::insert($data); // tambahkan data ke tabel m_user
        
        //coba akses model UserModel
        // $user = UserModel::all(); //ambill semua data dari tabel m_user
        // return view('user', ['data' => $user]);

        // JS4 - Pr2.1 , find
        // $user = UserModel::find(1); 
        // return view('user', ['data' => $user]);

        // // JS4 - Pr2.1 , where
        // $user = UserModel::where('level_id', 1)->first(); 
        // return view('user', ['data' => $user]);

        // JS4 - Pr2.1 , firstwhere
        // $user = UserModel::firstWhere('level_id', 1); 
        // return view('user', ['data' => $user]);


    }

}
