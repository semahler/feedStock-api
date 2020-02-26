<?php

namespace App\Http\Controllers;

use App\Comment;
use App\PackageUnit;
use Illuminate\Http\Request;

class CommentsController
{

    public function getCommentsByFoodId($id) {
        $comments = Comment::where('food_id', '=', $id)->get();

        return response()->json($comments);
    }

    public function createComment(Request $request) {
        $comment = new Comment();

        $comment->food_id = $request->food_id;
        $comment->comment = $request->comment;
        $comment->save();

        return response()->json($comment, 201);
    }
}
