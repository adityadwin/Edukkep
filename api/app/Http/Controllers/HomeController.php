<?php

namespace App\Http\Controllers;

use App\Services\ContentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $allNews = ContentService::getNews();
        $allMedia = ContentService::getMedia();

        $latestNewsData = array_slice($allNews, 0, 3);
        $latestMediaData = array_slice($allMedia, 0, 3);

        $latestNews = array_map(function ($item) {
            $item['description'] = Str::limit($item['description'], 150, '...');
            return $item;
        }, $latestNewsData);

        $latestMedia = array_map(function ($item) {
            $item['description'] = Str::limit($item['description'], 150, '...');
            return $item;
        }, $latestMediaData);

        return view('home', compact('latestNews', 'latestMedia'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $results = [];

        if ($query) {
            $allNews = ContentService::getNews();
            $allMedia = ContentService::getMedia();

            foreach ($allNews as $news) {
                if (stripos($news['title'], $query) !== false || stripos($news['description'], $query) !== false) {
                    $results[] = [
                        'type' => 'news',
                        'title' => $news['title'],
                        'description' => Str::limit($news['description'], 100, '...'),
                        'url' => route('updates.show', $news['id']),
                        'image' => $news['image']
                    ];
                }
            }

            foreach ($allMedia as $media) {
                if (stripos($media['title'], $query) !== false || stripos($media['description'], $query) !== false) {
                    $results[] = [
                        'type' => 'media',
                        'title' => $media['title'],
                        'description' => Str::limit($media['description'], 100, '...'),
                        'url' => route('media.show', $media['id']),
                        'image' => $media['image']
                    ];
                }
            }
        }

        return response()->json(['results' => $results]);
    }
    
    private function validateRecaptcha(Request $request)
    {
        $recaptcha_response = $request->input('g-recaptcha-response');

        if (is_null($recaptcha_response)) {
            return false;
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $recaptcha_response
        ]);

        $responseData = $response->json();
        
        return $responseData['success'];
    }

    public function appointment(Request $request) 
    { 
        if (!$this->validateRecaptcha($request)) {
            return response()->json(['success' => false, 'message' => 'reCAPTCHA validation failed.']);
        }
        return response()->json(['success' => true, 'message' => 'Appointment berhasil dibuat!']);
    }

    public function enquiry(Request $request) 
    { 
        if (!$this->validateRecaptcha($request)) {
            return response()->json(['success' => false, 'message' => 'reCAPTCHA validation failed.']);
        }
        return response()->json(['success' => true, 'message' => 'Enquiry berhasil dikirim!']);
    }

    public function subscribe(Request $request) 
    { 
        return response()->json(['success' => true, 'message' => 'Berhasil subscribe newsletter!']);
    }
}