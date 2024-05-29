<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assist extends Model
{
    protected $id;

    use HasFactory;
    protected $fillable = [
        'id',
        'student_id'
    ];

    public function student() {
        return $this->belongsTo(Student::class); 
    }

}
