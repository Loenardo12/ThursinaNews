@extends('layout.app')

@section('content')


    {{-- lastest world news header --}}
    <section id="Up-to-date" class="up-to-date-section">
        <div class="header">
            <h2 class="section-title">
                Latest Hot News <br />
                world News
            </h2>
            <p class="badge-orange">UP TO DATE</p>
        </div>

        <div class="news-grid">
            @foreach ($news['results'] as $article)
                <div class="news-card">
                    <div class="thumbnail-container">
                        <a href="{{ $article['href'] }}" target="_blank" class="card-news">
                            <p class="badge-white">
                                {{ $article['source']['location']['country_name'] }}
                            </p>
                            @if (!empty($article['image']))
                                <img src="{{ $article['image'] }}" alt="thumbnail" class="thumbnail-image">
                            @else
                                <img src="https://via.placeholder.com/300x200?text=No+Image" alt="No Image Available" class="thumbnail-image">
                            @endif
                        </a>
                    </div>
                    <div class="card-info">
                        <h3 class="news-title">{{ $article['title'] }}</h3>
                        <p class="author-text">
                            Author: <a href="{{ $article['source']['home_page_url'] }}" target="_blank" rel="noopener noreferrer">{{ $article['source']['domain'] }}</a>
                        </p>
                        <p class="publish-date">
                            Publish Date: {{ \Carbon\Carbon::parse($article['published_at'])->format('Y-m-d H:i') }}
                        </p>
                    </div>
                </div>
            @endforeach
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
