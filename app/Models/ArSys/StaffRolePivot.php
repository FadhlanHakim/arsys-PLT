<?php

namespace App\Models\ArSys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffRolePivot extends Model
{
    use HasFactory;
    protected $fillable = [];
    protected $table = 'arsys_staff_role_pivot';

    public function data(){
        return $this->belongsTo(StaffRole::class,  'staff_role_id', 'id');
    }
}
