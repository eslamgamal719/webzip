<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Bookmark;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookmarkRequest;
use App\Repositories\BookmarkRepository;

class BookmarkController extends Controller
{
    private $bookmarkRepository;

    public function __construct(BookmarkRepository $bookmarkRepository)
    {
        $this->bookmarkRepository = $bookmarkRepository;
    }

    public function index()
    {
        return $this->bookmarkRepository->all();
    }


    public function show($id)
    {
        return $this->bookmarkRepository->findById($id);
    }


    public function store(BookmarkRequest $request)
    {
        try {
            Bookmark::create([
                'user_id' => $request->user_id,
                'ad_id' => $request->ad_id
            ]);

            return response()->json([
                'message' => 'Bookmark is added successfully'
            ], 200);

        } catch (\Exception $ex) {
            $message = $ex->getMessage();
            return response()->json($message, 400);
        }
    }


    public function update(BookmarkRequest $request, $id)
    {
        try {
            $bookmark = Bookmark::find($id);

            if($bookmark) {
                $bookmark->update([
                    'user_id' => $request->user_id,
                    'ad_id' => $request->ad_id
                ]);

                return response()->json([
                    'message' => 'Bookmark updated successfully'
                ], 200);
            }
                return response()->json([
                    'message' => 'Bookmark not found'
                ], 404);

        } catch (\Exception $ex) {
            $message = $ex->getMessage();
            return response()->json($message, 400);
        }
    }


    public function destroy($id)
    {
        try {
            $bookmark = Bookmark::find($id);

            if($bookmark) {
                $bookmark->delete();
                return response()->json([
                    'message' => 'Bookmark deleted successfully'
                ], 200);
            }
            return response()->json([
                'message' => 'Bookmark not found'
            ], 404);

        } catch (\Exception $ex) {
            $message = $ex->getMessage();
            return response()->json($message, 400);
        }
    }
}
