<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chi tiết phim - {{ $movie->Title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .movie-detail {
            display: flex;
            gap: 20px;
        }
        .movie-poster img {
            max-width: 300px;
        }
        .movie-info {
            max-width: 600px;
        }
        .movie-images img {
            width: 150px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>{{ $movie->title }} ({{ $movie->year }})</h1>

    <div class="movie-detail">
        <div class="movie-poster">
            <img src="{{ $movie->poster }}" alt="{{ $movie->title }}">
        </div>
        <div class="movie-info">
            <p><strong>Đạo diễn:</strong> {{ $movie->director }}</p>
            <p><strong>Diễn viên:</strong> {{ $movie->actors }}</p>
            <p><strong>Thể loại:</strong> {{ $movie->genre }}</p>
            <p><strong>Thời lượng:</strong> {{ $movie->runtime }}</p>
            <p><strong>Quốc gia:</strong> {{ $movie->country }}</p>
            <p><strong>Ngôn ngữ:</strong> {{ $movie->language }}</p>
            <p><strong>Điểm IMDb:</strong> {{ $movie->imdbRating }}</p>
            <p><strong>Mô tả:</strong> {{ $movie->plot }}</p>
        </div>
    </div>

    <h3>Hình ảnh:</h3>
    <div class="movie-images">
        @if (!empty($movie->images) && is_array($movie->images))
    <h3>Hình ảnh:</h3>
    <div class="movie-images">
        @foreach ($movie->images as $image)
            <img src="{{ $image }}" alt="Image">
        @endforeach
    </div>
@endif
    </div>

    <a href="{{ route('movies.index') }}">Quay lại danh sách phim</a>
</body>
</html>
