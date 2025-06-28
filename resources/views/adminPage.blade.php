<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="{{ asset('admin.css') }}">
</head>
<body>
@if(Auth::user()->role !== 'admin')
  <p style="color: red;">Akses ditolak. Anda bukan admin.</p>
  @php abort(403); @endphp
@endif

<div class="sidebar">
  <h2>Admin Dashboard</h2>
  <ul>
    <p class="sidebar-greeting">Halo, {{ Auth::user()->name }}</p>
    <li><a href="#" onclick="showSection('user')">Database :</a></li>
   <li><a href="#" class="sidebar-link" onclick="showSection('user')">Data User</a></li>
    <li><a href="#" class="sidebar-link" onclick="showSection('course')">Data Course</a></li>
    <li>
  <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Yakin ingin logout?');">
    @csrf
    <button type="submit" class="sidebar-link" style="background:none; border:none; color:white; cursor:pointer;">Logout</button>
  </form>
</li>

  </ul>
</div>

@if (session('success'))
  <div class="alert-success" id="success-alert">{{ session('success') }}</div>
@endif

<div class="main">
  <div id="userSection">
    <div class="header">
      <h1>Data User</h1>
      <button onclick="openCreateModal()" class="button button-green">+ Tambah</button>
    </div>
    <table>
      <thead>
        <tr><th>No</th><th>Email</th><th>Name</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>
      </thead>
      <tbody>
        @isset($users)
          @foreach ($users as $index => $user)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
            <td>
              <button onclick="openEditModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}')" class="button button-blue">Edit</button>
              <form action="{{ url('/admin/user/delete/' . $user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin ingin menghapus user ini?')" class="button button-red">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        @endisset
      </tbody>
    </table>
  </div>

  <div id="courseSection" style="display: none;">
  <div class="header">
    <h1>Data Course</h1>
    <button onclick="openCourseModal()" class="button button-green">+ Tambah Course</button>
  </div>

  <table>
    <thead>
      <tr><th>No</th><th>Judul</th><th>Video</th><th>Action</th></tr>
    </thead>
    <tbody>
      @isset($courses)
        @foreach ($courses as $index => $course)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $course->title }}</td>
          <td><iframe width="200" height="120" src="{{ $course->youtube_url }}" frameborder="0" allowfullscreen></iframe></td>
          <td>
            <form action="{{ route('admin.course.delete', $course->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Yakin ingin menghapus Course ini?')" class="button button-red">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      @endisset
    </tbody>
  </table>
</div>


{{-- Modal User --}}
<div id="userModal" class="modal" style="display:none;">
  <div class="modal-content">
    <span onclick="closeModal()" class="close">&times;</span>
    <form id="userForm" method="POST">
      @csrf
      <input type="hidden" name="_method" id="formMethod" value="POST">
      <input type="hidden" name="user_id" id="userId">
      <label>Nama:</label>
      <input type="text" name="name" id="nameInput" required>
      <label>Email:</label>
      <input type="email" name="email" id="emailInput" required>
      <button type="submit" class="button button-green">Simpan</button>
    </form>
  </div>
</div>

{{-- Modal Course --}}
<div id="courseModal" class="modal" style="display:none;">
  <div class="modal-content">
    <span onclick="closeCourseModal()" class="close">&times;</span>
    <form action="{{ route('admin.course.store') }}" method="POST">
      @csrf
      <label>Judul Course:</label>
      <input type="text" name="title" required>
      <label>Link Embed YouTube:</label>
      <input type="text" name="youtube_url" required placeholder="https://www.youtube.com/embed/...">
      <label>Kategori Course:</label>
      <select name="category" required>
        <option value="">-- Pilih Kategori --</option>
        <option value="weight">Weight Training</option>
        <option value="bodyweight">Body Weight Training</option>
      </select>
      <button type="submit" class="button button-green">Simpan</button>
    </form>
  </div>
</div>

<script>
  function showSection(section) {
    document.getElementById('userSection').style.display = section === 'user' ? 'block' : 'none';
    document.getElementById('courseSection').style.display = section === 'course' ? 'block' : 'none';
  }
  function openCreateModal() {
    document.getElementById('userForm').action = "{{ url('/admin/user/store') }}";
    document.getElementById('formMethod').value = 'POST';
    document.getElementById('nameInput').value = '';
    document.getElementById('emailInput').value = '';
    document.getElementById('userModal').style.display = 'flex';
  }
  function openEditModal(id, name, email) {
    document.getElementById('userForm').action = "/admin/user/update/" + id;
    document.getElementById('formMethod').value = 'PUT';
    document.getElementById('nameInput').value = name;
    document.getElementById('emailInput').value = email;
    document.getElementById('userModal').style.display = 'flex';
  }
  function closeModal() {
    document.getElementById('userModal').style.display = 'none';
  }
  function openCourseModal() {
    document.getElementById('courseModal').style.display = 'flex';
  }
  function closeCourseModal() {
    document.getElementById('courseModal').style.display = 'none';
  }
  setTimeout(() => {
    const alert = document.getElementById('success-alert');
    if (alert) alert.style.display = 'none';
  }, 4000);
</script>
</body>
</html>
