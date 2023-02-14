<?php

namespace App\Http\Requests;

class GetRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
	    return [
		    'limit' => 'integer',
		    'offset' => 'integer',
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
			'limit.integer' => 'Limit should be integer type',
			'offset.integer' => 'Offset should be integer type',
		];
	}
}
