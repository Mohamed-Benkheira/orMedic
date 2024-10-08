<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Prescription extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'illness',
        'more_infos',
        'user_id',
    ];


    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'prescription_medicine');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function alternatives()
    {
        return $this->belongsToMany(Alternative::class, 'prescription_alternative');
    }
}
