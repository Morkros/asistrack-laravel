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
        'birthdate',
    ];

    public function assist(){
        return $this -> hasMany(Assist::class);
    }

    public function grade(){
        return $this -> hasOne(Grade::class);
    }

    public function percentage () {
        $parameter = Parameter::find(1)->get();
        $classDays = $parameter[0]->total_class_days;
        $perRegular = $parameter[0]->regular;
        $perProm = $parameter[0]->promotion;

        

       //dd($classDays, $perRegular, $perProm);
        return 60;
    }
}
