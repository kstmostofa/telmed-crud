<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'nid_number',
        'registration_number',
        'department_id',
        'user_id',
    ];

    public function department()
    {
        return $this->belongsTo(Speciality::class, 'department_id');
    }
}
