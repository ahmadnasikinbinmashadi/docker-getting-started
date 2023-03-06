<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DB;

class SubqueryController extends Controller
{
    public function index()
    {
        $posts = Post::with(['comments' => function($query) {
            $query->select('id', 'post_id', 'content')
                  ->where('status', 'approved');
        }])->get();

        // $posts = DB::table('posts')
        //         ->join('comments', function($join) {
        //             $join->on('comments.post_id', '=', 'posts.id')
        //                  ->where('comments.status', '=', 'approved');
        //         })
        //         ->join('post_likes', 'post_likes.post_id', '=', 'posts.id')
        //         ->select('posts.*', 'comments.*', 'post_likes.*')
        //         ->get();

        // $posts = Post::with(['comments' => function($query) {
        //     $query->with('commentLikes')->where('status', 'approved');
        // }, 'postLikes'])->select('id', 'title')->get();

        // return response()->json([
        //     'data' => $posts
        // ]);

        return view('welcome', $posts);
    }
}
