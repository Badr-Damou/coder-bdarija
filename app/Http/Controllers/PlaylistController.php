<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function createPlaylist(Request $request)
    {
        // Logic to create a playlist
        return response()->json(['message' => 'Playlist created'], 201);
    }
}
