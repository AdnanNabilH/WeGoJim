<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WeGoJim</title>
  <link rel="stylesheet" href="mylearning.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="user_index.css">
</head>
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
  <script src="Script_user.js"></script>
<body>
        <section class="my-learning">
            <div class="learning-header">
              <h1>WishList</h1>
              <ul class="learning-nav">
                <li><a href="{{ route('user.mylearning') }}">All courses</a></li>
                <li><a href="{{ route('user.wishlist') }}"class="active">Wishlist</a></li>
              </ul>
            </div>
          
            <div class="learning-content">
              <div class="streak-card">
                <div>
                  <h3>Start a new streak</h3>
                  <p>We know you have it in you. Go after your goals!</p>
                </div>
                <div class="streak-info">
                  <p class="streak-number">0 weeks</p>
                  <p class="streak-label">Current streak</p>
                  <ul class="streak-stats">
                    <li><span class="dot orange"></span> 0/30 course min</li>
                    <li><span class="dot green"></span> 2/1 visit</li>
                    <li>Apr 6 - 20</li>
                  </ul>
                </div>
              </div>
          
              <div class="filters">
                <select>
                    <option>Recently Accessed</option>
                </select>
                <select>
                    <option>Progress</option>
                </select>
                <button class="reset-btn">Reset</button>
                <input type="text" placeholder="Search my courses">
            </div>
          </section>
          </body>
</html>