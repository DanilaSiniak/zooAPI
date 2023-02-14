<?php

namespace App\Http\Requests;

class CreateShelterRequest extends ApiRequest
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
		    'address' => 'required|string',
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
			'address.required' => 'Address is required!',
		];
	}
}
