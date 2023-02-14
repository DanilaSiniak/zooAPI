<?php

namespace App\Http\Requests;

use App\Animal;

class CreateAnimalRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
	    return [
		    'name' => 'required|string',
		    'shelter_id' => 'required|int',
		    'race' => 'required',
		    'picture' => 'string',
		    'medical_condition' => 'string',
		    'status' => 'in:' . Animal::STATUS_ADAPTED . ',' . Animal::STATUS_ADAPTABLE . ',' . Animal::STATUS_PENDING
	    ];
    }

	/**
	 * Custom message for validation
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'name.required' => 'Name is required!',
			'shelter_id.required' => 'Shelter id is required!',
			'race.required' => 'Race is required!'
		];
	}
}
