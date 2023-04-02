<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topup extends Model
{
    use HasFactory;
    protected $table = 'topup';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function topupUser()
    {
        return $this->hasOne(TopTopupUser::class, 'user_id');
    }

}
