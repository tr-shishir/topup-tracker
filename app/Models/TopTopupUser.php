<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopTopupUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'count',
        'total_amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function topup()
    {
        return $this->hasMany(Topup::class, 'user_id', 'user_id');
    }
}
