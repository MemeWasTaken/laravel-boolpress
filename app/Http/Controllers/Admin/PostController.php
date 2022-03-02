<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Model\Post;
use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function indexUser()
    {
        $posts = Post::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $postValidate = $request->validate(
            [
                'title' => 'required|max:240',
                'content' => 'required',
                'category_id' => 'exists:App\Model\Category,id'
            ]
        );

        $post = new Post();
        $post->fill($data);
        $post->slug = $post->createSlug($data['title']);
        $post->save();

        return redirect()->route('admin.posts.show', $post->slug);

    }

    public function show(Post $post)
    {
        return view('admin.posts.show', ['post' => $post]);
    }

    public function edit($id)
    {
        if (Auth::user()->id != $post->user_id) {
            abort('403');
        }
        $categories = Category::all();

        return view('admin.posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        if (Auth::user()->id != $post->user_id) {
            abort('403');
        }


        $postValidate = $request->validate(
            [
                'title' => 'required|max:240',
                'content' => 'required',
                'category_id' => 'exists:App\Model\Category,id'
            ]
        );

        if ($data['title'] != $post->title) {
            $post->title = $data['title'];
            $post->slug = $post->createSlug($data['title']);
        }
        if ($data['content'] != $post->content) {
            $post->content = $data['content'];
        }
        if ($data['category_id'] != $post->category_id) {
            $post->category_id = $data['category_id'];
        }

        $post->update();

        return redirect()->route('admin.posts.show', $post);

    }

    public function destroy($id)
    {
        if (Auth::user()->id != $post->user_id) {
            abort('403');
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('status', "Post id $post->id deleted");
        }
    }
