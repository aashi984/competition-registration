@extends('layouts.app')
@section('content')

<style>
html, body {
    margin: 0;
    padding: 0;
    min-height: 100vh;
    width: 100%;
    font-family: 'Poppins', sans-serif;
    background-color: #000814;
}

.sky {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: radial-gradient(ellipse at bottom, #001f3d 0%, #000814 100%);
    z-index: -1;
    overflow: hidden;
}

.star, .glow-star, .star-shape, .asteroid {
    position: absolute;
    border-radius: 50%;
    background: white;
}

.star {
    width: 2px;
    height: 2px;
    animation: twinkle 2s infinite ease-in-out alternate;
}

.glow-star {
    width: 3px;
    height: 3px;
    box-shadow: 0 0 6px 2px white;
    animation: twinkle 3s infinite ease-in-out alternate;
}

.star-shape {
    width: 8px;
    height: 8px;
    background: white;
    clip-path: polygon(
        50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%,
        50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%
    );
    animation: twinkle 4s infinite ease-in-out alternate;
}

.asteroid {
    width: 4px;
    height: 4px;
    box-shadow: 0 0 10px white;
    animation: shoot 6s linear infinite;
}

@keyframes twinkle {
    from { opacity: 0.3; }
    to { opacity: 1; }
}

@keyframes shoot {
    0% {
        transform: translate(-10%, -10%) scale(1);
        opacity: 1;
    }
    100% {
        transform: translate(200%, 200%) scale(0.5);
        opacity: 0;
    }
}

.nav-top-right {
    position: fixed;
    top: 20px;
    right: 30px;
    z-index: 9999;
    display: flex;
    gap: 20px;
}

.nav-top-right a {
    color: #fff;
    background-color: rgba(0, 0, 0, 0.4);
    padding: 6px 12px;
    border-radius: 6px;
    font-weight: 600;
    text-decoration: none;
    font-size: 16px;
    transition: all 0.3s;
}

.nav-top-right a:hover {
    background-color: rgba(0, 224, 255, 0.2);
    color: #00e0ff;
}

.form-wrapper {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    padding-top: 10px;
    padding-left: 20px;
    padding-right: 20px;
}

.card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.15);
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 224, 255, 0.15);
    width: 100%;
    max-width: 480px;
    color: #fff;
}

.card-header {
    font-size: 28px;
    font-weight: 700;
    text-align: center;
    margin-bottom: 30px;
    background: linear-gradient(45deg, #00e0ff, #8a2be2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.input-group {
    position: relative;
    margin-top: 28px;
}

.input-group input {
    background: transparent;
    color: white;
    width: 100%;
    padding: 20px 14px 10px;
    font-size: 16px;
    border: none;
    border-bottom: 2px solid rgba(255, 255, 255, 0.3);
    outline: none;
    transition: all 0.3s ease;
}

.input-group input:focus {
    border-color: #00e0ff;
    box-shadow: 0 2px 6px rgba(0, 224, 255, 0.3);
}

.input-group label {
    position: absolute;
    top: 50%;
    left: 14px;
    transform: translateY(-50%);
    font-size: 16px;
    color: rgba(255, 255, 255, 0.6);
    background-color: transparent;
    transition: all 0.2s ease;
    pointer-events: none;
}

.input-group input:focus + label,
.input-group input:not(:placeholder-shown) + label {
    top: -6px;
    font-size: 12px;
    color: #00e0ff;
    background-color: #000814;
    padding: 0 4px;
}

.btn-primary {
    background: linear-gradient(135deg, #8a2be2, #00e0ff);
    border: none;
    padding: 14px;
    width: 100%;
    border-radius: 10px;
    color: white;
    font-size: 16px;
    font-weight: bold;
    margin-top: 30px;
    transition: all 0.3s ease;
    box-shadow: 0 5px 20px rgba(0, 224, 255, 0.4);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0, 224, 255, 0.6);
}

input:-webkit-autofill {
    -webkit-text-fill-color: white !important;
    transition: background-color 9999s ease-in-out 0s;
    box-shadow: 0 0 0px 1000px transparent inset !important;
}
</style>  

<div class="nav-top-right">
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ url('/signup') }}">Register</a>
</div>

<div class="sky" id="sky"></div>

<div class="form-wrapper">
    <div class="card">
        <div class="card-header">{{ __('Unleash Your Potential') }}</div>
        <div class="card-body">
            <form action="{{ route('signup.submit') }}" method="POST">
                @csrf
                <!-- Name -->
                <div class="input-group">
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required placeholder=" " class="@error('name') is-invalid @enderror"/>
                    <label for="name">Full Name</label>
                </div>
                <!-- Email -->
                <div class="input-group">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder=" " class="@error('email') is-invalid @enderror"/>
                    <label for="email">Email Address</label>
                </div>
                <!-- Password -->
                <div class="input-group">
                    <input id="password" type="password" name="password" required placeholder=" " class="@error('password') is-invalid @enderror"/>
                    <label for="password">Password</label>
                </div>
                <!-- Confirm Password -->
                <div class="input-group">
                    <input id="password_confirmation" type="password" name="password_confirmation" required placeholder=" "/>
                    <label for="password_confirmation">Confirm Password</label>
                </div>
                <button type="submit" class="btn-primary">Sign up</button>
            </form>
        </div>
    </div>
</div>

<script>
    const sky = document.getElementById('sky');
    const numStars = 100, numGlowStars = 20, numAsteroids = 10, numStarShapes = 20;

    function createStar(className) {
        const star = document.createElement('div');
        star.className = className;
        star.style.top = Math.random() * 100 + '%';
        star.style.left = Math.random() * 100 + '%';
        sky.appendChild(star);
    }

    for (let i = 0; i < numStars; i++) createStar('star');
    for (let i = 0; i < numGlowStars; i++) createStar('glow-star');
    for (let i = 0; i < numAsteroids; i++) {
        const asteroid = document.createElement('div');
        asteroid.className = 'asteroid';
        asteroid.style.top = Math.random() * 80 + '%';
        asteroid.style.left = Math.random() * 80 + '%';
        asteroid.style.animationDelay = Math.random() * 10 + 's';
        sky.appendChild(asteroid);
    }
    for (let i = 0; i < numStarShapes; i++) createStar('star-shape');
</script>

@endsection
