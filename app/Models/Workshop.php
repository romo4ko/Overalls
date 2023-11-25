<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Workshop extends Model
{
    use HasFactory;

    use SoftDeletes;
    public $table = 'workshops';
    public $timestamps = true;

    protected $fillable = [
        'name',
    ];

    public static function boot()
    {
        parent::boot();

        self::updating(function (Workshop $workshop) {
            DB::table('workshops_logs')->insert(
                [
                    'raw_id' => $workshop->getOriginal('id'),
                    'name' => $workshop->getOriginal('name'),
                ]
            );
        });
    }

}
