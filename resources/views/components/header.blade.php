<header class="header">
    <nav class="navbar">
        <div class="nav-left">
            <div class="logo">
                <i class="fas fa-user-nurse"></i>
                <span>Edukkep</span>
            </div>
        </div>
        
        <div class="nav-center">
            <ul class="nav-menu">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('updates') }}" class="{{ request()->routeIs('updates*') ? 'active' : '' }}">Updates</a></li>
                <li><a href="{{ route('media') }}" class="{{ request()->routeIs('media*') ? 'active' : '' }}">Media</a></li>
                <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
            </ul>
        </div>
        
        <div class="nav-right">
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Search...">
                <i class="fas fa-search" onclick="performSearch()"></i>
            </div>
            <button class="book-appointment-btn" onclick="openModal()">BOOK APPOINTMENT</button>
        </div>
        
        <div class="mobile-menu-toggle">
            <i class="fas fa-bars"></i>
        </div>
    </nav>
</header>