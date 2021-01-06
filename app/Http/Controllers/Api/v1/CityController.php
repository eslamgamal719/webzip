<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\City;
use App\Http\Requests\CityRequest;
use App\Http\Controllers\Controller;
use App\Repositories\CityRepository;


class CityController extends Controller
{
    private $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return $this->cityRepository->all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        try {
            City::create([
                'name' => $request->name,
                'coordinate' => $request->coordinate,
                'show' => $request->show,
            ]);

            return response()->json([
                'message' => 'City is added successfully'
            ], 200);

        } catch (\Exception $ex) {
            $message = $ex->getMessage();
            return response()->json($message, 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->cityRepository->findById($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {
        try {
            $city = City::findOrFail($id);
            $city->update([
                'name' => $request->name,
                'coordinate' => $request->coordinate,
                'show' => $request->show,
            ]);

            return response()->json([
                'message' => 'City data updated successfully'
            ], 200);

        } catch (\Exception $ex) {
            $message = $ex->getMessage();
            return response()->json($message, 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $city = City::findOrFail($id);
            $city->delete();

            return response()->json([
                'message' => 'City is Deleted successfully'
            ], 200);

        } catch(\Exception $ex) {
            $message = $ex->getMessage();
            return response()->json($message, 400);
        }
    }
}
