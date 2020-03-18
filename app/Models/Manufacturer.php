<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Manufacturer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_manufacturer';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'manufacturer_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return Manufacturer[]
     */
    public function getAllManufacturers() {
        $manufacturers = Manufacturer::all();

        return $manufacturers;
    }

    public function getManufacturerByManufacturerId($manufacturerId, $withFeed = false) {
        $manufacturer = Manufacturer::find($manufacturerId);

        if ($withFeed) {

        }

        return $manufacturer;
    }

    /**
     * @param Request $request
     *
     * @return Manufacturer
     */
    public function createOrUpdateManufacturer(Request $request){
        if (!is_null($request->id)) {
            $manufacturer = $this->getManufacturerByManufacturerId($request->id);
        } else {
            $manufacturer = new Manufacturer();
        }

        $manufacturer->name = $request->name;
        $manufacturer->url = $request->url;

        if ($request->hasFile('image')) {
            $manufacturer_image = $request->file('image');

            $imageName = sprintf('%s.%s',
                $manufacturer->name,
                $manufacturer_image->getClientOriginalExtension()
            );

            $destinationPath = storage_path('images/manufacturer/');

            $manufacturer_image->move($destinationPath, $imageName);
            $manufacturer->image = $destinationPath .  $imageName;
        }
        $manufacturer->save();

        return $manufacturer;
    }

    /**
     * @param $manufacturerId
     *
     * @return bool
     */
    public function deleteManufacturer($manufacturerId) {
        $manufacturer = $this->getManufacturerByManufacturerId($manufacturerId);

        return $manufacturer->delete();
    }
}
