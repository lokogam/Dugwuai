<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller

{

    public function index(){
        
        $datos =[
            
            'posts' => Post::where('status',2)->latest('id')->paginate(3),
            'categories' => Category::all(),
            'tags' =>  Tag::all(),
        ];
        // return response()->json($datos);

        return view('posts.index', $datos);
    }

    public function show(Post $post){
        $similares = Post::where('category_id', $post->category_id)
                                ->where('status', 2)
                                ->where('id','!=', $post->id )
                                ->latest('id')
                                ->take(3)
                                ->get();

        $categories = Category::all();
        $tags =  Tag::all();
        return view('posts.show', compact('categories', 'post', 'similares','tags'));

    }

    public function category(Category $category){

        $posts = Post::where('category_id', $category->id)   
                            ->where('status',2)
                            ->latest('id')
                            ->paginate(3);

        $categories = Category::all();
        $tags =  Tag::all();
        return view('posts.category', compact('posts', 'category','categories','tags'));
        // return response()->json($posts);
    }

    public function tag(Tag $tag){

        $posts = $tag->posts()
                        ->where('status',2)
                        ->latest('id')
                        ->paginate(3);

        $categories = Category::all();
        $tags =  Tag::all();
        return view('posts.tag', compact('posts', 'tag','categories','tags'));
        // return response()->json($posts);
    }
}

