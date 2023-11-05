<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employer extends Model
{
    use HasFactory;

    use SoftDeletes;
    public $timestamps = false;

    public function workshop()
    {
      return $this->belongsTo(Workshop::class, 'workshop_id');
    }

    protected $fillable = [
        'firstname', 'lastname', 'job', 'workshop_id', 'sale'
    ];
}
