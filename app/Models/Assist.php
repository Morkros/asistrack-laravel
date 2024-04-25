<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assist extends Model
{
    protected $id;
    protected $fecha;

    use HasFactory;
    protected $fillable = [
        'id',
        'student_id',
        'fecha',
    ];

    public function student() {
        return $this->belongsto(Student::class); 
    }
}
