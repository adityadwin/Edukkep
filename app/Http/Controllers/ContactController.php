<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $recaptcha_response = $request->input('g-recaptcha-response');

        if (is_null($recaptcha_response)) {
            return response()->json(['success' => false, 'message' => 'Please complete the reCAPTCHA.']);
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $recaptcha_response
        ]);

        $responseData = $response->json();

        if ($responseData['success'] && $responseData['score'] > 0.5) {
            return response()->json(['success' => true, 'message' => 'Pesan berhasil dikirim!']);
        } else {
            return response()->json(['success' => false, 'message' => 'reCAPTCHA validation failed.']);
        }
    }
}