<x-layout title="Home - Edukkep" customCss="home.css">
    <section class="hero-section">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Welcome to Edukkep</h1>
                <p>Platform edukasi keperawatan terdepan untuk pengembangan profesional perawat Indonesia</p>
                <div class="hero-buttons">
                    <a href="{{ route('updates') }}" class="btn btn-primary">Explore Updates</a>
                    <a href="{{ route('media') }}" class="btn btn-secondary">View Media</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="https://img.freepik.com/free-vector/detailed-doctors-nurses-collection-illustration_23-2148920309.jpg" alt="Nursing Education">
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <div class="cta-buttons">
                <div class="cta-item">
                    <i class="fas fa-phone"></i>
                    <h3>Call Us</h3>
                    <p>+62 812-3456-7890</p>
                    <span>24/7 Support</span>
                </div>
                <div class="cta-item">
                    <i class="fas fa-envelope"></i>
                    <h3>Mail Us</h3>
                    <p>ryanbobyaditya@gmail.com</p>
                    <span>Quick Response</span>
                </div>
            </div>
            
            <div class="latest-news">
                <h2>Our Updates</h2>
                <div class="news-grid">
                    @foreach($latestNews as $news)
                    <div class="news-card">
                        <div class="news-image">
                            <img src="{{ $news['image'] }}" alt="{{ $news['title'] }}">
                            <div class="news-overlay">
                                <span class="news-category">{{ $news['category'] }}</span>
                            </div>
                        </div>
                        <div class="news-content">
                            <h3>{{ $news['title'] }}</h3>
                            <p>{{ $news['description'] }}</p>
                            <div class="news-meta">
                                <span class="news-date">{{ date('M d, Y', strtotime($news['date'])) }}</span>
                                <a href="{{ route('updates.show', $news['id']) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="section-footer">
                    <a href="{{ route('updates') }}" class="btn btn-outline">View All Updates</a>
                </div>
            </div>
        </div>
    </section>

    <section class="media-section">
        <div class="container">
            <h2>Our Media</h2>
            <div class="media-grid">
                @foreach($latestMedia as $media)
                <div class="media-card">
                    <div class="media-image">
                        <img src="{{ $media['image'] }}" alt="{{ $media['title'] }}">
                        <div class="media-overlay">
                            <i class="fas fa-play"></i>
                            <span class="media-type">{{ ucfirst($media['type']) }}</span>
                        </div>
                    </div>
                    <div class="media-content">
                        <h3>{{ $media['title'] }}</h3>
                        <p>{{ $media['description'] }}</p>
                        <div class="media-meta">
                            <span class="media-date">{{ date('M d, Y', strtotime($media['date'])) }}</span>
                            <a href="{{ route('media.show', $media['id']) }}" class="btn btn-primary">View Media</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="section-footer">
                <a href="{{ route('media') }}" class="btn btn-outline">View All Media</a>
            </div>
        </div>
    </section>
</x-layout>