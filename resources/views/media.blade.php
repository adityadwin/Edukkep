<x-layout title="Media - Edukkep" customCss="media.css">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Home</a> | <span>Media</span>
        </div>
        
        <h1 class="page-title">Media Library</h1>
        
        <div class="media-categories">
            @foreach($categories as $cat)
            <a href="{{ route('media') }}?category={{ $cat }}" 
               class="category-btn {{ $category === $cat ? 'active' : '' }}">
                {{ $cat }}
            </a>
            @endforeach
        </div>
        
        <div class="media-grid">
            @foreach($media as $item)
            <div class="media-card">
                <div class="media-image">
                    <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
                    <div class="media-overlay">
                        @if($item['type'] === 'video')
                            <i class="fas fa-play"></i>
                        @else
                            <i class="fas fa-image"></i>
                        @endif
                    </div>
                    <div class="media-type-badge">{{ ucfirst($item['type']) }}</div>
                </div>
                <div class="media-content">
                    <h3>{{ $item['title'] }}</h3>
                    <p>{{ $item['description'] }}</p>
                    <div class="media-meta">
                        <span class="media-date">{{ date('M d, Y', strtotime($item['date'])) }}</span>
                        <a href="{{ route('media.show', $item['id']) }}" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        @if($hasPages)
        <div class="pagination">
            @if($page > 1)
                <a href="{{ route('media') }}?page={{ $page - 1 }}&category={{ $category }}" class="pagination-link">&laquo;</a>
            @endif
            
            @for($i = 1; $i <= $totalPages; $i++)
                <a href="{{ route('media') }}?page={{ $i }}&category={{ $category }}" class="pagination-link {{ $i == $page ? 'active' : '' }}">{{ $i }}</a>
            @endfor
            
            @if($page < $totalPages)
                <a href="{{ route('media') }}?page={{ $page + 1 }}&category={{ $category }}" class="pagination-link">&raquo;</a>
            @endif
        </div>
        @endif
    </div>
</x-layout>