<?php

namespace App\Http\Requests;

use App\Animal;

class GetAnimalsRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
	    return [
		    'shelter_id' => 'int',
		    'name' => 'string',
		    'status' => 'in:' . Animal::STATUS_ADAPTED . ',' . Animal::STATUS_ADAPTABLE . ',' . Animal::STATUS_PENDING,
		    'offset' => 'int',
		    'limit' => 'int'
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
			'name.string' => 'Name should be string!',
			'shelter_id.int' => 'Shelter id should be integer',
			'limit.int' => 'Limit should be integer',
			'offset.int' => 'Offset should be integer',
			'status.in' => 'Status should be in' . Animal::STATUS_ADAPTED . ',' . Animal::STATUS_ADAPTABLE . ',' . Animal::STATUS_PENDING
		];
	}
}
