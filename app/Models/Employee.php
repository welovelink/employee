<?php

namespace App\Models;

use App\Models\User;
use App\Models\Position;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Employee extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'uid');
    }

    public function position() {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function department() {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function commander() {
        return $this->hasMany(Leave::class, 'commander');
    }
}
