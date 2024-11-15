<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
        ]);

        return response()->json([
            'message' => 'Post creado exitosamente',
            'post' => $post,
        ], 201);
    }

    public function index($category)
    {
        $posts = Post::where('category_id', $category)->paginate();

        if ($posts->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron posts para esta categoría',
            ], 404);
        }

        return response()->json([
            'posts' => $posts,
        ], 200);
    }
}
