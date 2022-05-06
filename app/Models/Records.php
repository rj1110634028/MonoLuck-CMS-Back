<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class record extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'description',
        'lockerId',
        'userId',
    ];
    public function user()
    {
        return $this->belongsTo(user::class,'id' ,'userId');
    }

    public function locker()
    {
        return $this->belongsTo(locker::class,'id' ,'lockerId');
    }

}
