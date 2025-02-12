<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Annonces - RoomMate</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Modal -->
    <div id="announcementModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-10 mx-auto p-8 border w-[600px] shadow-2xl rounded-xl bg-white max-h-[90vh] overflow-y-auto">
            <!-- Modal Header -->
            <div class="flex justify-between items-center mb-6 pb-3 border-b">
                <h3 class="text-2xl font-semibold text-gray-800">Créer une nouvelle annonce</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <form id="createAnnouncementForm" method="POST" action="/student/announcements/store" enctype="multipart/form-data">
                <!-- Two columns layout for shorter fields -->
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                            Titre <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="title" name="title" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="city">
                            Ville <span class="text-red-500">*</span>
                        </label>
                        <select id="city" name="city" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                            <option value="">Sélectionnez une ville</option>
                            <option value="Nador">Nador</option>
                            <option value="Asfi">Asfi</option>
                            <option value="Youssefiya">Youssefiya</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="type">
                            Type d'annonce <span class="text-red-500">*</span>
                        </label>
                        <select id="type" name="type" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                            <option value="">Sélectionnez le type</option>
                            <option value="offer">Offre</option>
                            <option value="request">Demande</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="search_type">
                            Type de recherche <span class="text-red-500">*</span>
                        </label>
                        <select id="search_type" name="search_type" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                            <option value="">Sélectionnez le type de recherche</option>
                            <option value="join_existing">Rejoindre un logement existant</option>
                            <option value="search_together">Chercher ensemble</option>
                        </select>
                    </div>
                </div>

                <!-- Full width fields -->
                <div class="space-y-6">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <textarea id="description" name="description" rows="4" required
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                  placeholder="Décrivez votre annonce en détail..."></textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="cohabitation_rules">
                            Règles de cohabitation
                        </label>
                        <textarea id="cohabitation_rules" name="cohabitation_rules" rows="3"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                  placeholder="Ex: Pas de fumée, partage des tâches ménagères..."></textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="preferred_roommate_criteria">
                            Critères du colocataire souhaité
                        </label>
                        <textarea id="preferred_roommate_criteria" name="preferred_roommate_criteria" rows="3"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                  placeholder="Ex: Étudiant, non-fumeur, calme..."></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                            Prix <span class="text-red-500">*</span>
                        </label>
                        <input type="number" id="price" name="price" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                            Adresse <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="address" name="address" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="capacity">
                            Capacité <span class="text-red-500">*</span>
                        </label>
                        <input type="number" id="capacity" name="capacity" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="photos">
                            Photos (URLs séparées par des virgules)
                        </label>
                        <input type="text" id="photos" name="photos" 
                               placeholder="http://example.com/photo1.jpg, http://example.com/photo2.jpg"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <p class="text-sm text-gray-500 mt-1">Entrez les URLs des photos séparées par des virgules</p>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex justify-end gap-4 mt-8 pt-4 border-t">
                    <button type="button" onclick="closeModal()"
                            class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200 flex items-center gap-2">
                        <i class="fas fa-times"></i>
                        Annuler
                    </button>
                    <button type="submit"
                            class="px-6 py-2.5 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors duration-200 flex items-center gap-2">
                        <i class="fas fa-plus"></i>
                        Créer l'annonce
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="flex">
        <?php include('layouts/sidebar.php'); ?>

        <main class="flex-1 p-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Mes Annonces</h1>
                    <p class="text-gray-600">Gérez vos annonces de logement</p>
                </div>
                <button onclick="openModal()" 
                        class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg flex items-center gap-2">
                    <i class="fas fa-plus"></i>
                    Créer une annonce
                </button>
            </div>

            <!-- Filters -->
            <div class="bg-white p-4 rounded-lg shadow-sm mb-6 flex items-center gap-4">
                <div class="flex-1">
                    <input type="text" 
                           placeholder="Rechercher dans vos annonces..." 
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <select class="px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                <select class="px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Trier par</option>
                    <option value="recent">Plus récent</option>
                    <option value="price-asc">Prix croissant</option>
                    <option value="price-desc">Prix décroissant</option>
                </select>
            </div>

            <!-- Announcements Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Announcement Card -->
                <?php foreach($data as $anouncement): ?>
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="relative">
                        <img src="<?= $anouncement['photo_url'] ?>" alt="Apartment" class="w-full h-48 object-cover">
                        <span class="absolute top-4 left-4 bg-green-500 text-white text-xs font-medium px-2.5 py-1 rounded">Active</span>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-lg font-semibold text-gray-800"><?= $anouncement['title'] ?></h3>
                            <span class="text-lg font-bold text-blue-600"><?= $anouncement['price'] ?></span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4"><?= $anouncement['address'] ?></p>

                        <!-- Stats -->
                        <div class="flex items-center justify-between mb-4 text-sm text-gray-500">
                            <span><i class="far fa-eye mr-1"></i> 245 vues</span>
                            <span><i class="far fa-heart mr-1"></i> 12 favoris</span>
                            <span><i class="far fa-comment mr-1"></i> 8 messages</span>
                        </div>

                        <!-- Actions -->
                        <div class="flex items-center justify-between pt-4 border-t">
                            <button class="text-blue-500 hover:text-blue-600">
                                <i class="fas fa-edit mr-1"></i> Modifier
                            </button>
                            <button class="text-red-500 hover:text-red-600">
                                <i class="fas fa-trash-alt mr-1"></i> Supprimer
                            </button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>

    <!-- Add JavaScript at the end of body -->
    <script>
        function openModal() {
            document.getElementById('announcementModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('announcementModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('announcementModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
</body>
</html> 