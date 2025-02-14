<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RoomMate YouCode</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <style>
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
            background-color: #f8fafc;
            pointer-events: none;
        }
        .content-wrapper {
            position: relative;
            z-index: 1;
        }
        .bg-white {
            background-color: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(5px);
        }
        .bg-gradient-to-r {
            background: linear-gradient(to right, rgba(37, 99, 235, 0.9), rgba(30, 64, 175, 0.9)) !important;
        }
        .bg-gradient-to-b {
            background: transparent !important;
        }
        .bg-gray-900 {
            background-color: rgba(17, 24, 39, 0.95) !important;
            backdrop-filter: blur(5px);
        }
        .bg-blue-600 {
            background-color: rgba(37, 99, 235, 0.9) !important;
        }
        [class*="from-gray-50"] {
            background: transparent !important;
        }
        [class*="from-blue-50"] {
            background: rgba(255, 255, 255, 0.7) !important;
        }
        [class*="from-emerald-50"] {
            background: rgba(255, 255, 255, 0.7) !important;
        }
        .bg-overlay {
            display: none;
        }
        .hero-section {
            height: 660px;
            padding: 2rem 0;
        }
        .hero-content {
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(5px);
            padding: 3rem;
            border-radius: 1rem;
            border: 1px solid rgba(229, 231, 235, 0.5);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-transparent">
    <div id="particles-js"></div>
    
    <div class="content-wrapper">
        <header class="bg-white shadow-sm border-b border-gray-200">
            <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-blue-600">Room<span class="text-gray-800">Mate</span></h1>
                <div class="space-x-4">
                    <a href="/login" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Connexion</a>
                    <a href="/register" class="bg-blue-600 text-white px-6 py-2.5 rounded-xl hover:bg-blue-700 font-medium transition-all duration-300 shadow-sm hover:shadow">
                        Inscription
                    </a>
                </div>
            </nav>
        </header>

        <main>
            <!-- Hero Section with Particles -->
            <div class="relative overflow-hidden hero-section">
                <div class="container mx-auto px-6 h-full flex items-center">
                    <div class="text-center w-full hero-content">
                        <h2 class="text-5xl font-bold text-gray-900 mb-6">
                            Trouvez votre <span class="text-blue-600">colocataire idéal</span> à YouCode
                        </h2>
                        <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-8">
                            La plateforme dédiée aux étudiants de YouCode pour une colocation réussie et une expérience enrichissante
                        </p>
                        <div class="flex justify-center gap-4">
                            <a href="/register" class="px-8 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all duration-300 shadow-sm hover:shadow">
                                Commencer maintenant
                            </a>
                            <a href="#features" class="px-8 py-3 bg-white text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-300 border border-gray-200">
                                En savoir plus
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div class="container mx-auto px-6 py-16">
                <div class="text-center mb-16">
                    <h3 class="text-3xl font-bold text-gray-900">Comment ça marche ?</h3>
                    <p class="text-gray-600 mt-2">Simple, rapide et efficace</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto mb-16">
                    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-user-plus text-xl text-blue-600"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-2">1. Créez votre profil</h4>
                        <p class="text-gray-600">Inscrivez-vous et complétez votre profil avec vos préférences de colocation</p>
                    </div>

                    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                        <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-search text-xl text-emerald-600"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-2">2. Trouvez des matchs</h4>
                        <p class="text-gray-600">Parcourez les annonces et trouvez les colocataires qui vous correspondent</p>
                    </div>

                    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-comments text-xl text-purple-600"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-2">3. Connectez-vous</h4>
                        <p class="text-gray-600">Échangez avec vos futurs colocataires et organisez des rencontres</p>
                    </div>
                </div>

                <!-- Statistics Section -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-800 py-20 my-16">
                    <div class="container mx-auto px-6">
                        <div class="grid md:grid-cols-3 gap-12 text-white ">
                            <div class="text-center">
                                <div class="text-4xl font-bold mb-2">500+</div>
                                <div class="text-blue-100">Étudiants</div>
                            </div>
                            <div class="text-center">
                                <div class="text-4xl font-bold mb-2">300+</div>
                                <div class="text-blue-100">Colocations Réussies</div>
                            </div>
                            <div class="text-center">
                                <div class="text-4xl font-bold mb-2">98%</div>
                                <div class="text-blue-100">Satisfaction</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Why Choose Us -->
                <div class="container mx-auto px-6 py-16">
                    <div class="text-center mb-16">
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">Pourquoi choisir RoomMate ?</h3>
                        <p class="text-gray-600 max-w-2xl mx-auto">Une plateforme conçue spécialement pour les étudiants de YouCode, 
                        avec des fonctionnalités adaptées à vos besoins</p>
                    </div>

                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="bg-white p-8 rounded-xl border border-gray-200 shadow-sm hover:shadow-lg transition-all">
                            <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                                <i class="fas fa-shield-alt text-2xl text-blue-600"></i>
                            </div>
                            <h4 class="text-xl font-bold text-gray-900 mb-4">Sécurisé</h4>
                            <p class="text-gray-600">Vérification des profils et système de notation pour une expérience sûre</p>
                        </div>

                        <div class="bg-white p-8 rounded-xl border border-gray-200 shadow-sm hover:shadow-lg transition-all">
                            <div class="w-14 h-14 bg-emerald-100 rounded-xl flex items-center justify-center mb-6">
                                <i class="fas fa-bolt text-2xl text-emerald-600"></i>
                            </div>
                            <h4 class="text-xl font-bold text-gray-900 mb-4">Rapide</h4>
                            <p class="text-gray-600">Trouvez votre colocation idéale en quelques clics</p>
                        </div>

                        <div class="bg-white p-8 rounded-xl border border-gray-200 shadow-sm hover:shadow-lg transition-all">
                            <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                                <i class="fas fa-handshake text-2xl text-purple-600"></i>
                            </div>
                            <h4 class="text-xl font-bold text-gray-900 mb-4">Communauté</h4>
                            <p class="text-gray-600">Rejoignez une communauté d'étudiants partageant les mêmes valeurs</p>
                        </div>
                    </div>
                </div>

                <!-- Cards Section -->
                <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                    <!-- Card 1 -->
                    <div class="bg-gradient-to-r from-blue-50 to-white p-8 rounded-xl border border-blue-200 shadow-sm hover:shadow-lg transition-all duration-300">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="p-4 bg-blue-100 rounded-xl">
                                <i class="fas fa-home text-2xl text-blue-600"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800">J'ai un Logement</h3>
                        </div>
                        <p class="text-gray-600 mb-6 min-h-[60px]">
                            Publiez votre annonce et trouvez les colocataires qui vous correspondent
                        </p>
                        <a href="/register" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors group">
                            <span class="font-medium">Publier une annonce</span>
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-gradient-to-r from-emerald-50 to-white p-8 rounded-xl border border-emerald-200 shadow-sm hover:shadow-lg transition-all duration-300">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="p-4 bg-emerald-100 rounded-xl">
                                <i class="fas fa-search text-2xl text-emerald-600"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800">Je cherche un Logement</h3>
                        </div>
                        <p class="text-gray-600 mb-6 min-h-[60px]">
                            Trouvez le logement et les colocataires qui correspondent à vos critères
                        </p>
                        <a href="/register" class="inline-flex items-center px-6 py-3 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition-colors group">
                            <span class="font-medium">Rechercher un logement</span>
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Testimonials with better styling -->
            <div class="bg-gradient-to-b from-gray-50 to-white py-16">
                <div class="container mx-auto px-6">
                    <div class="text-center mb-16">
                        <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Témoignages</span>
                        <h3 class="text-3xl font-bold text-gray-900 mt-2">Ce que disent nos utilisateurs</h3>
                        <p class="text-gray-600 mt-2">Découvrez les expériences de nos utilisateurs</p>
                    </div>

                    <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                        <div class="bg-white p-8 rounded-xl border border-gray-200 shadow-sm hover:shadow-lg transition-all">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-600 to-blue-800 rounded-full flex items-center justify-center text-white font-bold text-xl">
                                    S
                                </div>
                                <div class="ml-4">
                                    <h4 class="font-semibold text-gray-900">Sarah L.</h4>
                                    <p class="text-sm text-gray-500">Étudiante 1A</p>
                                </div>
                            </div>
                            <p class="text-gray-600 italic">"J'ai trouvé ma colocation idéale en quelques jours. La plateforme est vraiment intuitive et la communauté est super !"</p>
                            <div class="mt-4 flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>

                        <!-- Add two more similar testimonial cards with different names, years, and quotes -->
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="container mx-auto px-6 py-16">
                <div class="text-center mb-16">
                    <h3 class="text-3xl font-bold text-gray-900">Questions fréquentes</h3>
                    <p class="text-gray-600 mt-2">Tout ce que vous devez savoir pour commencer</p>
                </div>

                <div class="max-w-3xl mx-auto space-y-4">
                    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                        <h4 class="font-semibold text-gray-900 mb-2">Comment fonctionne le système de matching ?</h4>
                        <p class="text-gray-600">Notre algorithme prend en compte vos préférences, votre style de vie et vos critères pour vous proposer les meilleures correspondances.</p>
                    </div>
                    <!-- Add 2-3 more FAQ items -->
                </div>
            </div>

            <!-- CTA Section -->
            <div class="bg-blue-600 text-white py-16">
                <div class="container mx-auto px-6 text-center">
                    <h3 class="text-3xl font-bold mb-4">Prêt à trouver votre colocataire idéal ?</h3>
                    <p class="text-blue-100 mb-8 max-w-2xl mx-auto">Rejoignez notre communauté d'étudiants et trouvez la colocation qui vous correspond</p>
                    <a href="/register" class="inline-block px-8 py-3 bg-white text-blue-600 rounded-xl hover:bg-blue-50 transition-all duration-300 font-medium">
                        Créer mon compte
                    </a>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 text-gray-400 py-12">
            <div class="container mx-auto px-6">
                <div class="grid md:grid-cols-4 gap-8">
                    <div>
                        <h4 class="text-white text-lg font-semibold mb-4">RoomMate</h4>
                        <p class="text-sm">La solution de colocation pour les étudiants de YouCode</p>
                    </div>
                    <div>
                        <h4 class="text-white text-lg font-semibold mb-4">Liens rapides</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#" class="hover:text-white transition-colors">À propos</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Comment ça marche</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">FAQ</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-white text-lg font-semibold mb-4">Nous contacter</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#" class="hover:text-white transition-colors">Support</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-white text-lg font-semibold mb-4">Suivez-nous</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="hover:text-white transition-colors"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="hover:text-white transition-colors"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="hover:text-white transition-colors"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-800 mt-8 pt-8 text-sm text-center">
                    <p>&copy; 2024 RoomMate YouCode. Tous droits réservés.</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        particlesJS('particles-js', {
            "particles": {
                "number": {
                    "value": 100,
                    "density": {
                        "enable": true,
                        "value_area": 1000
                    }
                },
                "color": {
                    "value": "#2563eb"
                },
                "shape": {
                    "type": "circle"
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": true,
                        "speed": 1,
                        "opacity_min": 0.2,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": true,
                        "speed": 2,
                        "size_min": 0.3,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#3b82f6",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 1,
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
                            "opacity": 0.4
                        }
                    },
                    "push": {
                        "particles_nb": 4
                    }
                }
            },
            "retina_detect": true
        });

        // Make particles interactive with mouse movement
        document.addEventListener('mousemove', function(e) {
            if (window.pJSDom && window.pJSDom[0] && window.pJSDom[0].pJS) {
                const pJS = window.pJSDom[0].pJS;
                pJS.interactivity.mouse.pos_x = e.clientX;
                pJS.interactivity.mouse.pos_y = e.clientY;
            }
        });
    </script>
</body>

</html>