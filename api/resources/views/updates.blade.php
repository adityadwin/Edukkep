<x-layout title="Updates - Edukkep" customCss="updates.css">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Home</a> |
            <span>Updates</span>
        </div>
        
        <h1 class="page-title">Latest Updates</h1>
        
        <div class="updates-content">
            <aside class="sidebar">
                <h3>Categories</h3>
                <ul class="category-list">
                    @foreach($categories as $cat)
                    <li>
                        <a href="{{ route('updates') }}?category={{ $cat }}" 
                           class="category-link {{ $category === $cat ? 'active' : '' }}">
                            {{ $cat }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </aside>
            
            <div class="main-content">
                <div class="news-list">
                    @foreach($news as $item)
                    <div class="news-item">
                        <div class="news-image">
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
                        </div>
                        <div class="news-info">
                            <span class="news-category">{{ $item['category'] }}</span>
                            <h3><a href="{{ route('updates.show', $item['id']) }}">{{ $item['title'] }}</a></h3>
                            <p class="news-meta">{{ date('M d, Y', strtotime($item['date'])) }}</p>
                            <p class="news-description">{{ \Illuminate\Support\Str::limit($item['description'], 150, '...') }}</p>
                            <a href="{{ route('updates.show', $item['id']) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                @if($hasPages)
                <div class="pagination">
                    @if($page > 1)
                        <a href="{{ route('updates') }}?page={{ $page - 1 }}&category={{ $category }}" class="pagination-link">«</a>
                    @endif
                    
                    @for($i = 1; $i <= $totalPages; $i++)
                        <a href="{{ route('updates') }}?page={{ $i }}&category={{ $category }}" class="pagination-link {{ $i == $page ? 'active' : '' }}">{{ $i }}</a>
                    @endfor
                    
                    @if($page < $totalPages)
                        <a href="{{ route('updates') }}?page={{ $page + 1 }}&category={{ $category }}" class="pagination-link">»</a>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>