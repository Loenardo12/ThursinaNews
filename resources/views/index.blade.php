@extends('layout.app')

@section('content')


    {{-- lastest world news header --}}
    <section id="Up-to-date" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-[26px] leading-[39px]">
                Latest Hot News <br />
                world News
            </h2>
            <p
                class="badge-orange rounded-full p-[8px_18px] bg-[#FFECE1] font-bold text-sm leading-[21px] text-[#FF6B18] w-fit">
                UP TO DATE</p>
        </div>
        {{-- lastest news content --}}
        <div class="grid grid-cols-3 gap-[30px]">
            @foreach ($news['results'] as $article)
                <div
                    class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[26px_20px] flex flex-col gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 bg-white">
                    <div class="thumbnail-container w-full h-[200px] rounded-[20px] flex shrink-0 overflow-hidden relative">
                        <a href="{{ $article['href'] }}" target="_blank" class="card-news">
                            <p
                                class="badge-white absolute top-5 left-5 rounded-full p-[8px_18px] bg-white font-bold text-xs leading-[18px]">
                                {{ $article['source']['location']['country_name'] }}
                            </p>
                            @if (!empty($article['image']))
                                <img src="{{ $article['image'] }}" class="object-cover w-full h-full" alt="thumbnail">
                            @else
                                <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top"
                                    alt="No Image Available">
                            @endif

                        </a>
                    </div>
                    <div class="card-info flex flex-col gap-[6px]">
                        <h3 class="font-bold text-lg leading-[27px]">{{ $article['title'] }}</h3>
                        <p class="text-sm leading-[21px] text-[#A3A6AE]">Author: <a
                                href="{{ $article['source']['home_page_url'] }}"
                                target="_blank" rel="noopener noreferrer">{{ $article['source']['domain'] }}</a></p>
                        <p class="text-sm leading-[21px] text-[#A3A6AE]">Publish Date:
                            {{ \Carbon\Carbon::parse($article['published_at'])->format('Y-m-d H:i') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

 {{-- latest Entertainment --}}
 <section id="Latest-entertainment" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
    <div class="flex justify-between items-center">
        <h2 class="font-bold text-[26px] leading-[39px]">
            Latest For You <br />
            in Entertainment
        </h2>
        <a href="categoryPage.html"
            class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">Explore
            All</a>
    </div>
    <div class="flex justify-between items-center h-fit">

        <div class="featured-news-card relative w-full h-[424px] flex flex-1 rounded-[20px] overflow-hidden">
            <img src="assets/images/thumbnails/th-featured-1.png"
                class="thumbnail absolute w-full h-full object-cover" alt="icon" />
            <div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10">
            </div>
            <div class="card-detail w-full flex items-end p-[30px] relative z-20">
                <div class="flex flex-col gap-[10px]">
                    <p class="text-white">Featured</p>
                    <a href="details.html"
                        class="font-bold text-[30px] leading-[36px] text-white hover:underline transition-all duration-300">Rela
                        Tampil Menarik Depan Wanita, Pria Ini Jadi Bahan Bicaraan</a>
                    <p class="text-white">12 Jun, 2024</p>
                </div>
            </div>
        </div>
        <div class="h-[424px] w-fit px-5 overflow-y-scroll overflow-x-hidden relative custom-scrollbar">
            <div class="w-[455px] flex flex-col gap-5 shrink-0">
                <a href="details.html" class="card py-[2px]">
                    <div
                        class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                        <div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
                            <img src="assets/images/thumbnails/th-sunbathe.png" class="object-cover w-full h-full"
                                alt="thumbnail" />
                        </div>
                        <div class="flex flex-col justify-center-center gap-[6px]">
                            <h3 class="font-bold text-lg leading-[27px]">Bikin house party tanpa biaya mahal,
                                begini tipsnya!</h3>
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                        </div>
                    </div>
                </a>
                <a href="details.html" class="card py-[2px]">
                    <div
                        class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                        <div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
                            <img src="assets/images/thumbnails/camp.png" class="object-cover w-full h-full"
                                alt="thumbnail" />
                        </div>
                        <div class="flex flex-col justify-center-center gap-[6px]">
                            <h3 class="font-bold text-lg leading-[27px]">Gaya pakaian pernikahan artis ini beneran
                                unik</h3>
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                        </div>
                    </div>
                </a>
                <a href="details.html" class="card py-[2px]">
                    <div
                        class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                        <div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
                            <img src="assets/images/thumbnails/th-cyclist.png" class="object-cover w-full h-full"
                                alt="thumbnail" />
                        </div>
                        <div class="flex flex-col justify-center-center gap-[6px]">
                            <h3 class="font-bold text-lg leading-[27px]">Tips bersepeda bareng pasangan baru, makin
                                seru!</h3>
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                        </div>
                    </div>
                </a>
                <a href="details.html" class="card py-[2px]">
                    <div
                        class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                        <div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
                            <img src="assets/images/thumbnails/camp.png" class="object-cover w-full h-full"
                                alt="thumbnail" />
                        </div>
                        <div class="flex flex-col justify-center-center gap-[6px]">
                            <h3 class="font-bold text-lg leading-[27px]">Bikin house party tanpa biaya mahal,
                                begini tipsnya!</h3>
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                        </div>
                    </div>
                </a>
                <a href="details.html" class="card py-[2px]">
                    <div
                        class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                        <div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
                            <img src="assets/images/thumbnails/camp.png" class="object-cover w-full h-full"
                                alt="thumbnail" />
                        </div>
                        <div class="flex flex-col justify-center-center gap-[6px]">
                            <h3 class="font-bold text-lg leading-[27px]">Bikin house party tanpa biaya mahal,
                                begini tipsnya!</h3>
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                        </div>
                    </div>
                </a>
                <a href="details.html" class="card py-[2px]">
                    <div
                        class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                        <div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
                            <img src="assets/images/thumbnails/camp.png" class="object-cover w-full h-full"
                                alt="thumbnail" />
                        </div>
                        <div class="flex flex-col justify-center-center gap-[6px]">
                            <h3 class="font-bold text-lg leading-[27px]">Bikin house party tanpa biaya mahal,
                                begini tipsnya!</h3>
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                        </div>
                    </div>
                </a>
            </div>
            <div
                class="sticky z-10 bottom-0 w-full h-[100px] bg-gradient-to-b from-[rgba(255,255,255,0.19)] to-[rgba(255,255,255,1)]">
            </div>
        </div>


    </div>
</section>

{{-- latest business --}}
<section id="Latest-business" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
    <div class="flex justify-between items-center">
        <h2 class="font-bold text-[26px] leading-[39px]">
            Latest For You <br />
            in Business
        </h2>
        <a href="categoryPage.html"
            class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">Explore
            All</a>
    </div>
    <div class="flex justify-between items-center h-fit">
        <div class="featured-news-card relative w-full h-[424px] flex flex-1 rounded-[20px] overflow-hidden">
            <img src="assets/images/thumbnails/th-featured-1.png"
                class="thumbnail absolute w-full h-full object-cover" alt="icon" />
            <div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10">
            </div>
            <div class="card-detail w-full flex items-end p-[30px] relative z-20">
                <div class="flex flex-col gap-[10px]">
                    <p class="text-white">Featured</p>
                    <a href="details.html"
                        class="font-bold text-[30px] leading-[36px] text-white hover:underline transition-all duration-300">Bikin house party tanpa biaya mahal,
                        begini tipsnya!</a>
                    <p class="text-white">12 Jun, 2024</p>
                </div>
            </div>
        </div>
        <div class="h-[424px] w-fit px-5 overflow-y-scroll overflow-x-hidden relative custom-scrollbar">
            <div class="w-[455px] flex flex-col gap-5 shrink-0">
                <a href="details.html" class="card py-[2px]">
                    <div
                        class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                        <div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
                            <img src="assets/images/thumbnails/th-building.png" class="object-cover w-full h-full"
                                alt="thumbnail" />
                        </div>
                        <div class="flex flex-col justify-center-center gap-[6px]">
                            <h3 class="font-bold text-lg leading-[27px]">Angga telah launching office space special
                                edition</h3>
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                        </div>
                    </div>
                </a>
                <a href="details.html" class="card py-[2px]">
                    <div
                        class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                        <div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
                            <img src="assets/images/thumbnails/th-key.png" class="object-cover w-full h-full"
                                alt="thumbnail" />
                        </div>
                        <div class="flex flex-col justify-center-center gap-[6px]">
                            <h3 class="font-bold text-lg leading-[27px]">Pembelian rumah saat ini tanpa perlu down
                                payment</h3>
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                        </div>
                    </div>
                </a>
                <a href="details.html" class="card py-[2px]">
                    <div
                        class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                        <div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
                            <img src="assets/images/thumbnails/camp.png" class="object-cover w-full h-full"
                                alt="thumbnail" />
                        </div>
                        <div class="flex flex-col justify-center-center gap-[6px]">
                            <h3 class="font-bold text-lg leading-[27px]">Tips trading ala generation Z bikin kita
                                sukses untung</h3>
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                        </div>
                    </div>
                </a>
                <a href="details.html" class="card py-[2px]">
                    <div
                        class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                        <div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
                            <img src="assets/images/thumbnails/camp.png" class="object-cover w-full h-full"
                                alt="thumbnail" />
                        </div>
                        <div class="flex flex-col justify-center-center gap-[6px]">
                            <h3 class="font-bold text-lg leading-[27px]">Bikin house party tanpa biaya mahal,
                                begini tipsnya!</h3>
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                        </div>
                    </div>
                </a>
                <a href="details.html" class="card py-[2px]">
                    <div
                        class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                        <div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
                            <img src="assets/images/thumbnails/camp.png" class="object-cover w-full h-full"
                                alt="thumbnail" />
                        </div>
                        <div class="flex flex-col justify-center-center gap-[6px]">
                            <h3 class="font-bold text-lg leading-[27px]">Bikin house party tanpa biaya mahal,
                                begini tipsnya!</h3>
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                        </div>
                    </div>
                </a>
                <a href="details.html" class="card py-[2px]">
                    <div
                        class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
                        <div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
                            <img src="assets/images/thumbnails/camp.png" class="object-cover w-full h-full"
                                alt="thumbnail" />
                        </div>
                        <div class="flex flex-col justify-center-center gap-[6px]">
                            <h3 class="font-bold text-lg leading-[27px]">Bikin house party tanpa biaya mahal,
                                begini tipsnya!</h3>
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                        </div>
                    </div>
                </a>
            </div>
            <div
                class="sticky z-10 bottom-0 w-full h-[100px] bg-gradient-to-b from-[rgba(255,255,255,0.19)] to-[rgba(255,255,255,1)]">
            </div>
        </div>
    </div>
</section>




    <script src="js/two-lines-text.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

@endsection
