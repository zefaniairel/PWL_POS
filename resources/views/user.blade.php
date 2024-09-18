<html>
    <head>
        <title>
            Data User
        </title>
    </head>
    <body>
        <h1> Data User</h1>
        <table border="1" cellpading="2" cellspacing="0">
            <tr>
                <th>Jumlah Pengguna</th>
                {{-- <th>Username</th> --}}
                {{-- <th>Nama</th>
                <th>ID Level Pengguna</th> --}}
            </tr>
            {{-- @foreach($data as $d) ini tidak --}}
            <tr>
                <td>{{ $data-> user_id }}</td>
                <td>{{ $data -> username }}</td>
                <td>{{ $data -> nama}} </td>
                <td>{{ $data -> level_id}} </td>
            </tr>
            {{-- @endforeach --}}
        </table>
    </body>
</html>