<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Learning</title>
  <link rel="stylesheet" href="{{ asset('user_about.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
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
  <script src="Script_user.js"></script>
 <section class="hero">
        <div class="hero-content">
          <h1>About Us</h1>
          <h2>WeGoJim, Workout Plan Di <br> Gym & Rumah Terbaik Untuk <br> Semua Kalangan</h2>
          <p>WeGoJim hadir untuk membantu kamu memulai perjalanan fitness dengan menyediakan berbagai course latihan workout yang ramah bagi pemula, baik untuk latihan di rumah maupun di gym. Dengan panduan dari trainer berpengalaman, WeGoJim menawarkan program latihan yang mudah diikuti, dirancang untuk meningkatkan kebugaranmu secara menyeluruh. Mulai perjalanan fitnessmu bersama kami dan jadilah versi terbaik dari dirimu!</p>
        </div>
              <img src="{{ asset('IMG/heroimg.png') }}" alt="Image 1" class="hero-img">
</section>    
<section class="features-section">
        <div class="featurimg">
           <img src="{{ asset('IMG/cok.png') }}" alt="Mockup 1" class="mockup">
        </div>

        <div class="text-content">
            <h2>Features</h2>
            <h1>We are always working <br> to provide you best of <br> the features in <br> all aspects.</h1>
            <p>Bersama WeGoJim kami berusaha untuk memberikan pelayanan yang sesuai dengan kebutuhan para member, membuat program yang spesifik menjawab kebutuhan mereka</p>
            <a href="#" id="learn-more">Learn More</a>
        </div>
 </section>
 <section class="benefits-section">
    <h2 id="benefit">Our Benefits</h2>
    <h3>Dengan Bergabung di WeGoJim <br> Temukan Kebutuhan di Satu Aplikasi</h3>
    <p>Install Juga Aplikasi WeGoJim versi Mobile!</p>

    <div class="benefits-container">
        <div class="benefit-box1">
            <h4>01</h4>
            <h5>Standardization</h5>
            <p>Program latihan kami dirancang secara konsisten agar setiap pengguna mendapatkan panduan yang sama.</p>
        </div>

        <div class="benefit-box">
            <h4>02</h4>
            <h5>Reduced Costs</h5>
            <p>Nikmati latihan berkualitas tanpa harus membayar biaya yang tinggi.</p>
        </div>

        <div class="benefit-box1">
            <h4>03</h4>
            <h5>More Customization</h5>
            <p>Latihan dapat disesuaikan dengan kebutuhan dan tujuan pribadi Anda.</p>
        </div>

        <div class="benefit-box">
            <h4>04</h4>
            <h5>Affordable Pricing</h5>
            <p>Paket langganan kami menawarkan harga yang bersahabat untuk semua.</p>
        </div>

        <div class="benefit-box1">
            <h4>05</h4>
            <h5>Learner Satisfaction</h5>
            <p>Materi interaktif meningkatkan motivasi serta memberikan hasil yang nyata.</p>
        </div>

        <div class="benefit-box">
            <h4>06</h4>
            <h5>Multimedia Materials</h5>
            <p>Latihan lengkap, termasuk video, animasi, dan audio, membuat proses belajar lebih efektif.</p>
        </div>
    </div>
</section>

<footer>
    <div class="footer-container">
        <div class="footer-logo-wrapper">
            <div class="footer-logo">
                <img src="../img/logoWGJ.png" alt="WeGoJim Logo" />
                <span>WeGoJim</span>
            </div>
            <p class="footer-description">Top learning experiences that create more <br> talent in the world.</p>
        </div>

        <div class="footer-columns">
            <div class="footer-column">
                <h4>Product</h4>
                <ul>
                    <li><a href="index.html#program-price">Reveiw</a></li>
                    <li><a href="about.html#cta-button">Features</a></li>
                    <li><a href="about.html#learn-more">Benefits</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>Company</h4>
                <ul>
                    <li><a href="about.html">About us</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>Social</h4>
                <ul>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">Tiktok</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© 2025 WeGoJim. All rights reserved.</p>
    </div>
</footer>    
</body>
</html>
