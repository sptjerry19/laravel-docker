<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa phim</title>
</head>
<body>
    <h1>Chỉnh sửa phim</h1>

    @if ($errors->any())
        <div>
            <strong>Lỗi!</strong> Vui lòng kiểm tra lại thông tin bên dưới:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('movies.update', ['id' => $movie['imdbID']]) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Tên phim:</label>
            <input type="text" id="title" name="Title" value="{{ old('Title', $movie['Title'] ?? '') }}" required>
        </div>

        <div>
            <label for="year">Năm phát hành:</label>
            <input type="text" id="year" name="Year" value="{{ old('Year', $movie['Year'] ?? '') }}" required>
        </div>

        <div>
            <label for="type">Thể loại:</label>
            <input type="text" id="type" name="Type" value="{{ old('Type', $movie['Type'] ?? '') }}" required>
        </div>

        <div>
            <label for="director">Đạo diễn:</label>
            <input type="text" id="director" name="Director" value="{{ old('Director', $movie['Director'] ?? '') }}">
        </div>

        <div>
            <label for="actors">Diễn viên:</label>
            <input type="text" id="actors" name="Actors" value="{{ old('Actors', $movie['Actors'] ?? '') }}">
        </div>

        <div>
            <label for="plot">Nội dung:</label>
            <textarea id="plot" name="Plot" rows="4">{{ old('Plot', $movie['Plot'] ?? '') }}</textarea>
        </div>

        <div>
            <label for="poster">Link Poster:</label>
            <input type="text" id="poster" name="Poster" value="{{ old('Poster', $movie['Poster'] ?? '') }}">
        </div>

        <div>
            <button type="submit">Cập nhật phim</button>
        </div>
    </form>

    <a href="{{ route('movies.index') }}">Quay lại danh sách phim</a>
</body>
</html>
