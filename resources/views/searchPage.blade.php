<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="{{ asset('css/output.css') }}"/>
		<link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
	</head>
	<body class="font-[Poppins]">
		<nav id="Navbar" class="max-w-[1130px] mx-auto flex justify-between items-center mt-[30px]">
			<a href="index.html">
				<div class="flex shrink-0">
					<img src="assets/images/logos/logo.svg" alt="Maga Logo" />
				</div>
			</a>
					</nav>
		<nav id="Category" class="max-w-[1130px] mx-auto flex justify-center items-center gap-4 mt-[30px]">
			<a href="categoryPage.html" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
				<div class="w-6 h-6 flex shrink-0">
					<img src="assets/images/icons/heart.svg" alt="icon" />
				</div>
				<span>Health</span>
			</a>
			<a href="categoryPage.html" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
				<div class="w-6 h-6 flex shrink-0">
					<img src="assets/images/icons/status-up.svg" alt="icon" />
				</div>
				<span>Business</span>
			</a>
			<a href="categoryPage.html" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
				<div class="w-6 h-6 flex shrink-0">
					<img src="assets/images/icons/car.svg" alt="icon" />
				</div>
				<span>Automotive</span>
			</a>
			<a href="categoryPage.html" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
				<div class="w-6 h-6 flex shrink-0">
					<img src="assets/images/icons/global.svg" alt="icon" />
				</div>
				<span>Entertainment</span>
			</a>
			<a href="categoryPage.html" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
				<div class="w-6 h-6 flex shrink-0">
					<img src="assets/images/icons/coffee.svg" alt="icon" />
				</div>
				<span>Foods</span>
			</a>
			<a href="categoryPage.html" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
				<div class="w-6 h-6 flex shrink-0">
					<img src="assets/images/icons/courthouse.svg" alt="icon" />
				</div>
				<span>Politic</span>
			</a>
			<a href="categoryPage.html" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
				<div class="w-6 h-6 flex shrink-0">
					<img src="assets/images/icons/cup.svg" alt="icon" />
				</div>
				<span>Sport</span>
			</a>
		</nav>
		<section id="heading" class="max-w-[1130px] mx-auto flex items-center flex-col gap-[30px] mt-[70px]">
			<h1 class="text-4xl leading-[45px] font-bold text-center">
				Explore Hot Trending <br />
				Good News Today
			</h1>
			{{-- <form action="{{route ('news.search')}}" method="GET"> --}}
    <label for="search-bar" class="w-[500px] flex p-[12px_20px] transition-all duration-300 gap-[10px] ring-1 ring-[#E8EBF4] focus-within:ring-2 focus-within:ring-[#FF6B18] rounded-[50px] group">
        <div class="w-5 h-5 flex shrink-0">
            <img src="assets/images/icons/search-normal.svg" alt="icon" />
        </div>
        <input
            autocomplete="off"
            type="text"
            id="search-bar"
            name="search"
            placeholder="Search hot trendy news today..."
            class="appearance-none font-semibold placeholder:font-normal placeholder:text-[#A3A6AE] outline-none focus:ring-0 w-full"
            value="{{ request('search') }}"
        />
    </label>
</form>

		</section>
		<section id="search-result" class="max-w-[1130px] mx-auto flex items-start flex-col gap-[30px] mt-[70px] mb-[100px]">
    <h2 class="text-[26px] leading-[39px] font-bold">
        Search Result: <span>{{ $search ?? 'No search query' }}</span>
    </h2>

    <div id="search-cards" class="grid grid-cols-3 gap-[30px]">
        @if(isset($searchData) && count($searchData) > 0)
            @foreach($searchData as $news)
                <a href="{{ $news['url'] }}" target="_blank" class="card">
                    <div class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[20px] overflow-hidden bg-white">
                        <div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
                            <div class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
                                <p class="text-xs leading-[18px] font-bold">{{ strtoupper($news['category'] ?? 'NEWS') }}</p>
                            </div>
                            <img src="{{ $news['image_url'] ?? 'https://via.placeholder.com/400' }}" alt="thumbnail photo" class="w-full h-full object-cover" />
                        </div>
                        <div class="flex flex-col gap-[6px]">
                            <h3 class="text-lg leading-[27px] font-bold">{{ $news['title'] }}</h3>
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">{{ \Carbon\Carbon::parse($news['published_at'])->format('d M, Y') }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            <p class="text-gray-500">No results found.</p>
        @endif
    </div>
</section>

	</body>
</html>
