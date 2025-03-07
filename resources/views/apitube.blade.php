<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Tube News</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
     @foreach ($news['results'] as $article)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if (!empty($article['image']))
                            <img src="{{ $article['image'] }}" class="card-img-top" alt="News Image">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="No Image Available">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $article['title'] }}</h5>
                            <p class="card-text">{{ $article['description'] }}</p>
                            <a href="{{ $article['href'] }}" class="btn btn-primary" target="_blank">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
     {{-- <div class="grid grid-cols-3 gap-[30px]">
            @foreach ($news['results'] as $article)
                <a href="details.html" class="card-news">
                    <div
                        class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[26px_20px] flex flex-col gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 bg-white">
                        <div
                            class="thumbnail-container w-full h-[200px] rounded-[20px] flex shrink-0 overflow-hidden relative">
                            <p
                                class="badge-white absolute top-5 left-5 rounded-full p-[8px_18px] bg-white font-bold text-xs leading-[18px]">
                                ENTERTAINMENT
                            </p>
                            <img src="{{ $news['urlToImage'] }}" class="object-cover w-full h-full" alt="thumbnail">
                        </div>
                        <div class="card-info flex flex-col gap-[6px]">
                            <h3 class="font-bold text-lg leading-[27px]">{{ $news['title'] }}</h3>
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">Author: {{ $news['author'] }}</p>
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">Publish Date:
                                {{ date('d-m-Y', strtotime($news['publishedAt'])) }}</p>
                        </div>
                    </div>
                </a>
            @endforeach


        </div> --}}
    <div class="container mt-4">
        <h1 class="mb-4">Top Headlines</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Published At</th>
                    <th>Source</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news['results'] as $article)
                <tr>
                    <td>{{ $article['title'] }}</td>
                    <td>{{ $article['description'] }}</td>
                    <td>{{ \Carbon\Carbon::parse($article['published_at'])->format('Y-m-d H:i') }}</td>
                    <td><a href="{{ $article['source']['home_page_url'] }}" target="_blank">{{ $article['source']['domain'] }}</a></td>
                    <td><a href="{{ $article['href'] }}" target="_blank">Read More</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-between mt-3">
            @if ($news['has_previous_page'])
                <a href="{{ $news['previous_page'] }}" class="btn btn-primary">Previous Page</a>
            @endif
            @if ($news['has_next_pages'])
                <a href="{{ $news['next_page'] }}" class="btn btn-primary">Next Page</a>
            @endif
        </div>
    </div>
</body>
</html>
