<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $post = Post::latest()->get();
       return response()->json(['data' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'title' => 'required|max:250',
            'body' => 'required|max:5000'
        ]);

        if ($validation->fails()){
            return response()->json(['status'=>'error','errors'=> $validation->errors()],422);
        }

        Post::create($request->all());

        return response()->json(['message' => 'post created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        if (!$post){
            return response()->json(['message' =>'this post not exist' ]);
        }

        return response()->json(['data' => $post ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (empty($post)){
            return response()->json(['status'=>'error','message'=>'the post is not found'],404);
        }

        $validation = Validator::make($request->all(),[
            'title' => 'required|max:250',
            'body' => 'required|max:5000'
        ]);

        if ($validation->fails()){
            return response()->json(['status'=>'error','errors'=> $validation->errors()],422);
        }

        $post->update($request->all());

        return response()->json(['message' => 'post updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post){
            return response()->json(['message' =>'this post not exist' ]);
        }

        $post->delete();

        return response()->json(['message' =>'post deleted successfully' ]);

    }
    public function getCategory(){
        $categories = Category::select('name')->get();
        return response()->json(['data' => $categories]);
    }
}
