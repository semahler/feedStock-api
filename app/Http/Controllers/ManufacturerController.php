<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController
{

    /**
     * Controller constructor.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     */
    public function __construct(Manufacturer $manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getManufacturers() {
        $manufacturers = $this->manufacturer->getAllManufacturers();

        return response()->json($manufacturers);
    }

    /**
     * @param int $manufacturerId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getManufacturer($manufacturerId) {
        $manufacturer = $this->manufacturer->getManufacturerByManufacturerId($manufacturerId);

        return response()->json($manufacturer);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function createOrUpdateManufacturer(Request $request) {
        $manufacturer = $this->manufacturer->createOrUpdateManufacturer($request);

        return response($manufacturer, 200);
    }

    /**
     * @param int $manufacturerId
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function deleteManufacturer($manufacturerId) {
        $result = $this->manufacturer->deleteManufacturer($manufacturerId);

        return response($result, 200);
    }
}
