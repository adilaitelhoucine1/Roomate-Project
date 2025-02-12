<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - RoomMate</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="flex">
        <?php include('layouts/sidebar.php'); ?>

        <main class="flex-1 p-8">
            <!-- Profile Header -->
            <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <div class="w-24 h-24 rounded-full bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-user text-blue-500 text-3xl"></i>
                        </div>
                        <button class="absolute bottom-0 right-0 bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600">
                            <i class="fas fa-camera"></i>
                        </button>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">John Doe</h1>
                        <p class="text-gray-500">Étudiant à YouCode</p>
                        <div class="flex items-center mt-2 text-sm text-gray-500">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            Youssoufia, Maroc
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Content -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Left Column -->
                <div class="md:col-span-2 space-y-6">
                    <!-- Personal Information -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Informations Personnelles</h2>
                        <form class="space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                                    <input type="text" value="John" 
                                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                                    <input type="text" value="Doe" 
                                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" value="john.doe@youcode.ma" 
                                       class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                                <input type="tel" value="+212 6XX-XXXXXX" 
                                       class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                                <textarea rows="4" 
                                          class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                          placeholder="Parlez-nous un peu de vous..."></textarea>
                            </div>

                            <button class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                                Sauvegarder les modifications
                            </button>
                        </form>
                    </div>

                    <!-- Password Change -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Changer le mot de passe</h2>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Mot de passe actuel</label>
                                <input type="password" 
                                       class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nouveau mot de passe</label>
                                <input type="password" 
                                       class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Confirmer le nouveau mot de passe</label>
                                <input type="password" 
                                       class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <button class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                                Mettre à jour le mot de passe
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Account Status -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Statut du compte</h2>
                        <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                <span class="text-green-700 font-medium">Compte actif</span>
                            </div>
                            <span class="text-sm text-gray-500">Depuis le 01/01/2024</span>
                        </div>
                    </div>

                    <!-- Preferences -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Préférences</h2>
                        <div class="space-y-4">
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" checked class="form-checkbox text-blue-500">
                                <span class="text-gray-700">Notifications par email</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" checked class="form-checkbox text-blue-500">
                                <span class="text-gray-700">Notifications push</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" class="form-checkbox text-blue-500">
                                <span class="text-gray-700">Newsletter mensuelle</span>
                            </label>
                        </div>
                    </div>

                    <!-- Danger Zone -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Zone de danger</h2>
                        <button class="w-full px-4 py-2 text-red-600 border border-red-200 rounded-lg hover:bg-red-50">
                            Désactiver le compte
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html> 