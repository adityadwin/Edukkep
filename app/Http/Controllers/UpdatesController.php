<?php

namespace App\Http\Controllers;

use App\Services\ContentService;
use Illuminate\Http\Request;

class UpdatesController extends Controller
{
    public function index(Request $request)
    {
        $categories = ['Semua', 'Klinis', 'Edukasi'];
        $allNews = ContentService::getNews();
        $category = $request->get('category', 'Semua');
        
        if ($category !== 'Semua') {
            $allNews = array_filter($allNews, function($news) use ($category) {
                return $news['category'] === $category;
            });
            $allNews = array_values($allNews);
        }

        $page = $request->get('page', 1);
        $perPage = 6;
        $offset = ($page - 1) * $perPage;
        
        $news = array_slice($allNews, $offset, $perPage);
        $totalPages = ceil(count($allNews) / $perPage);
        $hasPages = $totalPages > 1;

        return view('updates', compact('categories', 'news', 'page', 'totalPages', 'hasPages', 'category'));
    }

    public function show($id)
    {
        $allNews = ContentService::getNews();
        $article = collect($allNews)->firstWhere('id', $id);

        if (!$article) {
            abort(404);
        }

        return view('updates.show', compact('article'));
    }
}