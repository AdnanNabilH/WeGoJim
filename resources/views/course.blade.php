<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>WeGoJim</title>
  <link rel="stylesheet" href="course.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.8/odometer.min.js"></script>
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
    <a href="#">FAQs</a>
    <a href="{{ url('/daftar') }}" class="daftar">Daftar</a>
    <a href="{{ url('/masuk') }}" class="login-btn">Login</a>
             </div>
        </nav>
    </header>
 <section class="hero">
  <div class="hero-content">
    <h1>COURSE</h1>
    <h2>WeGoJim, Workout Plan Di <br />Gym & Rumah Terbaik Untuk <br />Semua Kalangan</h2>
    <p>
      WeGoJim hadir untuk membantu kamu memulai perjalanan fitness dengan menyediakan berbagai course latihan workout yang ramah bagi pemula, baik untuk latihan di rumah maupun di gym. Dengan panduan dari trainer berpengalaman, WeGoJim menawarkan program latihan yang mudah diikuti, dirancang untuk meningkatkan kebugaranmu secara menyeluruh. Mulai perjalanan fitnessmu bersama kami dan jadilah versi terbaik dari dirimu!
    </p>
    <a href="{{ url('/daftar') }}" id="cta-button">Enroll Course</a>
  </div>

  <div class="hero-side">
    <img src="img/coursee.jpg" alt="Workout Course" class="hero-img" />

    <div class="wrapper">
      <div class="container">
        <i class="fas fa-smile-beam"></i>
        <span class="num" data-val="900">000</span>
        <span class="text">Happy Customers</span>
      </div>
      <div class="container">
        <i class="fas fa-list"></i>
        <span class="num" data-val="2000">000</span>
        <span class="text">Course Listed</span>
      </div>
      <div class="container">
        <i class="fas fa-star"></i>
        <span class="num" data-val="1350">000</span>
        <span class="text">Five Stars</span>
      </div>
    </div>
  </div>
</section>

  <script>
    const valueDisplays = document.querySelectorAll(".num");
    const interval = 4000;

    valueDisplays.forEach((el) => {
      let start = 0;
      const end = parseInt(el.getAttribute("data-val"));
      const duration = Math.floor(interval / end);
      const counter = setInterval(() => {
        start += 1;
        el.textContent = start;
        if (start === end) clearInterval(counter);
      }, duration);
    });
  </script>
  <script src="Script.js"></script>
</body>
</html>
