<html>
<head>
    <title>
        Ubah User
    </title>
</head>
<body>
    <h1>Form Ubah Data User</h1>
    <a href="/user">Kembali</a>
    <br><br>

    <form method="post" action="/PWL_POS/public/user/ubah_simpan/{{ $data->user_id }}">

        {{csrf_field()}}
        {{method_field('PUT')}}

        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="{{$data->username}}" placeholder="Masukkan Username">
        <br>
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="{{$data->nama}}" placeholder="Masukkan Nama">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" value="{{$data->password}}" placeholder="Masukkan Password">
        <br>
        <label for="level_id">Level ID</label>
        <input type="number" name="level_id" id="level_id" value="{{$data->level_id}}" placeholder="Masukkan ID Level">
        <br><br>
        <input type="submit" class="btn btn-success" value="Ubah">
    </form>
</body>
</html>