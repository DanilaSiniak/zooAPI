<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Requests\CreateWorkerRequest;
use App\Worker;

class WorkersController extends ApiController
{

	/**
	 * WorkersController constructor.
	 * @param Worker $model
	 */
	public function __construct(Worker $model) {

		$this->model = $model;
	}

	/**
	 * @param int $shelterId
	 * @param CreateWorkerRequest $request
	 * @return mixed
	 *
	 * @OA\POST(
	 *     path="/shelters/{shelter_id}/workers",
	 *     description="Add worker",
	 *     @OA\Parameter(
	 *         description="Worker name",
	 *         name="name",
	 *         required=true,
	 *         in="query",
	 *         @OA\Schema(
	 *             type="string",
	 *         )
	 *     ),
	 *     @OA\Parameter(
	 *         description="Shelter id",
	 *         name="shelter_id",
	 *         in="path",
	 *         required=true,
	 *         @OA\Schema(
	 *             type="integer",
	 *         )
	 *     ),
	 *     @OA\Response(
	 *          response="default",
	 *          response="201",
	 *          description="Shelter created"
	 *     ),
	 *     @OA\Response(
	 *          response="422",
	 *          description="Validation failed"
	 *     )
	 * )
	 */
	public function create(int $shelterId, CreateWorkerRequest $request) {

		$data = $request->validated();
		$data['shelter_id'] = $shelterId;
		$this->model->fill($data)->push();

		return $this->sendResponse(null, 'Created', 201);

	}

	/**
	 * @param int $workerId
	 * @return mixed
	 *
	 *  @OA\Delete(
	 *     path="/shelters/workers/{worker_id}",
	 *     description="remove worker by id",
	 *     @OA\Parameter(
	 *         description="ID of worker to delete",
	 *         in="path",
	 *         name="worker_id",
	 *         required=true,
	 *         @OA\Schema(
	 *             type="integer",
	 *         )
	 *     ),
	 *     @OA\Response(
	 *         response=404,
	 *         description="Worker not found",
	 *     ),
	 *     @OA\Response(
	 *          response="default",
	 *          response="204",
	 *          description="Delete worker"
	 *     )
	 * )
	 */
	public function delete(int $workerId) {

		return parent::delete($workerId);
	}
}
