<?php

if (!function_exists('getYouTubeVideoId')) {
    function getYouTubeVideoId(?string $url): ?string
    {
        if (!$url) {
            return null;
        }

        $pattern = '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';

        if (preg_match($pattern, $url, $match)) {
            return $match[1];
        }

        return null;
    }
}

if (!function_exists('getYouTubeEmbedUrl')) {
    function getYouTubeEmbedUrl(?string $url): string
    {
        $videoId = getYouTubeVideoId($url);

        if ($videoId) {
            return 'https://www.youtube.com/embed/' . $videoId . '?rel=0&modestbranding=1&playsinline=1';
        }

        return '';
    }
}

if (!function_exists('getYouTubeThumbnailUrl')) {
    function getYouTubeThumbnailUrl(?string $url, string $quality = 'mqdefault'): string
    {
        $videoId = getYouTubeVideoId($url);

        if ($videoId) {
            return "https://img.youtube.com/vi/{$videoId}/{$quality}.jpg";
        }
        
        return '';
    }
}