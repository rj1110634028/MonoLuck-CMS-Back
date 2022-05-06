<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locker extends Model
{
    use HasFactory;

    protected $fillable = [
        'lockerNo',
        'lockerEncoding',
        'userId',
    ];

    public function user()
    {
        return $this->belongsTo(user::class, 'userId', 'id');
    }

    public function record()
    {
        return $this->hasMany(record::class, 'id', 'lockerId');
    }
}
