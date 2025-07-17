<x-layout title="{{ $article['title'] }} - Edukkep" customCss="updates.css">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Home</a> | <a href="{{ route('updates') }}">Updates</a> | <span>{{ $article['title'] }}</span>
        </div>
        
        <article class="article-detail">
            <div class="article-header">
                <span class="article-category">{{ $article['category'] }}</span>
                <h1>{{ $article['title'] }}</h1>
                <div class="article-meta">
                    <span><i class="fas fa-calendar"></i> {{ date('M d, Y', strtotime($article['date'])) }}</span>
                    <span><i class="fas fa-user"></i> {{ $article['author'] }}</span>
                </div>
            </div>
            
            <div class="article-image">
                <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}">
            </div>
            
            <div class="article-content">
                {!! nl2br(e($article['content'])) !!}
            </div>
            
            <div class="article-footer">
                <div class="article-share">
                    <span>Share:</span>
                    <a href="#" class="share-btn facebook"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="share-btn twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="share-btn whatsapp"><i class="fab fa-whatsapp"></i></a>
                </div>
                <a href="{{ route('updates') }}" class="btn btn-outline">Back to Updates</a>
            </div>
        </article>
    </div>
</x-layout>