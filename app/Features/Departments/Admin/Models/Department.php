<?php

namespace App\Features\Departments\Admin\Models;

use App\Features\Auth\Models\User;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'manager_id',
        'name',
        'description',
        'color',
    ];

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }
}
