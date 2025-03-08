<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div x-data="{ scroll: null }" x-init="scroll = setInterval(() => { $refs.carousel.scrollBy({ left: 200, behavior: 'smooth' }); }, 2000)" class="relative overflow-hidden w-full">
    <div x-ref="carousel" class="flex space-x-8 py-4 overflow-x-auto whitespace-nowrap scrollbar-hide">
        <template x-for="logo in [
            { src: 'https://apitube.io/images/logo-carousel/cnn.svg', alt: 'CNN' },
            { src: 'https://apitube.io/images/logo-carousel/techcrunch.svg', alt: 'Techcrunch' },
            { src: 'https://apitube.io/images/logo-carousel/vox.svg', alt: 'Vox' },
            { src: 'https://apitube.io/images/logo-carousel/apple.svg', alt: 'Apple' },
            { src: 'https://apitube.io/images/logo-carousel/microsoft.svg', alt: 'Microsoft' },
            { src: 'https://apitube.io/images/logo-carousel/ibm.svg', alt: 'IBM' },
            { src: 'https://apitube.io/images/logo-carousel/bloomberg.svg', alt: 'Bloomberg' },
            { src: 'https://apitube.io/images/logo-carousel/spotify.svg', alt: 'Spotify' }
        ]" :key="logo.alt">
            <img :src="logo.src" :alt="logo.alt" class="h-16 md:h-24 object-contain">
        </template>
    </div>
</div>
 @yield('content')

</body>

</html>
