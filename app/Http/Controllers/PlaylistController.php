<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Services\PlaylistService;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    protected $playlistService;

    public function __construct(PlaylistService $playlistService)
    {
        $this->playlistService = $playlistService;
    }

    public function storePlaylist(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'nullable|string',
        //     'level' => 'nullable|string',
        //     'constructor' => 'nullable|string',
        //     'thumbnail' => 'nullable|url',
        //     'slug' => 'required|string|unique:playlists,slug,',
        //     'rating' => 'nullable|numeric|min:0|max:5',
        // ]);

        // dd($request);

        $playlist = $this->playlistService->storePlaylist($request->all()); 
        return response()->json(['message' => 'Playlist created',
        "playlist" => $playlist], 201);
    }

    public function deletePlaylist($id)
    {
        $this->playlistService->deletePlaylist($id);
        return response()->json(['message' => 'Playlist deleted'], 200);
    }

    public function updatePlaylist(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'level' => 'nullable|string',
            'constructor' => 'nullable|string',
            'thumbnail' => 'nullable|url',
            'slug' => "required|string|unique:playlists,slug,$id",
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);
        $updatedPlaylist = $this->playlistService->updatePlaylist($id, $request->all());
        if ($updatedPlaylist) {
            return response()->json(['message' => 'Playlist updated', 'playlist' => $updatedPlaylist], 200);
        } else {
            return response()->json(['message' => 'Playlist not found or update failed'], 404);
        }
    }
    
    public function getPlaylists()
    {
        $playlists = $this->playlistService->getAllPlaylists();
        if (!$playlists){
            return response()->json(['message' => 'No playlists found'], 404);
        }
        return response()->json($playlists, 200);
    }

    public function showPlaylist($id)
    {
        $playlist = Playlist::with('videos')->find($id);
        if (!$playlist) {
            return response()->json(['message' => 'Playlist not found'], 404);
        }
        return response()->json($playlist, 200);
    }
    
}
