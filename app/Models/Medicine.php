<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dosage',
        'form',
        'route_of_administration',
        'frequency',
        'duration',
        'quantity',
    ];

    /**
     * The prescriptions that belong to the medicine.
     */
    public function prescriptions()
    {
        return $this->belongsToMany(Prescription::class, 'prescription_medicine');
    }
    public function alternatives()
    {
        return $this->belongsToMany(Alternative::class, 'alternative_medicine');
    }
}
