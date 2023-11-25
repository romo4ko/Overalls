<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Overalls extends Model
{
    use HasFactory;

    use SoftDeletes;
    public $table = 'overalls';
    public $timestamps = true;

    protected $fillable = [
        'type', 'term', 'cost'
    ];

    public static function boot()
    {
        parent::boot();

        self::updating(function (Overalls $overalls) {
            DB::table('overalls_logs')->insert(
                [
                    'raw_id' => $overalls->getOriginal('id'),
                    'type' => $overalls->getOriginal('type'),
                    'term' => $overalls->getOriginal('term'),
                    'cost' => $overalls->getOriginal('cost'),
                ]
            );
        });
    }
}
