<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class AuctioneerRegistration extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
        'no_telepon',
        'tanggal_lahir',
        'no_ktp',
        'foto_ktp',
        'foto_profil',
        'nama_usaha',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
