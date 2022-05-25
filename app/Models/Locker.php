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

    public function User()
    {
        return $this->belongsTo(user::class, 'userId', 'id');
    }

    public function Record()
    {
        return $this->hasMany(record::class, 'lockerId', 'id');
    }
}
