<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
	const STATUS_ADAPTED = 'adapted';
	const STATUS_PENDING = 'pending';
	const STATUS_ADAPTABLE = 'adaptable';

	protected $table = 'animals';

	protected $primaryKey = 'animal_id';

	protected $fillable = [
		'animal_id',
		'name',
		'shelter_id',
		'animal_lover_id',
		'status',
		'picture',
		'medical_condition',
		'race'
	];

	protected $visible = [
		'animal_id',
		'name',
		'shelter_id',
		'status',
		'picture',
		'medical_condition',
		'race'
	];

	/**
	 * @param array $data
	 * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
	 */
	public function getAnimals(array $data)
	{

		$model = $this->query();

		if (!empty($data['name'])) {
			$model->where('name', $data['name']);
		}

		if (!empty($data['status'])) {
			$model->where('status', $data['status']);
		}

		if (!empty($data['shelter_id'])) {
			$model->where('shelter_id', $data['shelter_id']);
		}

		$limit = $data['limit'] ?? 100;
		$offset = $data['offset'] ?? 0;

		return $model->offset($offset)->limit($limit)->get();
	}

	/**
	 * @param Animal $animal
	 */
	public function setAnimalAsAdaptable(Animal $animal) {

		$animal->status = self::STATUS_ADAPTABLE;
		$animal->save();
	}
}
