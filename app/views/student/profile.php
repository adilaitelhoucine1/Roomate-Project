<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - RoomMate</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <?php include('layouts/sidebar.php'); ?>

        <main class="flex-1 overflow-y-auto p-8">
            <div class="max-w-6xl mx-auto">
                <!-- Profile Header -->
                <div class="bg-white rounded-xl shadow-sm p-8 mb-6">
                    <div class="flex items-center space-x-8">
                        <div class="relative">
                            <div class="w-32 h-32 rounded-full bg-blue-100 flex items-center justify-center overflow-hidden border-4 border-white shadow-lg">
                                <?php if ($user['profile_photo']): ?>
                                    <img src="<?= $user['profile_photo'] ?>" alt="Profile" class="w-full h-full object-cover">
                                <?php else: ?>
                                    <i class="fas fa-user text-blue-500 text-4xl"></i>
                                <?php endif; ?>
                            </div>
                            <button class="absolute bottom-0 right-0 bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600 shadow-lg">
                                <i class="fas fa-camera"></i>
                            </button>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800 mb-2"><?= $user['fullname'] ?></h1>
                            <p class="text-lg text-gray-600 mb-2">Année d'étude: <?= $user['study_year'] ?>ème année</p>
                            <div class="flex items-center text-gray-500">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <?= $user['current_city'] ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Left Column (2 spans) -->
                    <div class="md:col-span-2 space-y-6">
                        <!-- Personal Information -->
                        <div class="bg-white rounded-xl shadow-sm p-8">
                            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Informations Personnelles</h2>
                            <form class="space-y-6" method="POST" action="/student/profile/update">
                                <div class="grid grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Nom complet</label>
                                        <input type="text" name="fullname" value="<?= $user['fullname'] ?>" 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Genre</label>
                                        <select name="gender" 
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                            <option value="male" <?= $user['gender'] === 'male' ? 'selected' : '' ?>>Homme</option>
                                            <option value="female" <?= $user['gender'] === 'female' ? 'selected' : '' ?>>Femme</option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                    <input type="email" name="email" value="<?= $user['email'] ?>" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>

                                <div class="grid grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Ville d'origine</label>
                                        <input type="text" name="city_origin" value="<?= $user['city_origin'] ?>" 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Ville actuelle</label>
                                        <input type="text" name="current_city" value="<?= $user['current_city'] ?>" 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                                    <textarea name="bio" rows="4" 
                                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"><?= $user['bio'] ?></textarea>
                                </div>

                                <!-- Préférences avec style amélioré -->
                                <div class="space-y-4">
                                    <h3 class="text-lg font-semibold text-gray-800">Préférences de cohabitation</h3>
                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <label class="flex items-center space-x-3 cursor-pointer">
                                                <input type="hidden" name="smoking" value="no">
                                                <input type="checkbox" name="smoking" value="yes" 
                                                       <?= ($user['smoking'] == 'yes') ? 'checked' : '' ?>
                                                       class="w-5 h-5 text-blue-500 rounded focus:ring-blue-500">
                                                <span class="text-gray-700">Fumeur</span>
                                            </label>
                                        </div>
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <label class="flex items-center space-x-3 cursor-pointer">
                                                <input type="hidden" name="pets" value="no">
                                                <input type="checkbox" name="pets" value="yes" 
                                                       <?= ($user['pets'] == 'yes') ? 'checked' : '' ?>
                                                       class="w-5 h-5 text-blue-500 rounded focus:ring-blue-500">
                                                <span class="text-gray-700">Animaux acceptés</span>
                                            </label>
                                        </div>
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <label class="flex items-center space-x-3 cursor-pointer">
                                                <input type="hidden" name="guests" value="no">
                                                <input type="checkbox" name="guests" value="yes" 
                                                       <?= ($user['guests'] == 'yes') ? 'checked' : '' ?>
                                                       class="w-5 h-5 text-blue-500 rounded focus:ring-blue-500">
                                                <span class="text-gray-700">Invités autorisés</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" 
                                        class="w-full bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-200">
                                    Sauvegarder les modifications
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                      
                       
                        <!-- Danger Zone -->
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <h2 class="text-xl font-semibold text-gray-800 mb-4">Zone de danger</h2>
                            <div class="space-y-4">
                                <p class="text-sm text-gray-600">
                                    Attention : La désactivation de votre compte est irréversible sans l'intervention d'un administrateur.
                                </p>
                                <a href="/student/DesactiverAccoutStudent/<?= $user['id'] ?>" 
                                   onclick="return confirm('Êtes-vous sûr de vouloir désactiver votre compte ? Cette action nécessitera l\'intervention d\'un administrateur pour réactiver votre compte.')"
                                   class="block w-full px-4 py-3 text-center text-red-600 border border-red-200 rounded-lg hover:bg-red-50 transition duration-200">
                                    Désactiver le compte
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html> 