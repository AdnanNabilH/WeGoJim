<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeGoJim</title>
    <link rel="stylesheet" href="faq.css">
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
    <a href="{{ url('contact') }}">Contact us</a>
    <a href="{{ url('/') }}">FAQs</a>
    <a href="{{ url('/daftar') }}" class="daftar">Daftar</a>
    <a href="{{ url('/masuk') }}" class="login-btn">Login</a>
             </div>
        </nav>
    </header>
    <script src="Script.js"></script>
    <section class="faq-section">
    <h1>Frequently Asked Questions</h1>

    <div class="faq">
      <div class="faq-question">
        <span>Apa itu WeGoJim</span>
        <button class="toggle-btn">+</button>
      </div>
      <div class="faq-answer">
        WeGoJim merupakan platform yang menyediakan course olahraga beban yang ramah pemula 
      </div>
    </div>

    <div class="faq">
      <div class="faq-question">
        <span>Adakah Kelas Gratis di WeGoJim?</span>
        <button class="toggle-btn">+</button>
      </div>
      <div class="faq-answer">
        Tentu, platform ini dirancang untuk kamu agar tidak takut dengan biaya dan segera memulai perjalanan olahragamu !
      </div>
    </div>

    <div class="faq">
      <div class="faq-question">
        <span>Untuk Siapa Platform WeGoJim?</span>
        <button class="toggle-btn">+</button>
      </div>
      <div class="faq-answer">
        Semua kalangan dan level yang ingin mendalami olahraga kususnya olahraga angkat beban
      </div>
    </div>

    <div class="faq">
      <div class="faq-question">
        <span>Apakah Latihan yang Tersedia Hanya Latihan Gym?</span>
        <button class="toggle-btn">+</button>
      </div>
      <div class="faq-answer">
        Tidak, disini kami juga menyediakan latihan home-workout (bodyweight) yang bisa dilakukan dari rumah !
      </div>
    </div>

  </section>

  <script>
    document.querySelectorAll('.faq').forEach(faq => {
  const btn = faq.querySelector('.toggle-btn');
  const answer = faq.querySelector('.faq-answer');

  btn.addEventListener('click', () => {
    const isOpen = faq.classList.toggle('open');
    answer.style.display = isOpen ? 'block' : 'none';
    btn.textContent = isOpen ? '−' : '+';
  });
});

  </script>
</body>
</html>