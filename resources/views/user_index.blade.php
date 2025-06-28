<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeGoJim</title>
    <link rel="stylesheet" href="{{ asset('user_index.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
      <script src="Script_user.js"></script>
    <section class="hero">
     <div class="hero-content">
    <br><br>
    @if(Auth::check())
      <h2 class="user-greeting">Halo,  <span class="red-username">  {{ Auth::user()->name }}</span></h2>
    @endif
    <h1>Journey To A <br><span class="red-text">Better</span> You!</h1>
    <h1>WeGoJim</h1>
    <br>
    <p class="capai">Capai Badan Impian mu dengan Program WeGoJim!</p>
</div>


        <div class="hero-image">
            <!-- <div class="red-circle"></div> -->
            <img src="../img/fotoobadan.png" alt="Person lifting weights">
            <div class="circle-container">
                <div class="circle large"></div>
                <div class="circle medium"></div>
                <div class="circle small"></div>
                <div class="circle tiny"></div>
            </div>            
        </div>
    </section>

    <section class="services">
        <h3>Our Services</h3>
        <h1>Menghadirkan Program Latihan Online yang <br> Asik & Efektif untuk Pemula</h1>
        <div class="services-container">
            <div class="service-card red">
                <div class="icon">
                    <img src="../img/barbel.png" alt="Gym Workouts">
                    <span>Gym Workouts</span>
                </div>
                <p>Latihan buat kamu yang memiliki preferensi latihan di Gym! 
                    <br>Menggunakan equipment gym dengan pola latihan yang 
                    <br> disesuaikan</p>
                <a href="#" class="learn-more">Learn More ></a>
            </div>
            <div class="service-card white">
                <div class="icon">
                    <img src="../img/barbel.png" alt="Home Workouts">
                    <span>Home Workouts</span>
                </div>
                <p>Latihan buat kamu yang memiliki preferensi latihan di Rumah!
                    <br>Menggunakan sebuah dumbell, Menargetkan seluruh bagian 
                    <br> badan kamu !</p>
                <a href="#" class="learn-more">Learn More ></a>
            </div>
        </div>
        
    </section>

   <section class="program-section">
    <h2>Explore Programs</h2>
    <p>Paling Banyak Diikuti</p>
    <div class="program-container">

        <!-- Card 1 -->
        <div class="program-card">
            <img src="../img/crossfit.jpg" alt="Program Latihan CrossFit" class="program-image">
            <div class="program-info">
                <p class="workout-type">Workout</p>
                <h3>Program Latihan CrossFit</h3>
                <p class="program-description">Latihan menggunakan Metode Crossfit, cocok buat kamu yang nurunin BB.</p>
                <div class="program-footer">
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="program-card">
            <img src="../img/pullup.jpg" alt="Program Calisthenics" class="program-image">
            <div class="program-info">
                <p class="workout-type">Workout</p>
                <h3>Program Calisthenics</h3>
                <p class="program-description">Latihan Calisthenics, buat kamu yang ga punya peralatan gym.</p>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="program-card">
            <img src="../img/pushdumbel.jpg" alt="Program Home Workout" class="program-image">
            <div class="program-info">
                <p class="workout-type">Workout</p>
                <h3>Program Home Workout</h3>
                <p class="program-description">Punya dumbell aja? Gabung ke home workout dengan dumbell!</p>
            </div>
        </div>

    </div>
        <div class="explore-btn-container">
            <button id="explore-btn">Explore More</button>
          </div>
    </section>
    <section id="testimonials-section">
        <h2 class="section-title">Kata Mereka Tentang WeGoJim</h2>
        <p class="subtitle">Ulasan</p>
        
        <div class="testimonials">
          <div class="testimonial-card">
            <img src="../img/testipics.png" alt="foto" class="profile-img">
            <h3>Nama</h3>
            <p class="occupation">Pengguna Aktif</p>
            <p class="testimonial-text">Enak dan pilihan aktivitas yang menarik. Sangat membantu saya berolahraga.</p>
          </div>
    
          <div class="testimonial-card">
            <img src="../img/testipics.png" alt="foto" class="profile-img">
            <h3>Nama</h3>
            <p class="occupation">Gym Trainer</p>
            <p class="testimonial-text">Latihan yang efektif dan tim yang mendukung. Luar biasa!</p>
          </div>
    
          <div class="testimonial-card">
            <img src="../img/testipics.png" alt="foto" class="profile-img">
            <h3>Nama</h3>
            <p class="occupation">Dokter</p>
            <p class="testimonial-text">Sangat menyarankan WeGoJim sebagai tempat yang luar biasa untuk berolahraga.</p>
          </div>
    
          <div class="testimonial-card">
            <img src="../img/testipics.png" alt="foto" class="profile-img">
            <h3>Nama</h3>
            <p class="occupation">Instruktur</p>
            <p class="testimonial-text">Program yang sempurna, sangat merekomendasikan untuk siapa saja!</p>

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
                        <li><a href="#program-price">Reveiw</a></li>
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
