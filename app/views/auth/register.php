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
                    <span class="text-sm mt-1">Email</span>
                </div>
                <div class="step-2 flex flex-col items-center">
                    <div class="w-8 h-8 bg-gray-300 text-white rounded-full flex items-center justify-center">2</div>
                    <span class="text-sm mt-1">Profil</span>
                </div>
                <div class="step-3 flex flex-col items-center">
                    <div class="w-8 h-8 bg-gray-300 text-white rounded-full flex items-center justify-center">3</div>
                    <span class="text-sm mt-1">Vérification</span>
                </div>
            </div>

            <form action="/ValidateRegister" method="POST" enctype="multipart/form-data" id="registrationForm">
                <!-- Step 1: Email & Password -->
                <div id="step1" class="space-y-4">
                    <div>
                        <label class="block text-gray-700 mb-2" for="email">
                            Email YouCode
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="prenom.nom@youcode.ma"
                            required
                        >
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2" for="password">
                            Mot de passe
                        </label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required
                        >
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
                            required
                        >
                    </div>

                    <button 
                        type="button"
                        onclick="showStep(2)"
                        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700"
                    >
                        Suivant
                    </button>
                </div>

                <!-- Step 2: Profile Information -->
                <div id="step2" class="space-y-4 hidden">
                    <div>
                        <label class="block text-gray-700 mb-2" for="fullname">
                            Nom complet
                        </label>
                        <input 
                            type="text" 
                            id="fullname" 
                            name="fullname"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required
                        >
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
                                    required
                                >
                                <span class="ml-2">Homme</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input 
                                    type="radio" 
                                    name="gender" 
                                    value="female" 
                                    class="form-radio text-blue-600"
                                    required
                                >
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
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
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
                                required
                            >
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
                                required
                            >
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
                            placeholder="Parlez-nous un peu de vous..."
                        ></textarea>
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
                                class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                            >
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
                        type="button"
                        onclick="showStep(3)"
                        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700"
                    >
                        Suivant
                    </button>
                </div>

                <!-- Step 3: Verification -->
                <div id="step3" class="space-y-4 hidden">
                    <p class="text-center text-gray-600">
                        Un code de vérification a été envoyé à votre adresse email YouCode
                    </p>
                    <div>
                        <label class="block text-gray-700 mb-2" for="verification-code">
                            Code de vérification
                        </label>
                        <input 
                            type="text" 
                            id="verification-code" 
                            name="verification_code"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required
                        >
                    </div>

                    <button 
                        type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700"
                    >
                        Terminer l'inscription
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showStep(stepNumber) {
            // Validate current step before proceeding
            if (stepNumber > 1 && !validateStep(stepNumber - 1)) {
                return false;
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

        function validateStep(stepNumber) {
            if (stepNumber === 1) {
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('confirm-password').value;

                if (!email || !password || !confirmPassword) {
                    alert('Veuillez remplir tous les champs');
                    return false;
                }

                if (password !== confirmPassword) {
                    alert('Les mots de passe ne correspondent pas');
                    return false;
                }

            
            }
            return true;
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