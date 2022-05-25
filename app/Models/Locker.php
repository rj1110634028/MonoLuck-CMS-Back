<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
    use HasFactory;

    protected $fillable = [
        'lockerNo',
        'lockerEncoding',
        'userId',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    public function Record()
    {
        return $this->hasMany(Record::class, 'lockerId', 'id');
    }
}
