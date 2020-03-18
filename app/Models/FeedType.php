<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class FeedType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_feed_type';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'feed_type_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return FeedType[]
     */
    public function getAllFeedTypes() {
        $feedTypes = FeedType::all();

        return $feedTypes;
    }

    /**
     * @param int $feedTypeId
     *
     * @return FeedType
     */
    public function getFeedTypeByFeedTypeId($feedTypeId) {
        $feedType = FeedType::find($feedTypeId);

        return $feedType;
    }

    /**
     * @param Request $request
     *
     * @return FeedType
     */
    public function createOrUpdateFeedType(Request $request){
        if (!is_null($request->id)) {
            $feedType = $this->getFeedTypeByFeedTypeId($request->id);
        } else {
            $feedType = new FeedType();
        }

        $feedType->title = $request->title;
        $feedType->save();

        return $feedType;
    }

    /**
     * @param int $feedTypeId
     *
     * @return bool
     *
     * @throws \Exception
     */
    public function deleteFeedType($feedTypeId) {
        $feedType = $this->getFeedTypeByFeedTypeId($feedTypeId);

        return $feedType->delete();
    }
}
