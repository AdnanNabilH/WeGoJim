<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>My Learning</title>
  <link rel="stylesheet" href="{{ asset('user_course.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <header>
    <nav class="navbar">
      <div class="logo">
        <img src="{{ asset('IMG/logoWGJ.png') }}" alt="WeGoJim Logo" />
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
           <img src="{{ asset('IMG/usericon.png') }}" alt="User Icon" class="profile-pic" />
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

  <section class="my-learning">
    <div class="learning-header">
      <h1>Course List</h1>
      <ul class="learning-nav">
        <li>
          <a href="{{ route('user.courses', ['category' => 'weight']) }}" class="{{ $category === 'weight' ? 'active' : '' }}">
            Weight Training
          </a>
        </li>
        <li>
          <a href="{{ route('user.courses', ['category' => 'bodyweight']) }}" class="{{ $category === 'bodyweight' ? 'active' : '' }}">
            Body Weight Training
          </a>
        </li>
      </ul>
    </div>

    <div class="learning-content">
      <div class="banner">
       <img src="{{ asset('IMG/banners.png') }}" alt="Course Banner">
      </div>

      <div class="filters">
        <select><option>Recently Accessed</option></select>
        <select><option>Progress</option></select>
        <button class="reset-btn">Reset</button>
        <input type="text" placeholder="Search my courses">
      </div>

      <div class="courses">
        @forelse ($courses as $course)
        <div class="course-card">
          <div class="image-container">
            @if ($course->youtube_url)
              <iframe class="course-video" src="{{ $course->youtube_url }}" frameborder="0" allowfullscreen></iframe>
            @else
              <img src="../img/placeholder.jpg" alt="Course Image">
            @endif

            <div class="menu-container">
              <span class="menu-toggle">⋮</span>
              <div class="dropdown-menu">
                <button class="delete-course">Delete Course</button>
              </div>
            </div>
          </div>

          <div class="course-footer">
            <div>
              <h4>{{ $course->title }}</h4>
              <p>{{ $course->instructor ?? 'WeGoJim' }}</p>
            </div>

            @php $isSaved = in_array($course->id, $savedCourseIds); @endphp
            <form action="{{ $isSaved ? route('user.unsaveCourse', $course->id) : route('user.saveCourse', $course->id) }}" method="POST">
              @csrf
              @if($isSaved) @method('DELETE') @endif
              <button type="submit" class="save-btn {{ $isSaved ? 'saved' : '' }}" title="{{ $isSaved ? 'Hapus dari My Learning' : 'Simpan ke My Learning' }}">
                <i class="{{ $isSaved ? 'fas' : 'far' }} fa-heart"></i>
              </button>
            </form>
          </div>
        </div>
        @empty
          <p style="text-align: center; padding: 20px;">Belum ada course yang tersedia.</p>
        @endforelse
      </div>
    </div>
  </section>
</body>
</html>
