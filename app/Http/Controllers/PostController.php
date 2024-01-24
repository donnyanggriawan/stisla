<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function add()
    {
        $genre = Genre::all();
        
        return view('post.tambah', [
            'title' => 'Add Post',
            'genres' => $genre
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category' => 'required',
            'content' => 'required'
        ]);

        // dd($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $photo = $request->file('image');
        $fileName = date('y-m-d').$photo->getClientOriginalName();
        $path = 'post-image/'.$fileName;

        Storage::disk('public')->put($path, file_get_contents($photo));

        $data['title'] = $request->title;
        $data['image'] = $fileName;
        $data['genre_id'] = $request->category;
        $data['body'] = $request->content;
        $data['user_id'] = Auth::id();

        Post::create($data);

        return redirect('/post')->with('success', 'New Post has been added');
    }

    public function showPost()
    {
        $userId = Auth::id();

        $posts = Post::where('user_id', $userId)->latest()->paginate(5);

        return view('post.post', [
            'title' => 'Post',
            'posts' => $posts
        ]);
    }

    public function editPost($id)
    {
        $post = Post::find($id);
        $genre = Genre::all();

        return view('post.edit', [
            'title' => 'Edit Post',
            'genres' => $genre,
            'post' => $post
        ]);
    }

    public function updatePost(Request $request ,$id)
    {
        $post = Post::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
            'category' => 'required',
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $fileName = date('y-m-d').$photo->getClientOriginalName();
            $path = 'post-image/'.$fileName;
            
            // Delete the old image before storing the new one
            // Storage::delete($path . $post->image);
            Storage::disk('public')->delete('post-image/' . $post->image);

            // $photo->move(public_path('post-image'), $fileName);
            Storage::disk('public')->put($path, file_get_contents($photo));


            $data['image'] = $fileName;
        }

        $data['title'] = $request->title;
        $data['genre_id'] = $request->category;
        $data['body'] = $request->content;
        $data['user_id'] = Auth::id();

        Post::whereId($id)->update($data);

        return redirect('/post')->with('success', 'New Post has been update');
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if ($post->image) {
            Storage::disk('public')->delete('post-image/' . $post->image);
        }
        DB::table('posts')->where('id', $id)->delete();

        return redirect('/post')->with('success', 'Post has been deleted!');
    }

    public function detail($id)
    {
        $post = Post::find($id);

        return view('post.index', [
            'post' => $post,
            'title' => 'Post'
        ]);
    }
}
