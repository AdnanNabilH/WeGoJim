<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
</head>
<body>
    <h1>Tambah User Baru</h1>
    <form action="{{ url('/admin/user/store') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="name" required><br><br>
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <button type="submit">Simpan</button>
    </form>
    <a href="{{ url('/admin/users') }}">Kembali</a>
</body>
</html>
