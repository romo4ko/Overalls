<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Employer extends Model
{
	use HasFactory;

	use SoftDeletes;
	public $timestamps = true;

	protected $fillable = [
		'firstname',
		'lastname',
		'job',
		'workshop_id',
		'sale'
	];

	public function workshop()
	{
		return $this->belongsTo(Workshop::class, 'workshop_id');
	}

	public static function boot()
	{
		parent::boot();

		self::updating(function (Employer $employer) {
			DB::table('employers_logs')->insert(
				[
					'raw_id' => $employer->getOriginal('id'),
					'firstname' => $employer->getOriginal('firstname'),
					'lastname' => $employer->getOriginal('lastname'),
					'job' => $employer->getOriginal('job'),
					'workshop_id' => $employer->getOriginal('workshop_id'),
					'sale' => $employer->getOriginal('sale'),
				]
			);
		});
	}
}
