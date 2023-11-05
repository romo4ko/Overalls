<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receiving extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $table = 'receiving';

    public $timestamps = false;
    
    public function employer()
    {
      return $this->belongsTo(Employer::class, 'employer_id');
    }

    public function overall()
    {
      return $this->belongsTo(Overalls::class, 'overall_id');
    }

    protected $fillable = [
        'employer_id', 'overall_id', 'date'
    ];
}
