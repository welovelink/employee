<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employee_leaves';

    public function user() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function commandant() {
        return $this->belongsTo(Employee::class, 'commander');
    }
}
