<section id="Featured" class="mt-[30px]">
    <div class="relative">
        <!-- Carousel Wrapper -->
        <div id="carouselContainer"
            class="flex overflow-x-hidden scroll-smooth transition-all duration-500 snap-x snap-mandatory relative w-full">
            @foreach (array_slice($news['results'], 0, 3) as $article)
                <div class="w-full shrink-0 snap-start flex justify-center items-center">
                    <div class="relative w-[95%] sm:w-[90%] md:w-[85%] lg:w-[80%] xl:w-[75%] h-[250px] sm:h-[350px] md:h-[450px] lg:h-[550px] overflow-hidden rounded-xl">
                        @if (!empty($article['image']))
                            <img src="{{ $article['image'] }}" class="object-cover w-full h-full rounded-xl" alt="thumbnail">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=No+Image" class="object-cover w-full h-full rounded-xl" alt="No Image Available">
                        @endif

                        <!-- Dark overlay gradient -->
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black z-10 rounded-xl"></div>

                        <!-- Text content inside image -->
                        <div class="absolute bottom-0 left-0 right-0 z-20 p-4 sm:p-6 md:p-10 text-white">
                            <div class="flex flex-col gap-2 sm:gap-3 md:gap-4">
                                <p class="text-sm sm:text-base">{{ $article['source']['location']['country_name'] }}</p>
                                <a href="{{ $article['source']['home_page_url'] }}"
                                    class="font-bold text-xl sm:text-2xl md:text-3xl lg:text-4xl leading-snug hover:underline transition-all duration-300">
                                    {{ $article['title'] }}
                                </a>
                                <p class="text-xs sm:text-sm md:text-base">{{ \Carbon\Carbon::parse($article['published_at'])->format('Y-m-d H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Navigation Buttons -->
        <div class="absolute z-30 top-1/2 right-4 sm:right-10 flex items-center gap-4 transform -translate-y-1/2">
            <button id="prevBtn"
                class="appearance-none w-[38px] h-[38px] flex items-center justify-center rounded-full shrink-0 ring-1 ring-white hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                <img src="assets/images/icons/arrow.svg" alt="prev" />
            </button>
            <button id="nextBtn"
                class="appearance-none w-[38px] h-[38px] flex items-center justify-center rounded-full shrink-0 ring-1 ring-white hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 rotate-180">
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
