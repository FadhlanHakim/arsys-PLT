<?php

namespace App\Models\ArSys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudySpecializationPivot extends Model
{
    use HasFactory;
    protected $fillable = [];
    protected $table = 'arsys_study_specialization_pivot';

    public function data(){
        return $this->belongsTo(StudySpecialization::class,  'specialization_id', 'id');
    }

}
