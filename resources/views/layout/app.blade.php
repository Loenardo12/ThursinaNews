<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/output.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}" />


    <title>Thursina News</title>
</head>

<body class="custom-body">
    <header>
        <nav id="Navbar" class="navbar">
            <div class="logo-container">
                <a href="/search" class="logo-link">
                    <img src="assets/images/logos/logo.png" alt="logo" width="70" height="70" class="logo-img">
                    <h1 class="logo-title">Thursina News</h1>
                    <div class="separator"></div>
                    <form action="/search" class="search-form">
                        <button type="submit" class="search-button">
                            <img src="assets/images/icons/search-normal.svg" alt="icon" />
                        </button>
                        <input type="text" class="search-input" placeholder="Search hot trendy news today..." />
                    </form>
                </a>
            </div>

            <!-- Tambahkan tombol login di luar logo-link -->
            <div class="login-container">
                <a href="/login" class="login-button">
                    <img src="assets/images/icons/login.png" alt="login icon" class="login-icon" />
                    <span>Login</span>
                </a>
            </div>
        </nav>


        <nav id="Category" class="category-nav">
            <a href="/news/business" class="category-link">
                <div class="category-icon">
                    <img src="assets/images/icons/status-up.svg" alt="icon" />
                </div>
                <span>Business</span>
            </a>
            <a href="/news/entertain" class="category-link">
                <div class="category-icon">
                    <img src="assets/images/icons/global.svg" alt="icon" />
                </div>
                <span>Entertainment</span>
            </a>
            <a href="/news/politics" class="category-link">
                <div class="category-icon">
                    <img src="assets/images/icons/information.png" alt="icon" />
                </div>
                <span>Politics</span>
            </a>
            <a href="/news/health" class="category-link">
                <div class="category-icon">
                    <img src="assets/images/icons/heart.svg" alt="icon" />
                </div>
                <span>Health</span>
            </a>
            <a href="/news/science" class="category-link">
                <div class="category-icon">
                    <img src="assets/images/icons/atom.png" alt="icon" />
                </div>
                <span>Science</span>
            </a>
            <a href="/news/sports" class="category-link">
                <div class="category-icon">
                    <img src="assets/images/icons/sports.png" alt="icon" />
                </div>
                <span>Sport</span>
            </a>
            <a href="/news/technology" class="category-link">
                <div class="category-icon">
                    <img src="assets/images/icons/technology.png" alt="icon" />
                </div>
                <span>Technology</span>
            </a>
            <a href="/news/islamic" class="category-link">
                <div class="category-icon">
                    <img src="assets/images/icons/global.svg" alt="icon" />
                </div>
                <span>Islamic</span>
            </a>
            <a href="/news/local" class="category-link">
                <div class="category-icon">
                    <img src="assets/images/icons/global.svg" alt="icon" />
                </div>
                <span>Local</span>
            </a>
        </nav>

        @include('partials.carousel')
    </header>
    <main>
        @yield('content')
          </main>
</body>
<footer>
    @include('partials.footer')

</footer>

</html>
