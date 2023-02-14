<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelter extends Model
{
	protected $table = 'shelters';

	protected $primaryKey = 'shelter_id';

	protected $fillable = ['name', 'address'];
}
