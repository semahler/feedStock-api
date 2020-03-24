<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController
{

    /**
     * Controller constructor.
     *
     * @param  \App\Models\Comment  $comment
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCommentsByFeedId($feedId) {
        $comments = $this->comment->getCommentsByFeedId($feedId);

        return response()->json($comments);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function createComment(Request $request) {
        $comment = $this->comment->createComment($request);

        return response($comment, 200);
    }
}
