<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    // Menampilkan halaman awal user
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar User',
            'list' => ['Home', 'User'],
        ];

        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem',
        ];

        $activeMenu = 'user'; // Set menu yang sedang aktif

        return view('user.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    // Ambil data user dalam bentuk json untuk datatables
        public function list(Request $request)
        {
            $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
                ->with('level');
        return DataTables::of($users)
            // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) { // menambahkan kolom aksi
                $btn = '<a href="'.url('/user/' . $user->user_id).'" class="btn btn-info btnsm">Detail</a> ';
                $btn .= '<a href="'.url('/user/' . $user->user_id . '/edit').'" class="btn btnwarning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'.
        url('/user/'.$user->user_id).'">'
        . csrf_field() . method_field('DELETE') .
        '<button type="submit" class="btn btn-danger btn-sm" onclick="return
        confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
        })
        ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
        ->make(true);
        }

        // menampilkan halaman form tambah user
        public function create()
        {
            $breadcrumb = (object) [
                'title' => 'Tambah User',
                'list'  => ['Home', 'User', 'Tambah'],
            ];

            $page = (object) [
                'title' => 'Tambah user baru',
            ];

            $level = LevelModel::all(); // Ambil data level untuk ditampilkan di form
            $activeMenu = 'user'; // Set menu yang sedang aktif

            return view('user.create', [
                'breadcrumb' => $breadcrumb,
                'page'      => $page,
                'level'     => $level,
                'activeMenu' => $activeMenu,
            ]);
        }

        //Menyimpan data user baru
        public function store(Request $request)
        {
            $request->validate([
                'username' => 'required|string|min:3|unique:m_user,username', // username harus diisi, berupa string, minimal 3 karakter, dan unik di tabel m_user kolom username
                'nama'     => 'required|string|max:100', // nama harus diisi, berupa string, dan maksimal 100 karakter
                'password' => 'required|min:5', // password harus diisi dan minimal 5 karakter
                'level_id' => 'required|integer', // level_id harus diisi dan berupa angka
            ]);

            UserModel::create([
                'username' => $request->username,
                'nama'     => $request->nama,
                'password' => bcrypt($request->password), // password dienkripsi sebelum disimpan
                'level_id' => $request->level_id,
            ]);

            return redirect('/user')->with('success', 'Data user berhasil disimpan');
        }
        
        // Menampilkan detail user
        public function show(string $id)
        {
            // Ambil data user beserta informasi level-nya berdasarkan ID
            $user = UserModel::with('level')->find($id);

            // Buat data untuk breadcrumb (navigasi)
            $breadcrumb = (object) [
                'title' => 'Detail User',
                'list'  => ['Home', 'User', 'Detail'],
            ];

            // Buat data untuk judul halaman
            $page = (object) [
                'title' => 'Detail User',
            ];

            // Set menu yang sedang aktif
            $activeMenu = 'user';

            // Kembalikan view 'user.show' dengan data yang diperlukan
            return view('user.show', [
                'breadcrumb' => $breadcrumb,
                'page'      => $page,
                'user'      => $user,
                'activeMenu' => $activeMenu,
            ]);
        }

        //Menampilkan halaman form edit user
        public function edit(string $id)
        {
            $user = UserModel::find($id);
            $level = LevelModel::all();

            // Buat data untuk breadcrumb (navigasi)
            $breadcrumb = (object) [
                'title' => 'Edit User',
                'list'  => ['Home', 'User', 'Edit'],
            ];

            // Buat data untuk judul halaman
            $page = (object) [
                'title' => 'Edit User',
            ];

            $activeMenu = 'user'; // Set menu yang sedang aktif

            // Kembalikan view 'user.edit' dengan data yang diperlukan
            return view('user.edit', [
                'breadcrumb' => $breadcrumb,
                'page'      => $page,
                'user'      => $user,
                'level'     => LevelModel::all(),
                'activeMenu' => $activeMenu,
            ]);
        }

        // Menyimpan perubahan data user
        public function update(Request $request, string $id)
        {
            $request->validate([
                // username harus diisi, berupa string minimal 3 karakter
                // dan bernilai unik di tabel m_user kolom username kecuali untuk user dengan id yang sedang diedit
                'username' => 'required|string|min:3|unique:m_user,username,'. $id.',user_id',
                'nama'     => 'required|string|max:100', // nama harus diisi, berupa string, dan maksimal 100 karakter
                'password' => 'nullable|min:5', // password bisa diisi(minimal 5 karakter) dan bisa tidak diisi
                'level_id' => 'required|integer' // level_id harus diisi dan berupa angka
            ]);

            UserModel::find($id)->update([
                'username' => $request->username,
                'nama'     => $request->nama,
                'password' => $request->password ? bcrypt($request->password) : UserModel::find($id)->password,
                'level_id' => $request->level_id,
            ]);

            return redirect('/user')->with('success', 'Data user berhasil diubah');
        }

        // Menghapus data user
        public function destroy(string $id)
        {
            // Cari data user berdasarkan ID
            $check = UserModel::find($id);

            // Jika data user tidak ditemukan, tampilkan pesan error
            if (!$check) {
                return redirect('/user')->with('error', 'Data user tidak ditemukan');
            }

            try {
                UserModel::destroy($id); // Hapus data user/level

                // Jika berhasil dihapus, tampilkan pesan sukses
                return redirect('/user')->with('success', 'Data user berhasil dihapus');
            } catch (\Illuminate\Database\QueryException $e) {
                
                // Jika terjadi error saat menghapus (misalnya karena ada kendala dengan database atau relasi dengan tabel lain),
                // tampilkan pesan error yang lebih informatif
                return redirect('/user')->with('error', 'Gagal menghapus data user. Pastikan tidak ada data terkait lainnya.');
            }
        }
}

// {
    // JS4-Prak2.6
    // public function index()
    // {
    //     $user = UserModel::all();
    //     return view('user', ['data' => $user]);
    // }

//     public function tambah()
//     {
//         return view('user_tambah');
//     }

//     public function tambah_simpan(Request $request)
//     {
//         UserModel::create([
//             'username' => $request->username,
//             'nama' => $request->nama,
//             'password' => Hash::make('$request->password'),
//             'level_id' => $request->level_id
//         ]);

//         return redirect('/user');
//     }

//     public function ubah($id)
//     {
//         $user = UserModel::find($id);
//         return view('user_ubah', ['data' => $user]);
//     }
    
//     public function ubah_simpan($id, Request $request)
//     {
//         $user = UserModel::find($id);

//         $user->username = $request->username;
//         $user->nama = $request->nama;
//         $user->password = Hash::make('$request->password');
//         $user->level_id = $request->level_id;

//         $user->save();

//         return redirect('/user');
//     }

//     public function hapus($id)
//     {
//         $user = UserModel::find($id);
//         $user->delete();

//         return redirect('/user');
//     }

//     public function index()
//     {
//         $user = UserModel::with('level')->get();
//         dd($user);
//     }

// }

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