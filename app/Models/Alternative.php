<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'dosage_mg',
        'form',
        'route_of_administration',
        'frequency',
        'duration',
        'quantity',
    ];


    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'alternative_medicine');
    }


    public function prescriptions()
    {
        return $this->belongsToMany(Prescription::class, 'prescription_alternative');
    }
}
