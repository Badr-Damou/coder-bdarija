<?php

namespace App\Services;

use App\Repositories\PlaylistRepository;

class PlaylistService
{
    /**
     * Create a new class instance.
     */
    protected $playlistRepository;
    public function __construct(PlaylistRepository $playlistRepository)
    {
        $this->playlistRepository = $playlistRepository;
    }

    public function storePlaylist($data)
    {
        return $this->playlistRepository->store($data);
    }

    public function deletePlaylist($id)
    {
        return $this->playlistRepository->delete($id);
    }

    public function updatePlaylist($id, $data)
    {
        return $this->playlistRepository->update($id, $data);
    }

    public function getAllPlaylists()
    {
        return $this->playlistRepository->getplaylists();
    }
}
