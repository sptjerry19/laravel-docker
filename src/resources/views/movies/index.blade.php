<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách phim</title>
</head>
<body>

<h1>Danh sách phim</h1>

<!-- Nút Tạo phim mới -->
<a href="{{ route('movies.create') }}" style="margin-bottom: 10px; display: inline-block;">
    <button type="button">Tạo phim mới</button>
</a>

<!-- Form tìm kiếm và lọc -->
<form method="GET" action="{{ route('movies.index') }}" style="margin-bottom: 20px;">
    <input type="text" name="keyword" placeholder="Tìm kiếm theo tên..." value="{{ request('search') }}">

    <select name="type">
        <option value="">Chọn loại</option>
        <option value="movie" {{ request('type') == 'movie' ? 'selected' : '' }}>Movie</option>
        <option value="series" {{ request('type') == 'series' ? 'selected' : '' }}>Series</option>
    </select>

    <button type="submit">Tìm kiếm</button>
</form>

<!-- Danh sách phim -->
<table border="1" width="100%" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Tiêu đề</th>
            <th>Năm</th>
            <th>Loại</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($movies as $movie)
            <tr>
                <td>{{ $movie['title'] }}</td>
                <td>{{ $movie['year'] }}</td>
                <td>{{ $movie['type'] }}</td>
                <td>
                    <a href="{{ route('movies.show', ['id' => $movie['id']]) }}">Xem</a>
                    |
                    <a href="{{ route('movies.edit', ['id' => $movie['id']]) }}">Chỉnh sửa</a>
                    |
                    <form action="{{ route('movies.destroy', ['id' => $movie['id']]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa phim này không?')">Xóa</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Không có phim nào.</td>
            </tr>
        @endforelse
    </tbody>
</table>

</body>
</html>
