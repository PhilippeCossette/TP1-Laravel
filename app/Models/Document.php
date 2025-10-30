<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'file_path', 'user_id'];

    protected $casts = [
        'title' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
