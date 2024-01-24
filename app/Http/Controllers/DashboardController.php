<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(12);

        // Menggunakan Str::limit untuk membatasi jumlah kata di setiap post
        $posts->each(function ($post) {
            $post->short_body = Str::limit(strip_tags($post->body), 20);
        });

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'posts' => $posts,
        ]);
    }
}
