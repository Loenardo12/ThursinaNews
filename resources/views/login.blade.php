<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login - Blue Theme</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }

        .bg-primary {
            background-color: #385ee7;
        }

        .text-primary {
            color: #385ee7;
        }

        .border-primary {
            border-color: #385ee7;
        }

        .focus\:ring-primary:focus {
            --tw-ring-color: #385ee7;
        }

        .btn-primary {
            background-color: #385ee7;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2a4bc6;
            transform: translateY(-2px);
        }

        .wave-shape {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }

        .wave-shape svg {
            position: relative;
            display: block;
            width: calc(142% + 1.3px);
            height: 102px;
        }

        .wave-shape .shape-fill {
            fill: #385ee7;
        }

        .social-icon {
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center">
    <div class="relative w-full max-w-6xl mx-4">
        <a href="/" class="absolute top-4 left-4 text-gray-600 hover:text-gray-800 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            <span class="hidden md:inline">Back</span>
        </a>

        <!-- Decorative elements -->
        <div class="absolute -top-10 -left-10 w-40 h-40 rounded-full bg-blue-100 opacity-20"></div>
        <div class="absolute -bottom-10 -right-10 w-60 h-60 rounded-full bg-blue-100 opacity-20"></div>

        <div class="relative bg-white shadow-xl rounded-2xl overflow-hidden flex flex-col md:flex-row">
            <!-- Left side - Graphic/Info -->
            <div class="w-full md:w-1/2 bg-primary p-10 flex flex-col items-center justify-center text-white relative">
                <div class="wave-shape">
                    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                        preserveAspectRatio="none">
                        <path
                            d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                            class="shape-fill"></path>
                    </svg>
                </div>

                <div class="text-center z-10">
                    <h1 class="text-4xl font-bold mb-4">Welcome Back</h1>
                    <p class="mb-8 text-blue-100">Sign in to access Admin Panel</p>

                    <div
                        class="w-48 h-48 bg-white bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-8">
                        <i class="fas fa-user-shield text-6xl text-white"></i>
                    </div>

                </div>
            </div>

            <!-- Right side - Form -->
            <div class="w-full md:w-1/2 p-10">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Login to Account</h2>
                    <p class="text-gray-500">Enter your details to get signed in</p>
                </div>

                <form id="loginForm" class="space-y-6" method="POST" action="{{ route('login.submit') }}">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" id="email" name="email" required
                                class="pl-10 w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-300"
                                placeholder="your@email.com">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" id="password" name="password" required
                                class="pl-10 w-full border border-gray-300 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-300"
                                placeholder="••••••••">
                            <button type="button" id="togglePassword"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>

                    </div>

                    <button type="submit" class="btn-primary w-full py-3 rounded-lg font-medium shadow-md">
                        Sign In <i class="fas fa-arrow-right ml-2"></i>
                    </button>

                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                </form>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
                    const togglePassword = document.getElementById('togglePassword');
                    const password = document.getElementById('password');

                    togglePassword.addEventListener('click', function() {
                        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                        password.setAttribute('type', type);
                        this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' :
                            '<i class="fas fa-eye-slash"></i>';
                    });

                    //     const loginForm = document.getElementById('loginForm');
                    //     loginForm.addEventListener('submit', function(e) {
                    //         e.preventDefault();

                    //         const email = document.getElementById('email').value;
                    //         const password = document.getElementById('password').value;
                    //         const rememberMe = document.getElementById('remember-me').checked;

                    //         // Here you would typically send this data to your server
                    //         console.log('Login attempt:', {
                    //             email,
                    //             password,
                    //             rememberMe
                    //         });

                    //         // Show success message (in reality you'd check credentials first)
                    //         alert('Login successful! Redirecting...');

                    //         // Redirect to dashboard or home page
                    //         // window.location.href = '/dashboard';
                    //     });
                    // });
    </script>
</body>

</html>
