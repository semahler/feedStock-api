<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Comment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_comment';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'comment_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * @param int $feedId
     *
     * @return Comment[]
     */
    public function getCommentsByFeedId($feedId) {
        $comments = Comment::where('feed_id', '=', $feedId)->get();

        return $comments;
    }

    /**
     * @param Request $request
     *
     * @return Comment
     */
    public function createComment(Request $request){
        $comment = new Comment();

        // ToDo: Implement details

        $comment->save();

        return $comment;
    }
}
