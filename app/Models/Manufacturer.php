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
     * Mapping the manufacturer-entry to the corresponding Feed-models
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function feeds() {
        return $this->hasMany(Feed::class, 'manufacturer_id', 'manufacturer_id');
    }

    /**
     * @return Manufacturer[]
     */
    public function getAllManufacturers() {
        $manufacturers = Manufacturer::all();

        foreach ($manufacturers as $manufacturer) {
            $manufacturer_feed_count = Manufacturer::find($manufacturer->manufacturer_id)->feeds()->count();
            $manufacturer->feed_count = $manufacturer_feed_count;
        }

        return $manufacturers;
    }

    /**
     * @param $manufacturerId
     *
     * @return Manufacturer
     */
    public function getManufacturerByManufacturerId($manufacturerId) {
        $manufacturer = Manufacturer::find($manufacturerId);

        $manufacturer_feeds = Manufacturer::find($manufacturerId)->feeds()->get();
        $manufacturer->feeds = $manufacturer_feeds;

        return $manufacturer;
    }

    /**
     * @param Request $request
     *
     * @return Manufacturer
     */
    public function createOrUpdateManufacturer(Request $request){
        if (!is_null($request->id)) {
            $manufacturer = Manufacturer::find($request->id);
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
