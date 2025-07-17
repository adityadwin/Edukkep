<?php

namespace App\Http\Controllers;

use App\Services\ContentService;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $categories = ['ALL', 'IMAGES', 'VIDEOS'];
        $allMedia = ContentService::getMedia();
        $category = $request->get('category', 'ALL');

        if ($category !== 'ALL') {
            $filterType = strtolower(rtrim($category, 'S'));
            $allMedia = array_filter($allMedia, function ($media) use ($filterType) {
                return $media['type'] === $filterType;
            });
        }

        $page = $request->get('page', 1);
        $perPage = 6;
        $offset = ($page - 1) * $perPage;

        $mediaForCurrentPage = array_slice(array_values($allMedia), $offset, $perPage);
        $totalPages = ceil(count($allMedia) / $perPage);
        $hasPages = $totalPages > 1;

        return view('media', [
            'categories' => $categories,
            'media' => $mediaForCurrentPage,
            'page' => $page,
            'totalPages' => $totalPages,
            'hasPages' => $hasPages,
            'category' => $category
        ]);
    }

    public function show($id)
    {
        $allMedia = ContentService::getMedia();
        $mediaItem = collect($allMedia)->firstWhere('id', $id);

        if (!$mediaItem) {
            abort(404);
        }
        
        if ($mediaItem['type'] === 'video' && $mediaItem['video_source'] === 'youtube') {
            $pattern = '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';
            if (preg_match($pattern, $mediaItem['video_url'], $match)) {
                $videoId = $match[1];
                $mediaItem['embed_url'] = "https://www.youtube.com/embed/{$videoId}?rel=0&modestbranding=1&playsinline=1";
            }
        }

        return view('media.show', compact('mediaItem'));
    }
}