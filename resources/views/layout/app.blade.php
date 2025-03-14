<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/output.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <title>Thursina News</title>
</head>

<body class="font-[Poppins] pb-[72px]">
    <header>
    <nav id="Navbar" class="max-w-[1130px] mx-auto flex justify-between items-center mt-[30px]">
        <div class="logo-container flex gap-[30px] items-center">
            <a href="/search" class="flex shrink-0">
                <img src="assets/images/logos/logo.png" alt="logo"width="70" height="70"
                    style="object-fit: contain ;">
                <h1
                    style="text-align: center; font-weight: bold; font-family: 'Poppins', sans-serif; padding-top: 20px;padding-left: 20px;padding-right: 20px;">
                    Thursina News</h1>
                <div class="h-12 border border-[#E8EBF4]"></div>
                <form action="/search"
                    class="w-[450px] flex items-center rounded-full border border-[#E8EBF4] p-[12px_20px] gap-[10px] focus-within:ring-2 focus-within:ring-[#FF6B18] transition-all duration-300">
                    <button type="submit" class="w-5 h-5 flex shrink-0">
                        <img src="assets/images/icons/search-normal.svg" alt="icon" />
                    </button>
                    <input type="text" name="" id=""
                        class="appearance-none outline-none w-full font-semibold placeholder:font-normal placeholder:text-[#A3A6AE]"
                        placeholder="Search hot trendy news today..." />
                </form>
        </div>
    </nav>
    <nav id="Category" class="max-w-[1130px] mx-auto flex justify-center items-center gap-4 mt-[30px]">
        <a href="/news/business"
            class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
            <div class="w-6 h-6 flex shrink-0">
                <img src="assets/images/icons/status-up.svg" alt="icon" />
            </div>
            <span>Business</span>
        </a>
        <a href="/news/entertain"
            class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
            <div class="w-6 h-6 flex shrink-0">
                <img src="assets/images/icons/global.svg" alt="icon" />
            </div>
            <span>Entertainment</span>
        </a>
        <a href="/news/politics"
            class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
            <div class="w-6 h-6 flex shrink-0">
                <img src="assets/images/icons/information.png" alt="icon" />
            </div>
            <span>Politics</span>
        </a>
        <a href="/news/health"
            class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
            <div class="w-6 h-6 flex shrink-0">
                <img src="assets/images/icons/heart.svg" alt="icon" />
            </div>
            <span>Health</span>
        </a>
        <a href="/news/science"
            class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
            <div class="w-6 h-6 flex shrink-0">
                <img src="assets/images/icons/atom.png" alt="icon" />
            </div>
            <span>science</span>
        </a>
        <a href="/news/sports"
            class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
            <div class="w-6 h-6 flex shrink-0">
                <img src="assets/images/icons/sports.png" alt="icon" />
            </div>
            <span>Sport</span>
        </a>
        <a href="/news/tech"
            class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
            <div class="w-6 h-6 flex shrink-0">
                <img src="assets/images/icons/technology.png" alt="icon" />
            </div>
            <span>Technology</span>
        </a>
              <a href="/news/islamic"
            class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
            <div class="w-6 h-6 flex shrink-0">
                <img src="assets/images/icons/global.svg" alt="icon" />
            </div>
            <span>Islamic</span>
        </a>
          <a href="/news/international"
            class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
            <div class="w-6 h-6 flex shrink-0">
                <img src="assets/images/icons/global.svg" alt="icon" />
            </div>
            <span>International</span>
        </a>
          <a href="/news/local"
            class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
            <div class="w-6 h-6 flex shrink-0">
                <img src="assets/images/icons/global.svg" alt="icon" />
            </div>
            <span>Local</span>
        </a>
    </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>
