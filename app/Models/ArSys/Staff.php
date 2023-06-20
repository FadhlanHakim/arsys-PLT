<?php

namespace App\Models\ArSys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArSys\StudyProgram;
class Staff extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'code', 'univ_code', 'employee_id',
                            'front_title', 'rear_title',
                            'first_name', 'last_name',
                            'specialization_id', 'position_id', 'structure_id',
                            'role_id','program_id', 'sso', 'phone', 'email', 'status_id' ];
    protected $table = 'arsys_staff';
    public function program(){
        return $this->belongsTo(StudyProgram::class, 'program_id','id' );
    }

    public function position(){
        return $this->belongsTo(StaffPosition::class, 'position_id','id' );
    }
    public function structure(){
        return $this->belongsTo(StaffStructure::class, 'structure_id','id' );
    }
    public function status(){
        return $this->belongsTo(StaffStatus::class, 'status_id','id' );
    }
    public function specialization(){
        return $this->belongsTo(StudySpecialization::class, 'specialization_id','id' );
    }
}
