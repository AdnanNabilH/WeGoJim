<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeGoJim</title>
    <link rel="stylesheet" href="contact.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
   <header>
        <nav class="navbar">
            <div class="logo">
                <img src="img/logoWGJ.png" alt="WeGoJim Logo" />
                <span>WeGoJim</span>
            </div>
            <div class="nav-links">
    <input type="text" placeholder="Search...">
     <a href="{{ url('') }}">Home</a>
    <a href="{{ url('/about') }}">About us</a>
    <a href="{{ url('/course') }}">Courses</a>
    <a href="{{ url('/') }}">Contact us</a>
    <a href="{{ url('/faq') }}">FAQs</a>
    <a href="{{ url('/daftar') }}" class="daftar">Daftar</a>
    <a href="{{ url('/masuk') }}" class="login-btn">Login</a>
             </div>
        </nav>
    </header>
    <script src="Script.js"></script>
    <section class="hero-section">
        <div class="container">
            <h1>CONTACT US</h1>
            <div class="contact-form">
                <div class="form-left">
                    <h3>Berikan Pesan</h3>
                    <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>

                    <label for="message">Your Message</label>
                    <textarea id="message" name="message" rows="4" required></textarea>

                    <button type="submit" class="submit-btn">Kirim</button>

                   @if(session('success'))
                    <p class="success-message">{{ session('success') }}</p>
                @endif

                </form>
                </div>
                <div class="form-right">
                    <p>
                        Kampus C Universitas Airlangga<br>
                        Jl. Mulyorejo, Surabaya, Jawa Timur 60115<br>
                        Telepon: (031) 5915551<br>
                        Email: humas@unair.ac.id
                      </p>                      
                    <div class="social-media">
                        <a href="#"><img src="icon-facebook.svg" alt="Facebook"></a>
                        <a href="#"><img src="icon-instagram.svg" alt="Instagram"></a>
                        <a href="#"><img src="icon-twitter.svg" alt="Twitter"></a>
                    </div>
                    <div class="map">
                        <iframe 
  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.272221095872!2d112.78000567502984!3d-7.269498571901229!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa21615added%3A0x1dfef59c76b5fee9!2sUniversitas%20Airlangga!5e0!3m2!1sid!2sid!4v1714996030133!5m2!1sid!2sid" 
  width="90%" 
  height="250" 
  style="border:0;" 
  allowfullscreen="" 
  loading="lazy" 
  referrerpolicy="no-referrer-when-downgrade">
</iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>