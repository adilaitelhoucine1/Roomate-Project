<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - RoomMate YouCode</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <style>
        #particles-js, #particles-js-secondary, #particles-js-tertiary, #particles-js-quaternary {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
            pointer-events: none;
        }
        .min-h-screen {
            position: relative;
            z-index: 1;
        }
        .bg-white {
            background-color: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(5px);
        }
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(229, 231, 235, 0.3);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
        }
        .login-container:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .form-input {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(229, 231, 235, 0.5);
            transition: all 0.3s ease;
        }
        .form-input:focus {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
        }
        .submit-button {
            background: linear-gradient(to right, #2563eb, #3b82f6);
            transition: all 0.3s ease;
        }
        .submit-button:hover {
            background: linear-gradient(to right, #1d4ed8, #2563eb);
            transform: translateY(-1px);
        }
        .auth-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(229, 231, 235, 0.3);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            padding: 2rem;
            border-radius: 1rem;
        }
        .auth-input {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(229, 231, 235, 0.8);
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            width: 100%;
            transition: all 0.2s ease;
        }
        .auth-input:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        .auth-button {
            background: linear-gradient(to right, #2563eb, #3b82f6);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            width: 100%;
            transition: all 0.2s ease;
        }
        .auth-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gray-50">
    <div id="particles-js"></div>
    <div id="particles-js-secondary"></div>
    <div id="particles-js-tertiary"></div>
    <div id="particles-js-quaternary"></div>

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="auth-container w-full max-w-md">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Room<span class="text-blue-600">Mate</span></h1>
                <h2 class="mt-4 text-2xl font-bold text-gray-900">
                    Connexion
                </h2>
                <p class="mt-2 text-gray-600">
                    Accédez à votre espace personnel
                </p>
            </div>
            
            <form action="/ValidateLogin" method="POST" class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="email">
                        Email YouCode
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email"
                        class="auth-input"
                        placeholder="prenom.nom@student.youcode.ma"
                        required
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="password">
                        Mot de passe
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password"
                        class="auth-input"
                        required
                    >
                </div>

                <button type="submit" class="auth-button">
                    Se connecter
                </button>
            </form>

            <div class="mt-8 text-center">
                <p class="text-sm text-gray-600">
                    Pas encore de compte? 
                    <a href="/register" class="font-medium text-blue-600 hover:text-blue-500">
                        Créer un compte
                    </a>
                </p>
            </div>
        </div>
    </div>

    <script>
        function createParticleConfig(color, number, size, speed, opacity) {
            return {
                "particles": {
                    "number": {
                        "value": number,
                        "density": {
                            "enable": true,
                            "value_area": 1000
                        }
                    },
                    "color": {
                        "value": color
                    },
                    "shape": {
                        "type": "circle"
                    },
                    "opacity": {
                        "value": opacity,
                        "random": false,
                        "anim": {
                            "enable": true,
                            "speed": speed * 0.8,
                            "opacity_min": opacity * 0.4,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": size,
                        "random": true,
                        "anim": {
                            "enable": true,
                            "speed": speed,
                            "size_min": size * 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": true,
                        "distance": 150,
                        "color": color,
                        "opacity": opacity * 0.8,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": speed,
                        "direction": "none",
                        "random": true,
                        "straight": false,
                        "out_mode": "bounce",
                        "bounce": false,
                        "attract": {
                            "enable": true,
                            "rotateX": 600,
                            "rotateY": 1200
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "window",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "grab"
                        },
                        "onclick": {
                            "enable": true,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 200,
                            "line_linked": {
                                "opacity": opacity * 0.8
                            }
                        },
                        "push": {
                            "particles_nb": 3
                        }
                    }
                },
                "retina_detect": true
            };
        }

        // Initialize all particle systems
        particlesJS('particles-js', createParticleConfig('#2563eb', 150, 3, 1, 0.5));  // Blue
        particlesJS('particles-js-secondary', createParticleConfig('#9681EB', 100, 2, 0.8, 0.3));  // Lavender
        particlesJS('particles-js-tertiary', createParticleConfig('#14b8a6', 120, 2.5, 0.9, 0.4));  // Teal
        particlesJS('particles-js-quaternary', createParticleConfig('#f472b6', 80, 2, 0.7, 0.2));  // Soft Pink

        // Update mouse movement handler
        document.addEventListener('mousemove', function(e) {
            if (window.pJSDom) {
                window.pJSDom.forEach(function(system) {
                    if (system && system.pJS) {
                        system.pJS.interactivity.mouse.pos_x = e.clientX;
                        system.pJS.interactivity.mouse.pos_y = e.clientY;
                    }
                });
            }
        });
    </script>
</body>
</html>