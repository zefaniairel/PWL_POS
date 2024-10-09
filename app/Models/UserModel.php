<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable; // implementasi class authenticatable
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'm_user';        //mendefinisikannamatabel yg digunakan oleh model lain
    protected $primaryKey = 'user_id';  //mendefinisikan primary key dari tabel yg digunakan

    // The attributes that are mass assignable.

    protected $fillable = ['username', 'password', 'nama', 'level_id', 'created_at', 'updated_at'];

    protected $hidden = ['password']; //jangan di tampilkan saat select

    protected $casts = ['password' => 'hashed']; //casting password agar otomatis di hash

    /**
     * Relasi ke tabel leve
     */
    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    public function barang():HasMany
    {
        return $this->hasMany(StockModel::class, 'stock_id', 'stock_id');
    }
}
