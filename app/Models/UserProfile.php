<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone',
        'image',
        'birthday',
        'user_id',
        'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
   }
//   public function getImageAttribute($val)
//    {
//
//        return $val ? asset('assets/images/users/'.$val) : '';
//    }

}
