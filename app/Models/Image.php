<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'path',
        'title'
    ];

    public function uploader()
    {
        $this->belongsTo(User::class);
    }

}
