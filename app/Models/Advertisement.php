<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $fillable = [
        'start_date',
        'image',
        'end_date',
        'link',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
   }
}
