<section id="Featured" class="featured-section">
    <div class="relative">
        <!-- Carousel Wrapper -->
        <div id="carouselContainer" class="carousel-container">
            @foreach (array_slice($news['results'], 0, 3) as $article)
                <div class="carousel-item">
                    <div class="carousel-item-inner">
                        @if (!empty($article['image']))
                            <img src="{{ $article['image'] }}" alt="thumbnail" class="carousel-image">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=No+Image" alt="No Image Available" class="carousel-image">
                        @endif

                        <!-- Dark overlay gradient -->
                        <div class="overlay-gradient"></div>

                        <!-- Text content inside image -->
                        <div class="carousel-text">
                            <div class="text-content">
                                <p class="country-name">{{ $article['source']['location']['country_name'] }}</p>
                                <a href="{{ $article['source']['home_page_url'] }}" class="article-title">
                                    {{ $article['title'] }}
                                </a>
                                <p class="published-date">{{ \Carbon\Carbon::parse($article['published_at'])->format('Y-m-d H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Navigation Buttons -->
        <div class="nav-buttons">
            <button id="prevBtn" class="nav-button prev-button">
                <img src="assets/images/icons/arrow.svg" alt="prev" />
            </button>
            <button id="nextBtn" class="nav-button next-button">
                <img src="assets/images/icons/arrow.svg" alt="next" />
            </button>
        </div>
    </div>
</section>




<script>
    document.addEventListener("DOMContentLoaded", function () {
        const container = document.getElementById("carouselContainer");
        const nextBtn = document.getElementById("nextBtn");
        const prevBtn = document.getElementById("prevBtn");
        const slides = container.children;
        const slideCount = slides.length;
        let currentIndex = 0;

        function goToSlide(index) {
            const slideWidth = slides[0].offsetWidth;
            container.scrollTo({
                left: slideWidth * index,
                behavior: 'smooth'
            });
        }

        nextBtn.addEventListener("click", () => {
            currentIndex = (currentIndex + 1) % slideCount;
            goToSlide(currentIndex);
        });

        prevBtn.addEventListener("click", () => {
            currentIndex = (currentIndex - 1 + slideCount) % slideCount;
            goToSlide(currentIndex);
        });

        // Auto-slide every 5 seconds
        setInterval(() => {
            currentIndex = (currentIndex + 1) % slideCount;
            goToSlide(currentIndex);
        }, 5000);

        // Optional: Pause on hover
        container.addEventListener('mouseenter', () => clearInterval(autoScroll));
    });
</script>
