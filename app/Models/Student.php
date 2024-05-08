<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $id;
    
    protected $fillable = [
        'id',
        'dni',
        'name',
        'lastname',
        'birthdate'
    ];

    public function assist(){
        return $this -> hasmany(Assist::class);
    }
}
