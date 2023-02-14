<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdaptationRequests extends Model
{
	protected $table = 'adaptation_requests';

	protected $primaryKey = 'request_id';

	protected $fillable = ['email', 'phone', 'animal_id'];
}
