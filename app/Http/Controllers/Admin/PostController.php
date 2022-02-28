<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Model\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(20);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',

        ]);

        $data = $request->all();

        $slug = Str::slug($data['title'], '-');
        $postPresente = Post::where('slug', $slug)->first();

        $c = 0;
        while ($postPresente) {
            $slug = $slug . '-' . $c;
            $postPresente = Post::where('slug', $slug)->first();
            $c++;
        }

        $newPost = new Post();
        
        // $data['slug'] = 'slug';
        $newPost->fill($data);
        $newPost->slug = $slug;
        $newPost->save();

        return redirect()->route('admin.posts.show', ['post' => $newPost]);

    }

    public function show(Post $post)
    {
        dd($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
