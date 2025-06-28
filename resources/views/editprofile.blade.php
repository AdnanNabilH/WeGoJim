<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Edit Profile</title>
  <link rel="stylesheet" href="editprofile.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
  />
</head>
<body>
<header>
  <nav class="navbar">
    <div class="logo">
      <img src="../img/logoWGJ.png" alt="WeGoJim Logo" />
      <span>WeGoJim</span>
    </div>
    <div class="nav-links">
      <input type="text" placeholder="Search..." />
      <a href="{{ route('user.index') }}">Home</a>
      <a href="{{ route('user.about') }}">About Us</a>
      <a href="{{ route('user.courses') }}">Courses</a>
      <a href="{{ route('user.contact') }}">Contact Us</a>
      <a href="{{ route('user.faqs') }}">FAQs</a>
      <div class="user-menu">
        <div class="user-icon">
          <img src="../img/usericon.png" alt="User Icon" class="profile-pic" />
        </div>
        <div class="dropdown">
          <ul>
            <li><a href="{{ route('user.mylearning') }}">My Learning</a></li>
            <li><a href="{{ route('user.wishlist') }}">Wishlist</a></li>
            <li><a href="{{ route('user.editprofile') }}">Edit Profile</a></li>
           <li>
  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
</li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>

<div class="profile-container">
  <aside class="profile-sidebar">
    <div class="avatar-box">
      <img
        src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : 'https://i.pravatar.cc/150?img=3' }}"
        alt="User Avatar"
        class="avatar"
      />
      <p class="profile-username">
        <i class="fas fa-user"></i>
        <strong>{{ Auth::user()->name }}</strong>
      </p>

      <!-- Input file tersembunyi -->
      <form
        id="upload-photo-form"
        action="{{ route('profile.photo.upload') }}"
        method="POST"
        enctype="multipart/form-data"
        style="display: none"
      >
        @csrf
        <input
          type="file"
          name="profile_photo"
          id="profile_photo_input"
          accept="image/*"
        />
      </form>

      <button class="upload-btn" id="change-photo-btn">Change Photo</button>

      <p class="upload-hint">
        Upload a new profile <br>
        <strong>Maximum upload size is 1 MB</strong>
      </p>

      <p class="member-since">
        Member Since:
        <strong
          >{{ Auth::user()->joined_at
            ? Auth::user()->joined_at->format('d F Y')
            : '-' }}</strong
        >
      </p>
    </div>
  </aside>

  <main class="profile-main">
    <div class="tabs">
      <button class="tab active">User Info</button>
    </div>

    <!-- ALERT NOTIFIKASI -->
    @if (session('success'))
    <div style="color: lightgreen; margin-bottom: 15px;">
      {{ session('success') }}
    </div>
    @endif

    <!-- FORM UPDATE PROFILE -->
    <form class="profile-form" method="POST" action="{{ route('user.updateprofile') }}">
      @csrf
      @method('PUT')

      <!-- ROW: USERNAME -->
      <div class="form-row">
        <div class="form-group full-width">
          <label for="name">Username</label>
          <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" />
        </div>
      </div>

      <!-- ROW: PASSWORD & CONFIRM PASSWORD -->
      <div class="form-row two-columns">
        <div class="form-group">
          <label for="password">Password</label>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="New password (optional)"
          />
        </div>
        <div class="form-group">
          <label for="password_confirmation">Confirm Password</label>
          <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            placeholder="Confirm new password"
          />
        </div>
      </div>

      <!-- ROW: EMAIL & CONFIRM EMAIL -->
      <div class="form-row two-columns">
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" />
        </div>
        <div class="form-group">
          <label for="email_confirm">Confirm Email Address</label>
          <input
            type="email"
            id="email_confirm"
            value="{{ Auth::user()->email }}"
            disabled
          />
        </div>
      </div>

      <button class="submit-btn" type="submit">Update Info</button>
    </form>
  </main>
</div>

<script>
document.getElementById('change-photo-btn').addEventListener('click', function() {
    document.getElementById('profile_photo_input').click();
});

document.getElementById('profile_photo_input').addEventListener('change', function() {
    if(this.files.length > 0) {
        document.getElementById('upload-photo-form').submit();
    }
});
</script>

<script src="Script_user.js"></script>
</body>
</html>
