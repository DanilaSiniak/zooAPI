<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Requests\CreateAnimalRequest;
use App\Http\Requests\GetAnimalsRequest;
use App\Animal;
use Input, Response, Log;

/**
 *
 * Class AnimalsController
 * @package App\Http\Controllers\Api\V1
 */
class AnimalsController extends ApiController
{

	/**
	 * AnimalsController constructor.
	 * @param Animal $model
	 */
	public function __construct(Animal $model)
	{
		$this->model = $model;
	}

	/**
	 * @param GetAnimalsRequest $request
	 * @return mixed
	 *
	 *
	 * @OA\GET(
	 *     path="/animals",
	 *     description="Get animals by params",
	 *     @OA\Parameter(
	 *         description="Shelter id",
	 *         name="shelter_id",
	 *         in="query",
	 *         @OA\Schema(
	 *             type="integer",
	 *         )
	 *     ),
	 *     @OA\Parameter(
	 *         description="Name of animal",
	 *         name="name",
	 *         in="query",
	 *         @OA\Schema(
	 *             type="string",
	 *         )
	 *     ),
	 *     @OA\Parameter(
	 *         description="Status of animal",
	 *         name="status",
	 *         in="query",
	 *         @OA\Schema(
	 *             type="string",
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
	 *     @OA\Parameter(
	 *         description="Limit",
	 *         name="limit",
	 *         in="query",
	 *         @OA\Schema(
	 *             type="integer",
	 *         )
	 *     ),
	 *     @OA\Response(
	 *         response=404,
	 *         description="Animal not found",
	 *     ),
	 *     @OA\Response(
	 *          response="default",
	 *          response="200",
	 *          description="OK"
	 *     )
	 * )
	 */
	public function getAnimals(GetAnimalsRequest $request)
	{
		$validateData = $request->validated();
		$result = $this->model->getAnimals($validateData);

		return $this->sendResponse($result, 'OK', 200);
	}

	/**
	 * @param CreateAnimalRequest $request
	 * @return mixed
	 *
	 * @OA\POST(
	 *     path="/animals",
	 *     description="Add animal",
	 *     @OA\Parameter(
	 *         description="Animal name",
	 *         name="name",
	 *         required=true,
	 *         in="query",
	 *         @OA\Schema(
	 *             type="string",
	 *         )
	 *     ),
	 *     @OA\Parameter(
	 *         description="Shelter id associated with animal",
	 *         name="shelter_id",
	 *         in="query",
	 *         required=true,
	 *         @OA\Schema(
	 *             type="integer",
	 *         )
	 *     ),
	 *      @OA\Parameter(
	 *         description="Race of animal",
	 *         name="race",
	 *         in="query",
	 *         required=true,
	 *         @OA\Schema(
	 *             type="string",
	 *         )
	 *     ),
	 *      @OA\Parameter(
	 *         description="Picture of animal",
	 *         name="picture",
	 *         in="query",
	 *         @OA\Schema(
	 *             type="string",
	 *         )
	 *     ),
	 *     @OA\Parameter(
	 *         description="Mecial condition of animal",
	 *         name="medical_condition",
	 *         in="query",
	 *         @OA\Schema(
	 *             type="string",
	 *         )
	 *     ),
	 *      @OA\Parameter(
	 *         description="Status of animal shoould be adaptable, pending or adapted",
	 *         name="status",
	 *         in="query",
	 *         @OA\Schema(
	 *             type="string",
	 *         )
	 *     ),
	 *     @OA\Response(
	 *          response="default",
	 *          response="201",
	 *          description="Animal created"
	 *     ),
	 *     @OA\Response(
	 *          response="422",
	 *          description="Validation failed"
	 *     )
	 * )
	 */
	public function create(CreateAnimalRequest $request)
	{
		return parent::add($request);
	}

	/**
	 * @param int $animalId
	 * @return mixed
	 *
	 * @OA\PUT(
	 *     path="/animals/{animal_id}/adapted",
	 *     description="Set status animal to adapteble",
	 *     @OA\Parameter(
	 *         description="ID of animal to delete",
	 *         in="path",
	 *         name="animal_id",
	 *         required=true,
	 *         @OA\Schema(
	 *             type="integer",
	 *         )
	 *     ),
	 *     @OA\Response(
	 *         response=404,
	 *         description="Animal not found",
	 *     ),
	 *     @OA\Response(
	 *          response="default",
	 *          response="200",
	 *          description="Status was update"
	 *     )
	 * )
	 *
	 */
	public function adaptable(int $animalId)
	{
		$animal = $this->model->find($animalId);

		if (!$animal) {
			return $this->sendError('Animal not found', 404);
		}

		$animal->setAnimalAsAdaptable($animal);

		return $this->sendResponse(null, 'Animal adaptable', 200);
	}

	/**
	 * @param int $animalId
	 * @return mixed
	 *
	 *  @OA\Delete(
	 *     path="/animals/{animal_id}",
	 *     description="remove animal by id",
	 *     @OA\Parameter(
	 *         description="ID of animal to delete",
	 *         in="path",
	 *         name="animal_id",
	 *         required=true,
	 *         @OA\Schema(
	 *             type="integer",
	 *         )
	 *     ),
	 *     @OA\Response(
	 *         response=404,
	 *         description="Animal not found",
	 *     ),
	 *     @OA\Response(
	 *          response="default",
	 *          response="204",
	 *          description="Delete animal"
	 *     )
	 * )
	 */
	public function delete(int $animalId) {

		return parent::delete($animalId);
	}
}
