<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - RoomMate YouCode</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <style>
        #particles-js,
        #particles-js-secondary,
        #particles-js-tertiary,
        #particles-js-quaternary {
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

        .register-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(229, 231, 235, 0.3);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
        }

        .register-container:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .form-input {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(229, 231, 235, 0.5);
            transition: all 0.3s ease;
            @apply w-full px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500;
        }

        .form-input:focus {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
        }

        .step-indicator {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
        }

        .step-line {
            position: absolute;
            top: 20px;
            /* Half of circle height (40px) */
            left: calc(50% + 25px);
            /* Half of circle width (40px) + half of circle + margin */
            right: calc(-50% + 25px);
            height: 2px;
            background: #E5E7EB;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            margin-bottom: 0.75rem;
            position: relative;
            z-index: 10;
        }

        .step-circle.active {
            background: #2563eb;
            transform: scale(1.1);
        }

        .step-circle .step-number {
            font-size: 1rem;
            font-weight: 600;
            margin-right: 0.25rem;
        }

        .step-text {
            font-size: 0.875rem;
            font-weight: 500;
            margin-top: 0.5rem;
            color: #4B5563;
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

        .step-indicator {
            @apply flex items-center;
        }

        .step-indicator::after {
            content: '';
            @apply h-0.5 w-full bg-gray-200 ml-2;
        }

        .step-indicator:last-child::after {
            @apply hidden;
        }

        .step-circle {
            @apply w-10 h-10 rounded-full flex items-center justify-center text-white transition-all;
        }

        .step-circle.active {
            @apply bg-blue-600 scale-110;
        }
    </style>
</head>

<body class="bg-gray-50">
    <div id="particles-js"></div>
    <div id="particles-js-secondary"></div>
    <div id="particles-js-tertiary"></div>
    <div id="particles-js-quaternary"></div>

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="auth-container w-full max-w-2xl space-y-8 p-8 rounded-2xl">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-900">Room<span class="text-blue-600">Mate</span></h1>
                <h2 class="mt-6 text-2xl font-bold tracking-tight text-gray-900">
                    Créer votre compte
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Rejoignez notre communauté de colocataires
                </p>
            </div>

            <!-- Progress Steps with enhanced styling -->
            <div class="flex justify-between mb-12 relative px-8">
                <div class="step-indicator">
                    <div class="step-circle active bg-blue-600 text-white">
                        <span class="step-number">1</span>
                        <i class="fas fa-envelope text-sm"></i>
                    </div>
                    <div class="step-line"></div>
                    <span class="step-text">Vérification</span>
                </div>
                <div class="step-indicator">
                    <div class="step-circle bg-gray-300 text-white">
                        <span class="step-number">2</span>
                        <i class="fas fa-lock text-sm"></i>
                    </div>
                    <div class="step-line"></div>
                    <span class="step-text">Sécurité</span>
                </div>
                <div class="step-indicator">
                    <div class="step-circle bg-gray-300 text-white">
                        <span class="step-number">3</span>
                        <i class="fas fa-user text-sm"></i>
                    </div>
                    <span class="step-text">Profil</span>
                </div>
            </div>

            <form action="/ValidateRegister" method="POST" enctype="multipart/form-data" id="registrationForm" class="space-y-6">
                <!-- Add these hidden elements to your form -->
                <input type="hidden" id="verified-email" name="verified_email">
                <div id="verificationCodeSection" class="hidden">
                    <div class="mb-4">
                        <label for="verification-code" class="block text-sm font-medium text-gray-700">Code de vérification</label>
                        <input type="text" id="verification-code" name="verification_code"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            maxlength="6" pattern="\d{6}">
                    </div>
                </div>
                <!-- Step 1: Email Verification -->
                <div id="step1" class="space-y-4">
                    <div class="mb-4" id="emailSection">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email YouCode
                        </label>
                        <input
                            type="email"
                            id="emailInput"
                            class="auth-input"
                            placeholder="prenom.nom@student.youcode.ma">
                        <div class="mt-6">
                            <button
                                id="sendCodeBtn"
                                class="auth-button w-full flex justify-center py-3 px-4 rounded-xl text-white font-medium">
                                Envoyer le code
                            </button>
                        </div>
                    </div>

                    <div id="verificationSection" class="hidden space-y-4">
                        <input
                            type="text"
                            id="verificationInput"
                            class="auth-input"
                            placeholder="Enter verification code">
                        <div id="timer" class="text-sm text-gray-600 mt-2"></div>
                        <div class="mt-4">
                            <button
                                id="verifyCodeBtn"
                                class="auth-button w-full flex justify-center py-3 px-4 rounded-xl text-white font-medium">
                                Verify Code
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Password -->
                <div id="step2" class="space-y-4 hidden">
                    <div>
                        <label class="block text-gray-700 mb-2" for="password">
                            Mot de passe
                        </label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="auth-input"
                            required>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2" for="confirm-password">
                            Confirmer le mot de passe
                        </label>
                        <input
                            type="password"
                            id="confirm-password"
                            name="confirm_password"
                            class="auth-input"
                            required>
                    </div>

                    <button
                        type="button"
                        onclick="showStep(3)"
                        class="auth-button w-full flex justify-center py-3 px-4 rounded-xl text-white font-medium">
                        Suivant
                    </button>
                </div>

                <!-- Step 3: Profile Information -->
                <div id="step3" class="space-y-4 hidden">
                    <div>
                        <label class="block text-gray-700 mb-2" for="fullname">
                            Nom complet
                        </label>
                        <input
                            type="text"
                            id="fullname"
                            name="fullname"
                            class="auth-input"
                            required>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">Genre</label>
                        <div class="flex space-x-4">
                            <label class="inline-flex items-center">
                                <input
                                    type="radio"
                                    name="gender"
                                    value="male"
                                    class="form-radio text-blue-600"
                                    required>
                                <span class="ml-2">Homme</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input
                                    type="radio"
                                    name="gender"
                                    value="female"
                                    class="form-radio text-blue-600"
                                    required>
                                <span class="ml-2">Femme</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2" for="study-year">
                            Année d'études
                        </label>
                        <select
                            id="study-year"
                            name="study_year"
                            class="auth-input">
                            <option value="1">1ère année</option>
                            <option value="2">2ème année</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 mb-2" for="city_origin">
                                Ville d'origine
                            </label>
                            <select id="city_origin" name="city_origin" class="auth-input">
                                <option value="">Sélectionnez votre ville d'origine</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2" for="current-city">
                                Ville actuelle
                            </label>
                            <select
                                id="current-city"
                                name="current_city"
                                class="auth-input"
                                required>
                                <option value="">Sélectionnez une ville</option>
                                <option value="Nador">Nador</option>
                                <option value="Youssoufia">Youssoufia</option>
                                <option value="Safi">Safi</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2" for="bio">
                            Biographie
                        </label>
                        <textarea
                            id="bio"
                            name="bio"
                            rows="3"
                            class="auth-input"
                            placeholder="Parlez-nous un peu de vous..."></textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">
                            Photo de profil
                        </label>
                        <div class="mt-1 flex items-center space-x-4">
                            <span class="inline-block h-16 w-16 rounded-full overflow-hidden bg-gray-100">
                                <img id="preview" class="h-full w-full object-cover"
                                    src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                                    alt="Profile preview">
                            </span>
                            <div class="flex-1">
                                <input
                                    type="url"
                                    id="profile_photo"
                                    name="profile_photo"
                                    class="auth-input"
                                    placeholder="Collez l'URL de votre photo"
                                    oninput="updatePhotoPreview(this.value)"
                                    onchange="updatePhotoPreview(this.value)">
                                <p class="text-xs text-gray-500 mt-1">Collez l'URL d'une image (jpg, png, gif)</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <label class="block text-gray-700 mb-2">Préférences</label>

                        <!-- Smoking Preference -->
                        <div class="flex items-center space-x-6">
                            <label class="text-gray-700">Fumeur :</label>
                            <div class="flex space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="smoking" value="yes" class="form-radio text-blue-600">
                                    <span class="ml-2">Oui</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="smoking" value="no" class="form-radio text-blue-600">
                                    <span class="ml-2">Non</span>
                                </label>
                            </div>
                        </div>

                        <!-- Pets Preference -->
                        <div class="flex items-center space-x-6">
                            <label class="text-gray-700">Animaux :</label>
                            <div class="flex space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="pets" value="yes" class="form-radio text-blue-600">
                                    <span class="ml-2">Acceptés</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="pets" value="no" class="form-radio text-blue-600">
                                    <span class="ml-2">Non acceptés</span>
                                </label>
                            </div>
                        </div>

                        <!-- Guests Preference -->
                        <div class="flex items-center space-x-6">
                            <label class="text-gray-700">Invités :</label>
                            <div class="flex space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="guests" value="yes" class="form-radio text-blue-600">
                                    <span class="ml-2">Autorisés</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="guests" value="no" class="form-radio text-blue-600">
                                    <span class="ml-2">Non autorisés</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <button
                        type="submit"
                        class="auth-button w-full flex justify-center py-3 px-4 rounded-xl text-white font-medium">
                        Terminer l'inscription
                    </button>
                </div>
            </form>
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
        particlesJS('particles-js', createParticleConfig('#2563eb', 150, 3, 1, 0.5)); // Blue
        particlesJS('particles-js-secondary', createParticleConfig('#9681EB', 100, 2, 0.8, 0.3)); // Lavender
        particlesJS('particles-js-tertiary', createParticleConfig('#14b8a6', 120, 2.5, 0.9, 0.4)); // Teal
        particlesJS('particles-js-quaternary', createParticleConfig('#f472b6', 80, 2, 0.7, 0.2)); // Soft Pink

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

        document.addEventListener('DOMContentLoaded', function() {
            const sendButton = document.getElementById('sendCodeBtn');
            if (sendButton) {
                sendButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    sendVerificationCode();
                });
            }

            const verifyButton = document.getElementById('verifyCodeBtn');
            if (verifyButton) {
                verifyButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    verifyCode();
                });
            }

            const photoInput = document.getElementById('profile_photo');
            if (photoInput) {
                photoInput.addEventListener('paste', function(e) {
                    setTimeout(() => updatePhotoPreview(this.value), 100);
                });
                photoInput.addEventListener('change', function() {
                    updatePhotoPreview(this.value);
                });
            }
        });

        function validateStep(stepNumber) {
            if (stepNumber === 1) {
                const email = document.getElementById('email').value.trim().toLowerCase();
                if (!email) {
                    alert('Veuillez entrer votre email');
                    return false;
                }

                const emailRegex = /^[a-z0-9]+\.?[a-z0-9]+@student\.youcode\.ma$/;
                if (!emailRegex.test(email)) {
                    alert('Format email invalide. Utilisez votre email YouCode (prenom.nom@student.youcode.ma)');
                    return false;
                }

                const blacklistedPatterns = [
                    'test@student.youcode.ma',
                    'fake@student.youcode.ma',
                    'admin@student.youcode.ma'
                ];
                if (blacklistedPatterns.includes(email)) {
                    alert('Email non autorisé');
                    return false;
                }

                document.getElementById('verified-email').value = email;

                sendVerificationCode();
                return false;
            }

            // Only check password after email verification is complete
            if (stepNumber === 2) {
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('confirm-password').value;

                if (!password || !confirmPassword) {
                    alert('Veuillez remplir les champs de mot de passe');
                    return false;
                }

                if (password !== confirmPassword) {
                    alert('Les mots de passe ne correspondent pas');
                    return false;
                }
            }

            return true;
        }
        async function sendVerificationCode() {
            const emailInput = document.getElementById('emailInput');
            const verificationSection = document.getElementById('verificationSection');
            const emailSection = document.getElementById('emailSection');
            const verifiedEmailInput = document.getElementById('verified-email');
            const sendButton = document.getElementById('sendCodeBtn');

            if (!emailInput || !verifiedEmailInput || !verificationSection || !sendButton) {
                console.error('Required elements not found');
                return;
            }

            try {
                const email = emailInput.value;

                const response = await fetch('/auth/sendVerificationCode', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        email: email
                    })
                });

                const contentType = response.headers.get('content-type');
                if (!contentType || !contentType.includes('application/json')) {
                    throw new Error('Server response was not JSON');
                }

                const data = await response.json();

                if (data.status === 'success' && data.email) {
                    verifiedEmailInput.value = data.email;
                    emailSection.classList.add('hidden');
                    verificationSection.classList.remove('hidden');
                    alert('Code envoyé à ' + data.email);
                    startCountdown(900); // Start 15-minute countdown
                } else {
                    alert(data.message || 'Erreur lors de l\'envoi du code');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Erreur: ' + error.message);
            }
        }

        function startCountdown(seconds) {
            const timerElement = document.getElementById('timer');
            if (!timerElement) {
                console.error('Timer element not found');
                return;
            }

            let timeLeft = seconds;
            const timer = setInterval(() => {
                const minutes = Math.floor(timeLeft / 60);
                const remainingSeconds = timeLeft % 60;
                timerElement.textContent = `Code expires in ${minutes}:${remainingSeconds.toString().padStart(2, '0')}`;

                if (timeLeft <= 0) {
                    clearInterval(timer);
                    document.getElementById('emailSection').classList.remove('hidden');
                    document.getElementById('verificationSection').classList.add('hidden');
                    timerElement.textContent = 'Code expired';
                }
                timeLeft--;
            }, 1000);
        }

        async function verifyCode() {
            const code = document.getElementById('verificationInput').value;
            const email = document.getElementById('verified-email').value;

            console.log('Sending verification request:', {
                code,
                email
            });

            if (!code || code.length !== 6) {
                alert('Veuillez entrer un code à 6 chiffres');
                return;
            }

            if (!email) {
                alert('Email non trouvé');
                return;
            }

            try {
                const response = await fetch('/auth/verifyCode', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        code: code,
                        email: email
                    })
                });

                const data = await response.json();

                if (data.status === 'success') {
                    // Hide verification sections and show next step
                    document.getElementById('emailSection').classList.add('hidden');
                    document.getElementById('verificationSection').classList.add('hidden');
                    document.getElementById('step1').classList.add('hidden');
                    document.getElementById('step2').classList.remove('hidden');

                    // Add hidden inputs for both email and verification code
                    const emailInput = document.createElement('input');
                    emailInput.type = 'hidden';
                    emailInput.name = 'email';
                    emailInput.value = email;
                    document.getElementById('registrationForm').appendChild(emailInput);

                    const codeInput = document.createElement('input');
                    codeInput.type = 'hidden';
                    codeInput.name = 'verification_code';
                    codeInput.value = code;
                    document.getElementById('registrationForm').appendChild(codeInput);

                    // Update progress indicator
                    const steps = document.querySelectorAll('[class^="step-"] div');
                    steps[1].classList.remove('bg-gray-300');
                    steps[1].classList.add('bg-blue-600');
                } else {
                    alert(data.message || 'Code invalide');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Erreur lors de la vérification: ' + error.message);
            }
        }

        function showStep(stepNumber) {
            if (stepNumber === 2 && !document.getElementById('verification-code').value) {
                alert('Veuillez vérifier votre email d\'abord');
                return;
            }

            // Hide all steps
            document.getElementById('step1').classList.add('hidden');
            document.getElementById('step2').classList.add('hidden');
            document.getElementById('step3').classList.add('hidden');

            // Show the requested step
            document.getElementById('step' + stepNumber).classList.remove('hidden');

            // Update progress indicators with numbers
            const steps = document.querySelectorAll('.step-circle');
            steps.forEach((step, index) => {
                if (index + 1 <= stepNumber) {
                    step.classList.remove('bg-gray-300');
                    step.classList.add('bg-blue-600', 'active');
                } else {
                    step.classList.remove('bg-blue-600', 'active');
                    step.classList.add('bg-gray-300');
                }
            });
        }

        function updatePhotoPreview(url) {
            const preview = document.getElementById('preview');
            if (url && isValidImageUrl(url)) {
                const tempImage = new Image();
                tempImage.onload = function() {
                    preview.src = url;
                };
                tempImage.onerror = function() {
                    resetPreviewToDefault();
                };
                tempImage.src = url;
            } else {
                resetPreviewToDefault();
            }
        }

        function resetPreviewToDefault() {
            const preview = document.getElementById('preview');
            preview.src = 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png';
        }

        function isValidImageUrl(url) {
            return url.match(/\.(jpeg|jpg|gif|png)$/i) != null;
        }

        function handleUrlPaste(event) {
            const pastedUrl = event.clipboardData.getData('text');
            setTimeout(() => updatePhotoPreview(pastedUrl), 100);
        }

        fetch('/auth/getMoroccanCities', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.text())
            .then(rawResponse => {
                try {
                    const data = JSON.parse(rawResponse);
                    if (data.status === 'success') {

                        const cityOriginSelect = document.getElementById('city_origin');


                        const options = data.data.map(city => new Option(city.name, city.name));


                        if (citySelect) {
                            options.forEach(option => {
                                citySelect.add(option.cloneNode(true));
                            });
                        }

                        if (cityOriginSelect) {
                            options.forEach(option => {
                                cityOriginSelect.add(option.cloneNode(true));
                            });
                        }
                    } else {
                        console.error('Failed to fetch cities:', data.message);
                    }
                } catch (error) {
                    console.error('Error parsing JSON:', error);
                    console.error('Raw response was:', rawResponse);
                }
            })
            .catch(error => {
                console.error('Network error:', error);
            });
    </script>
</body>

</html>