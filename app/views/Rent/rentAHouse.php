<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Publier un Logement - RoomMate YouCode</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .form-progress { transition: width 0.3s ease-in-out; }
    </style>
</head>

<body class="bg-gradient-to-r from-purple-50 to-indigo-50">
    <!-- Navigation Header -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <img class="h-8 w-auto" src="/images/logo.png" alt="YouCode">
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="/" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md">Accueil</a>
                        <a href="/annonces" class="text-indigo-600 px-3 py-2 rounded-md font-medium">Annonces</a>
                        <a href="/matching" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md">Matching</a>
                        <a href="/messages" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md">Messages</a>
                        <a href="/profil" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md">Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Form Progress Indicator -->
    <div class="w-full bg-gray-200 h-1">
        <div class="form-progress bg-indigo-600 h-1 w-0"></div>
    </div>

    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold mb-3 text-indigo-800">Publier un Logement YouCode</h1>
            <p class="text-gray-600">Trouvez des colocataires parmi la communauté YouCode</p>
        </div>

        <form id="rentForm" action="/postRent" method="POST" enctype="multipart/form-data" class="space-y-6">
            <!-- Form Sections with Visual Grouping -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-800">📍 Localisation et Budget</h2>
                </div>
                <!-- Campus Proximity -->
                <div class="mb-4 bg-white p-6 rounded-lg shadow-md">
                    <label class="block text-gray-700 font-bold mb-4">Distance du Campus YouCode</label>
                    <select name="campus_distance" class="w-full p-2 border rounded-lg">
                        <option value="walking_5">🚶‍♂️ 5 min à pied</option>
                        <option value="walking_10">🚶‍♂️ 10 min à pied</option>
                        <option value="transit_15">🚌 15 min en transport</option>
                        <option value="transit_30">🚌 30 min en transport</option>
                    </select>
                </div>

                <!-- Localisation précise -->
                <div class="mb-4">
                    <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Adresse complète :</label>
                    <input type="text" id="address" name="address" placeholder="Ex: 123 Rue Exemple, Ville" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <!-- Détails financiers -->
                <div class="mb-4">
                    <label for="rent" class="block text-gray-700 text-sm font-bold mb-2">Loyer mensuel (€) :</label>
                    <input type="number" id="rent" name="rent" placeholder="Ex: 500" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="rent_split" class="block text-gray-700 text-sm font-bold mb-2">Répartition (par colocataire) (€) :</label>
                    <input type="number" id="rent_split" name="rent_split" placeholder="Ex: 250" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <!-- Capacité d'accueil -->
                <div class="mb-4">
                    <label for="capacity" class="block text-gray-700 text-sm font-bold mb-2">Capacité d'accueil (nombre de personnes) :</label>
                    <input type="number" id="capacity" name="capacity" min="1" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>

            <!-- Student-Specific Equipment -->
            <div class="mb-6 bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">✨ Équipements Études</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <label class="flex items-center p-3 border rounded-lg hover:bg-indigo-50 transition-colors">
                        <input type="checkbox" name="equipments[]" value="bureau" class="form-checkbox h-5 w-5 text-indigo-600">
                        <span class="ml-2">📚 Bureau individuel</span>
                    </label>
                    <label class="flex items-center p-3 border rounded-lg hover:bg-indigo-50 transition-colors">
                        <input type="checkbox" name="equipments[]" value="wifi" class="form-checkbox h-5 w-5 text-indigo-600">
                        <span class="ml-2">📡 WiFi Haut débit</span>
                    </label>
                    <label class="flex items-center p-3 border rounded-lg hover:bg-indigo-50 transition-colors">
                        <input type="checkbox" name="equipments[]" value="imprimante" class="form-checkbox h-5 w-5 text-indigo-600">
                        <span class="ml-2">🖨️ Imprimante</span>
                    </label>
                </div>
            </div>

            <!-- House Rules Section -->
            <div class="mb-6 bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">📋 Règles de cohabitation</h3>
                <textarea id="house_rules" name="house_rules" rows="4" 
                    placeholder="Décrivez vos règles de vie commune (ex: respect du calme, organisation du ménage...)" 
                    class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none">
                </textarea>
            </div>

            <!-- Study-Friendly Rules -->
            <div class="mb-6 bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">📚 Règles d'Études</h3>
                <div class="space-y-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="study_rules[]" value="quiet_hours" class="form-checkbox h-5 w-5 text-indigo-600">
                        <span class="ml-2">Heures de silence pour études</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="study_rules[]" value="group_study" class="form-checkbox h-5 w-5 text-indigo-600">
                        <span class="ml-2">Espace pour travail en groupe</span>
                    </label>
                </div>
            </div>

            <!-- Photo Gallery Section -->
            <div class="mb-6 bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">📸 Galerie photos</h3>
                <p class="text-sm text-gray-600 mb-4">Ajoutez jusqu'à 5 photos pour présenter votre logement</p>
                <div id="photo-inputs" class="space-y-3">
                    <!-- Initial two photo inputs -->
                    <div class="relative">
                        <input type="url" name="photo_urls[]" 
                            placeholder="URL de la photo principale" 
                            class="w-full pl-10 pr-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <span class="absolute left-3 top-2.5 text-gray-400">🖼️</span>
                    </div>
                    <div class="relative">
                        <input type="url" name="photo_urls[]" 
                            placeholder="URL de la photo 2" 
                            class="w-full pl-10 pr-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <span class="absolute left-3 top-2.5 text-gray-400">🖼️</span>
                    </div>
                </div>
                <!-- Show More Button -->
                <button type="button" 
                    id="show-more-photos" 
                    class="mt-3 text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                    <span>Ajouter plus de photos</span>
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
            </div>

            <!-- Add this JavaScript before the closing body tag -->
            <script>
                document.getElementById('show-more-photos').addEventListener('click', function() {
                    const container = document.getElementById('photo-inputs');
                    const currentInputs = container.querySelectorAll('input[type="url"]').length;
                    
                    if (currentInputs < 5) {
                        const newInput = document.createElement('div');
                        newInput.className = 'relative';
                        newInput.innerHTML = `
                            <input type="url" name="photo_urls[]" 
                                placeholder="URL de la photo ${currentInputs + 1}" 
                                class="w-full pl-10 pr-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <span class="absolute left-3 top-2.5 text-gray-400">🖼️</span>
                        `;
                        container.appendChild(newInput);

                        if (currentInputs + 1 >= 5) {
                            this.style.display = 'none';
                        }
                    }
                });
            </script>

            <!-- Student Preferences -->
            <div class="mb-6 bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">👥 Préférences Étudiants</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">Année d'études acceptée</label>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="checkbox" name="year[]" value="1ere_annee" class="form-checkbox h-5 w-5 text-indigo-600">
                                <span class="ml-2">1ère année</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="year[]" value="2eme_annee" class="form-checkbox h-5 w-5 text-indigo-600">
                                <span class="ml-2">2ème année</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Critères des colocataires recherchés -->
            <div class="mb-4">
                <label for="criteria" class="block text-gray-700 text-sm font-bold mb-2">Critères des colocataires recherchés :</label>
                <textarea id="criteria" name="criteria" rows="3" placeholder="Ex: non-fumeur, étudiant, etc." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>

            <!-- Disponibilité -->
            <div class="mb-4">
                <label for="availability" class="block text-gray-700 text-sm font-bold mb-2">Date de disponibilité :</label>
                <input type="date" id="availability" name="availability" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-between space-x-4 mt-8">
                <button type="button" onclick="window.history.back()" 
                    class="bg-white text-gray-600 font-bold py-3 px-6 rounded-lg border hover:bg-gray-50 focus:outline-none focus:shadow-outline transition duration-150">
                    Annuler
                </button>
                <button type="submit" 
                    class="bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-bold py-3 px-6 rounded-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105">
                    <i class="fas fa-graduation-cap mr-2"></i>Publier l'annonce
                </button>
            </div>
        </form>

        <!-- Success Message (Hidden by default) -->
        <div id="successMessage" class="hidden fixed top-4 right-4 bg-green-500 text-white p-4 rounded-lg shadow-lg">
            Votre annonce a été publiée avec succès!
        </div>
    </div>

    <script>
        // Form Progress Tracking
        const form = document.getElementById('rentForm');
        const progressBar = document.querySelector('.form-progress');
        const requiredInputs = form.querySelectorAll('input[required], textarea[required]');
        const totalRequired = requiredInputs.length;

        function updateProgress() {
            const filledInputs = Array.from(requiredInputs).filter(input => input.value.trim() !== '').length;
            const progress = (filledInputs / totalRequired) * 100;
            progressBar.style.width = `${progress}%`;
        }

        form.addEventListener('input', updateProgress);

        // Form Validation and Success Message
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            if (form.checkValidity()) {
                // Show success message
                const successMessage = document.getElementById('successMessage');
                successMessage.classList.remove('hidden');
                setTimeout(() => {
                    window.location.href = '/annonces';
                }, 2000);
            } else {
                form.reportValidity();
            }
        });
    </script>
</body>
</html>