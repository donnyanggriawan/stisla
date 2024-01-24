<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    public function index()
    {
        // $genres = Genre::all();
        $genres = Genre::latest()->paginate(2);

        return view('genre.genre', [
            'title' => 'Genre',
            'genres' => $genres
        ]);
    }

    public function tambahGenre()
    {
        return view('genre.tambah', [
            'title' => 'Tambah Genre'
        ]);
    }

    public function storeGenre(Request $request)
    {
        $validateData = $request->validate([
            'genre' => 'string|unique:genres,genre|min:4',
        ]);

        $genre = new Genre([
            'genre' => $request->genre,
        ]);
        $genre->save();

        return redirect('/genre')->with('success', 'New Genre has been added');
    }

    public function editGenre($id)
    {
        $genre = Genre::find($id);

        return view('genre.edit', [
            'title' => 'Edit Genre',
            'genre' => $genre
        ]);
    }

    public function updateGenre(Request $request ,$id)
    {
        $genre = Genre::whereId($id)->first();

        if ($genre->genre == $request->genre) {
            return redirect('/genre');
        } else {
            $validateData = $request->validate([
                'genre' => 'string|min:4|unique:genres,genre',
            ]);
    
            $genre->update([
                'genre' => $request->genre
            ]);
    
            return redirect('/genre')->with('success', 'New Genre has been update');
        }
    }

    public function destroy($id)
    {
        DB::table('genres')->where('id', $id)->delete();

        return redirect('/genre')->with('success', 'Genre has been deleted!');
    }
}
