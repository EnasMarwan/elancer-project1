<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shorturl extends Model
{
    use HasFactory;

    
    // protected $primaryKey='user_id';

    protected $fillable=[
        'longurl',
        'shorturl'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id' ,'id');
    }

    public function clicks()
    {
        return $this->hasMany(click::class, 'shorturl_id', 'id');
    }
}
