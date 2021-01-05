<?php

namespace App\Repositories;

use App\Http\Resources\BookmarkResource;
use App\Models\Bookmark;

class BookmarkRepository
{

    public function all()
    {
        $bookmarks = BookmarkResource::collection(Bookmark::all());

        if ($bookmarks) {
            return response()->json([
                'status' => 200,
                'bookmarks' => $bookmarks
            ]);
        }

        return response()->json([
            'status' => 404,
            'message' => 'Not found any Bookmarks'
        ]);
    }


    public function findById($id)
    {
        $bookmark = BookmarkResource::collection(Bookmark::where('id', $id)->get());

        if ($bookmark && Bookmark::whereId($id)->exists()) {
            return response()->json([
                'status' => 200,
                'bookmark' => $bookmark
            ]);
        }

        return response()->json([
            'status' => 404,
            'message' => 'Bookmark is not found'
        ]);
    }

}
