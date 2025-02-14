<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - RoomMate YouCode</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center py-12 px-4">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <!-- Progress Steps -->
            <div class="flex justify-between mb-8">
                <div class="step-1 flex flex-col items-center">
                    <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center">1</div>
                    <span class="text-sm mt-1">Vérification</span>
                </div>
                <div class="step-2 flex flex-col items-center">
                    <div class="w-8 h-8 bg-gray-300 text-white rounded-full flex items-center justify-center">2</div>
                    <span class="text-sm mt-1">Mot de passe</span>
                </div>
                <div class="step-3 flex flex-col items-center">
                    <div class="w-8 h-8 bg-gray-300 text-white rounded-full flex items-center justify-center">3</div>
                    <span class="text-sm mt-1">Profil</span>
                </div>
            </div>

            <form action="/ValidateRegister" method="POST" enctype="multipart/form-data" id="registrationForm">
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
                        <label for="email" class="block text-sm font-medium text-gray-700">Email YouCode</label>
                        <input type="email" id="emailInput" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your email">
                        <button id="sendCodeBtn" class="mt-4 px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Send Verification Code</button>
                    </div>

                    <div id="verificationSection" class="hidden">
                        <input type="text" id="verificationInput" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter verification code">
                        <div id="timer" class="text-sm text-gray-600 mt-2"></div>
                        <button id="verifyCodeBtn" class="mt-4 px-6 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Verify Code</button>
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
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
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
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>

                    <button
                        type="button"
                        onclick="showStep(3)"
                        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">
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
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
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
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="1">1ère année</option>
                            <option value="2">2ème année</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 mb-2" for="city-origin">
                                Ville d'origine
                            </label>
                            <input
                                type="text"
                                id="city-origin"
                                name="city_origin"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2" for="current-city">
                                Ville actuelle
                            </label>
                            <input
                                type="text"
                                id="current-city"
                                name="current_city"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
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
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Parlez-nous un peu de vous..."></textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">
                            Photo de profil
                        </label>
                        <div class="mt-1 flex items-center">
                            <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                <img id="preview" class="h-full w-full object-cover hidden">
                                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </span>
                            <input
                                type="URL"
                                id="profile_photo"
                                name="profile_photo"
                                accept="image/*"
                                class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">
                        Terminer l'inscription
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
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

            // Update progress indicators
            const steps = document.querySelectorAll('[class^="step-"] div');
            steps.forEach((step, index) => {
                if (index + 1 <= stepNumber) {
                    step.classList.remove('bg-gray-300');
                    step.classList.add('bg-blue-600');
                } else {
                    step.classList.remove('bg-blue-600');
                    step.classList.add('bg-gray-300');
                }
            });
        }



        // document.getElementById('profile_photo').onchange = function(evt) {
        //     const [file] = this.files;
        //     if (file) {
        //         const preview = document.getElementById('preview');
        //         preview.src = URL.createObjectURL(file);
        //         preview.classList.remove('hidden');
        //         preview.parentElement.querySelector('svg').classList.add('hidden');
        //     }
        // }
    </script>
</body>

</html>