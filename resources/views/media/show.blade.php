<x-layout title="{{ $mediaItem['title'] }} - Edukkep" customCss="media.css">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Home</a> | <a href="{{ route('media') }}">Media</a> | <span>{{ $mediaItem['title'] }}</span>
        </div>
        
        <div class="media-detail">
            <div class="media-header">
                <span class="media-type-badge">{{ ucfirst($mediaItem['type']) }}</span>
                <h1>{{ $mediaItem['title'] }}</h1>
                <div class="media-meta">
                    <span><i class="fas fa-calendar"></i> {{ date('M d, Y', strtotime($mediaItem['date'])) }}</span>
                </div>
            </div>
            
            <div class="media-player">
                @if($mediaItem['type'] === 'video')
                    @if(isset($mediaItem['video_source']) && $mediaItem['video_source'] === 'youtube' && !empty($mediaItem['embed_url']))
                        <iframe 
                            src="{{ $mediaItem['embed_url'] }}" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            allowfullscreen
                            loading="lazy">
                        </iframe>
                    @else
                        <img src="{{ $mediaItem['image'] ?? asset('images/placeholder.jpg') }}" alt="{{ $mediaItem['title'] }}">
                    @endif
                @else
                    <img src="{{ $mediaItem['image'] ?? asset('images/placeholder.jpg') }}" alt="{{ $mediaItem['title'] }}" loading="lazy">
                @endif
            </div>
            
            <div class="media-description">
                <h3>Description</h3>
                <p>{{ $mediaItem['description'] }}</p>
                @if(isset($mediaItem['content']))
                    <div class="media-content-details">
                        <h4>Content Details</h4>
                        <p>{!! nl2br(e($mediaItem['content'])) !!}</p>
                    </div>
                @endif
            </div>
            
            <div class="media-actions">
                <div class="media-share">
                    <span>Share:</span>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="share-btn facebook">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($mediaItem['title']) }}" target="_blank" class="share-btn twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($mediaItem['title'] . ' - ' . request()->url()) }}" target="_blank" class="share-btn whatsapp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
                <div class="action-buttons">
                    <a href="{{ route('media') }}" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Back to Media
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>