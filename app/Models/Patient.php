<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'registration_number',
        'name',
        'phone',
        'nid_number',
        'division_id',
        'district_id',
        'upazila_id',
        'symptoms',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function upazila()
    {
        return $this->belongsTo(Upazila::class);
    }
}
