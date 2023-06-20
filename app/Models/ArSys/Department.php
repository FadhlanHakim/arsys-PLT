<?php

namespace App\Models\ArSys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [];
    protected $table = 'arsys_department';

    public function faculty(){
        return $this->belongsTo(Faculty::class, 'faculty_id','id' );
    }
}
