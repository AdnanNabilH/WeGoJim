<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeGoJim</title>
    <link rel="stylesheet" href="masuk.css">
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
    <a href="{{ url('/contact') }}">Contact us</a>
    <a href="{{ url('/faq') }}">FAQs</a>
    <a href="{{ url('/daftar') }}" class="daftar">Daftar</a>
    <a href="{{ route('login.form') }}" class="login-btn">Login</a>
             </div>
        </nav>
    </header>
    <script src="Script.js"></script>
    <div class="container">
        <div class="logo-form">
            <img src="IMG/logoWGJ.png" alt="Logo">
        </div>
        <div class="inner-box"> 
    <h2>Login</h2>

    {{-- Menampilkan pesan error --}}
    @if(session('error'))
        <div>{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
    @csrf

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required placeholder="Masukkan email anda">

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required placeholder="Masukkan password anda">

    <button type="submit">Login</button>
</form>


</div>
            <div class="login-link">
                Belum punya akun? <a href="{{ route('daftar') }}">Daftar sekarang</a>
            </div>
        </div>
    </div>
    
@if (session('logout'))
    <div id="logout-toast" style="
        position: fixed;
        bottom: 40px;
        right: 40px;
        background-color: red;
        color: white;
        padding: 12px 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        z-index: 9999;
        font-family: 'Poppins', sans-serif;
    ">
        {{ session('logout') }}
    </div>

    <script>
        setTimeout(() => {
            const toast = document.getElementById('logout-toast');
            if (toast) toast.style.display = 'none';
        }, 3000); // 3 detik
    </script>
@endif

</body>
</html>
