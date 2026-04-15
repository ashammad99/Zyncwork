<?php

namespace App\Features\Projects\Admin\Models;

use App\Features\Auth\Models\User;
use App\Features\Departments\Admin\Models\Department;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'department_id',
        'owner_id',
        'name',
        'description',
        'status',
        'deadline',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
