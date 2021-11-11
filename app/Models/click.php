<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class click extends Model
{
    use HasFactory;

    protected $fillable=[
        'shorturl_id',
        'ip',
        'browser',
    ];

    public function shorturl()
    {
        return $this->belongsTo(shorturl::class, 'shorturl_id' ,'id');
    }
}
