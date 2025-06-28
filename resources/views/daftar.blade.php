<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeGoJim</title>
    <link rel="stylesheet" href="daftar.css">
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
    <a href="{{ url('/') }}" class="daftar">Daftar</a>
    <a href="{{ url('/masuk') }}" class="login-btn">Login</a>
             </div>
        </nav>
    </header>
    <script src="Script.js"></script>
    <div class="container">
        <div class="logo-form">
            <img src="IMG/logoWGJ.png" alt="Logo">
        </div>
        <div class="inner-box"> 
    <h2>Daftar</h2>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('daftar.submit') }}">
    @csrf

    <label for="name">Username</label>
    <input type="text" id="name" name="name" required placeholder="Masukkan username anda">

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required placeholder="Masukkan email anda">

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required placeholder="Masukkan password anda">

    <label for="password_confirmation">Konfirmasi Password</label>
    <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Masukkan ulang password">

    <button type="submit">Daftar</button>
</form>
    
    <div class="login-link">
        Sudah punya akun? <a href="{{ url('/masuk') }}">Login</a>
    </div>
</div>
        </div>
    </div>
    
          
</body>
</html>
