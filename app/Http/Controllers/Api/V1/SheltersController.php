<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Requests\CreateShelterRequest;
use App\Http\Requests\GetRequest;
use App\Shelter;

/**
 * Class SheltersController
 * @package App\Http\Controllers\Api\V1
 */
class SheltersController extends ApiController
{

	/**
	 * SheltersController constructor.
	 * @param Shelter $model
	 */
	public function __construct(Shelter $model) {
		$this->model = $model;
	}

	/**
	 * @param GetRequest $request
	 * @return mixed
	 *
	 * * @OA\GET(
	 *     path="/shelters",
	 *     description="Get shelters lists",
	 *     @OA\Parameter(
	 *         description="Limit default 100",
	 *         name="limit",
	 *         in="query",
	 *         @OA\Schema(
	 *             type="integer",
	 *         )
	 *     ),
	 *     @OA\Parameter(
	 *         description="Offset",
	 *         name="offset",
	 *         in="query",
	 *         @OA\Schema(
	 *             type="integer",
	 *         )
	 *     ),
	 *     @OA\Response(
	 *          response="default",
	 *          response="200",
	 *          description="OK"
	 *     )
	 * )
	 */
	public function getShelters(GetRequest $request) {

		return parent::get($request);
	}

	/**
	 * @param CreateShelterRequest $request
	 * @return mixed
	 *
	 * @OA\POST(
	 *     path="/shelters",
	 *     description="Add shelter",
	 *     @OA\Parameter(
	 *         description="Shelter name",
	 *         name="name",
	 *         required=true,
	 *         in="query",
	 *         @OA\Schema(
	 *             type="string",
	 *         )
	 *     ),
	 *     @OA\Parameter(
	 *         description="Shelter address",
	 *         name="address",
	 *         in="query",
	 *         required=true,
	 *         @OA\Schema(
	 *             type="string",
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
	public function create(CreateShelterRequest $request) {

		return parent::add($request);
    }

	/**
	 * @param int $shelterId
	 * @return mixed
	 *
	 * @OA\Delete(
	 *     path="/shelters/{shelter_id}",
	 *     description="remove shelter by id",
	 *     @OA\Parameter(
	 *         description="ID of shelter to delete",
	 *         in="path",
	 *         name="shelter_id",
	 *         required=true,
	 *         @OA\Schema(
	 *             type="integer",
	 *         )
	 *     ),
	 *     @OA\Response(
	 *         response=404,
	 *         description="Shelter not found",
	 *     ),
	 *     @OA\Response(
	 *          response="default",
	 *          response="204",
	 *          description="Delete shelter"
	 *     )
	 * )
	 */
	public function delete(int $shelterId) {

		return parent::delete($shelterId);
	}
}
