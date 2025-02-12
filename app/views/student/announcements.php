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
    <div class="flex">
        <?php include('layouts/sidebar.php'); ?>

        <main class="flex-1 p-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Mes Annonces</h1>
                    <p class="text-gray-600">Gérez vos annonces de logement</p>
                </div>
                <button onclick="window.location.href='/student/announcements/create'" 
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
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="relative">
                        <img src="https://via.placeholder.com/300x200" alt="Apartment" class="w-full h-48 object-cover">
                        <span class="absolute top-4 left-4 bg-green-500 text-white text-xs font-medium px-2.5 py-1 rounded">Active</span>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-lg font-semibold text-gray-800">Studio Meublé</h3>
                            <span class="text-lg font-bold text-blue-600">1500 DH</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Youssoufia, proche de YouCode</p>
                        
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
            </div>
        </main>
    </div>
</body>
</html> 