<?php

namespace App\Http\Controllers\Api\V1;


use App\AdaptationRequests;

class AdaptationRequestsController extends ApiController
{
	/**
	 * AdaptationRequestsController constructor.
	 * @param AdaptationRequests $model
	 */
	public function __construct(AdaptationRequests $model)
	{
		$this->model = $model;
	}

	/**
	 * @param int $requestId
	 * @return mixed
	 *
	 *  @OA\Delete(
	 *     path="/animals/requests/{request_id}",
	 *     description="remove adaptation request",
	 *     @OA\Parameter(
	 *         description="ID of request",
	 *         in="path",
	 *         name="request_id",
	 *         required=true,
	 *         @OA\Schema(
	 *             type="integer",
	 *         )
	 *     ),
	 *     @OA\Response(
	 *         response=404,
	 *         description="Request not found",
	 *     ),
	 *     @OA\Response(
	 *          response="default",
	 *          response="204",
	 *          description="Delete request"
	 *     )
	 * )
	 */
	public function delete(int $requestId) {

		return parent::delete($requestId);
	}
}