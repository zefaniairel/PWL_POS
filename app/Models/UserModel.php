<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user';        //mendefinisikannamatabel yg digunakan oleh model lain
    protected $primaryKey = 'user_id';  //mendefinisikan primary key dari tabel yg digunakan
}
