<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm phim mới</title>
</head>
<body>

<h1>Thêm phim mới</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('movies.store') }}" method="POST">
    @csrf

    <div>
        <label for="title">Tiêu đề phim:</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}">
    </div>

    <div>
        <label for="year">Năm phát hành:</label>
        <input type="text" name="year" id="year" value="{{ old('year') }}">
    </div>

    <div>
        <label for="rated">Phân loại:</label>
        <input type="text" name="rated" id="rated" value="{{ old('rated') }}">
    </div>

    <div>
        <label for="released">Ngày phát hành:</label>
        <input type="text" name="released" id="released" value="{{ old('released') }}">
    </div>

    <div>
        <label for="runtime">Thời lượng:</label>
        <input type="text" name="runtime" id="runtime" value="{{ old('runtime') }}">
    </div>

    <div>
        <label for="genre">Thể loại:</label>
        <input type="text" name="genre" id="genre" value="{{ old('genre') }}">
    </div>

    <div>
        <label for="director">Đạo diễn:</label>
        <input type="text" name="director" id="director" value="{{ old('director') }}">
    </div>

    <div>
        <label for="writer">Biên kịch:</label>
        <input type="text" name="writer" id="writer" value="{{ old('writer') }}">
    </div>

    <div>
        <label for="actors">Diễn viên:</label>
        <input type="text" name="actors" id="actors" value="{{ old('actors') }}">
    </div>

    <div>
        <label for="plot">Nội dung:</label>
        <textarea name="plot" id="plot">{{ old('plot') }}</textarea>
    </div>

    <div>
        <label for="language">Ngôn ngữ:</label>
        <input type="text" name="language" id="language" value="{{ old('language') }}">
    </div>

    <div>
        <label for="country">Quốc gia:</label>
        <input type="text" name="country" id="country" value="{{ old('country') }}">
    </div>

    <div>
        <label for="awards">Giải thưởng:</label>
        <input type="text" name="awards" id="awards" value="{{ old('awards') }}">
    </div>

    <div>
        <label for="poster">Poster URL:</label>
        <input type="text" name="poster" id="poster" value="{{ old('poster') }}">
    </div>

    <div>
        <label for="metascore">Metascore:</label>
        <input type="text" name="metascore" id="metascore" value="{{ old('metascore') }}">
    </div>

    <div>
        <label for="imdb_rating">IMDB Rating:</label>
        <input type="text" name="imdb_rating" id="imdb_rating" value="{{ old('imdb_rating') }}">
    </div>

    <div>
        <label for="imdb_votes">IMDB Votes:</label>
        <input type="text" name="imdb_votes" id="imdb_votes" value="{{ old('imdb_votes') }}">
    </div>

    <div>
        <label for="imdb_id">IMDB ID:</label>
        <input type="text" name="imdb_id" id="imdb_id" value="{{ old('imdb_id') }}">
    </div>

    <div>
        <label for="type">Loại:</label>
        <select name="type" id="type">
            <option value="movie" {{ old('type') == 'movie' ? 'selected' : '' }}>Movie</option>
            <option value="series" {{ old('type') == 'series' ? 'selected' : '' }}>Series</option>
        </select>
    </div>

    <div>
        <label for="images">Hình ảnh (nhập nhiều link, cách nhau bằng dấu phẩy):</label>
        <textarea name="images" id="images">{{ old('images') }}</textarea>
    </div>

    <div>
        <button type="submit">Lưu phim</button>
        <a href="{{ route('movies.index') }}">Quay lại danh sách</a>
    </div>
</form>

</body>
</html>
