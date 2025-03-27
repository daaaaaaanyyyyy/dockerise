<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secret Santa Kabyle</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        .floating-text {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <!-- Stars Canvas -->
    <canvas id="starsCanvas" class="fixed top-0 left-0 w-full h-full -z-10"></canvas>

    <!-- Main Content -->
    <div class="relative z-10 text-center space-y-8">
        <!-- Animated Text -->
        <h1 class="floating-text text-6xl lg:text-8xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-8">
            🎄 Secret Santa 🎅
        </h1>

        <!-- Conditional Button -->
        <div class="flex justify-center">
            @auth
                <a href="{{ url('/dashboard') }}" 
                   class="px-8 py-4 bg-[#F53003] hover:bg-[#FF4433] text-white rounded-lg text-2xl font-bold transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Aller
                </a>
            @else
                <a href="{{ route('login') }}" 
                   class="px-8 py-4 bg-[#F53003] hover:bg-[#FF4433] text-white rounded-lg text-2xl font-bold transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Identifier
                </a>
            @endauth
        </div>
    </div>

    <!-- Stars Animation Script -->
    <script>
        // Existing stars animation code remains the same
        const canvas = document.getElementById('starsCanvas');
        const ctx = canvas.getContext('2d');
        
        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        resizeCanvas();
        
        class Star {
            constructor() {
                this.reset();
            }
            
            reset() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.radius = Math.random() * 1.5;
                this.speed = Math.random() * 0.5 + 0.2;
                this.alpha = Math.random() * 0.5 + 0.5;
            }
            
            update() {
                this.y += this.speed;
                if(this.y > canvas.height + 2) this.reset();
            }
            
            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(255, 255, 255, ${this.alpha})`;
                ctx.fill();
            }
        }

        const stars = Array(100).fill().map(() => new Star());

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            stars.forEach(star => {
                star.update();
                star.draw();
            });
            requestAnimationFrame(animate);
        }

        animate();
        window.addEventListener('resize', () => {
            resizeCanvas();
            stars.forEach(star => star.reset());
        });
    </script>
</body>
</html>