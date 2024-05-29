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
        'grade',
    ];

    public function assist()
    {
        return $this->hasMany(Assist::class);
    }

    public function grade()
    {
        return $this->hasOne(Grade::class);
    }

    public function percentage($idAlumno)
    {
        $parameter = Parameter::find(1);

        if ($parameter === null) {
            $assistPercent = 0;
            return $assistPercent;
        } else {
            $classDays = $parameter->total_class_days;

            $assists = Assist::where('student_id', $idAlumno)
                ->count();

            if ($classDays != 0) {
                $assistPercent = ($assists / $classDays) * 100;
                $assistPercent = number_format($assistPercent, 2);
            } else {
                $assistPercent = 0;
            }

            return $assistPercent;
        }
    }

    public function conditionSimple($idAlumno)
    {
        $parameter = Parameter::find(1);

        if ($parameter == null || $parameter->count() == 0) {
            //si $parameter es nulo se asigna valor
            $perRegular = 0;
            $perProm = 0;
        } else {
            $perRegular = $parameter->regular;
            $perProm = $parameter->promotion;
        }

        $percentage = $this->percentage($idAlumno);

        if ($percentage < $perRegular) {
            $condition = 'Libre';
        } else if ($percentage < $perProm && $percentage >= $perRegular) {
            $condition = 'Regular';
        } else {
            $condition = 'Promocionado';
        }

        return $condition;
    }

    public function condition($idAlumno)
    {
        $studentCondition = $this->conditionSimple($idAlumno);

        switch ($studentCondition) {
            case 'Libre':
                $class = 'text-red-400';
              break;
            case 'Regular':
                $class = '';
              break;
            case 'Promocionado':
              //code block
              $class = 'text-green-400';
          }

        return "<td class=\"{$class} border-b border-gray-600 px-4 py-2 text-center\">{$studentCondition}</td>";
    }
}
