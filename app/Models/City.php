<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'country'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
