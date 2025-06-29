<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Learning</title>
  <link rel="stylesheet" href="{{ asset('user_faq.css') }}">
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