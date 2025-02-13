<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - RoomMate</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Add Font Awesome for better icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="flex">
        <!-- Include Sidebar -->
        <?php include('layouts/sidebar.php'); ?>

        <main class="flex-1 p-8">
            <!-- Header with Welcome Message -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Bonjour, <?php $fullName = $_SESSION['user_name'];
                                                                        $firstName = explode(" ", $fullName)[0];
                                                                        echo $firstName; ?>! 👋</h1>
                <p class="text-gray-600 mt-1">Voici un aperçu de votre activité</p>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Annonces Card -->
                <div class="bg-white rounded-xl p-6 border border-gray-200 hover:shadow-md transition-shadow">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-50 rounded-lg">
                            <i class="fas fa-home text-blue-600"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-sm text-gray-600">Mes Annonces</h2>
                            <p class="text-2xl font-semibold text-gray-800 mt-1">3</p>
                        </div>
                    </div>
                </div>

                <!-- Messages Card -->
                <div class="bg-white rounded-xl p-6 border border-gray-200 hover:shadow-md transition-shadow">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-50 rounded-lg">
                            <i class="fas fa-comments text-blue-600"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-sm text-gray-600">Messages</h2>
                            <p class="text-2xl font-semibold text-gray-800 mt-1">12</p>
                        </div>
                    </div>
                </div>

                <!-- Favoris Card -->
                <div class="bg-white rounded-xl p-6 border border-gray-200 hover:shadow-md transition-shadow">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-50 rounded-lg">
                            <i class="fas fa-heart text-blue-600"></i>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-sm text-gray-600">Favoris</h2>
                            <p class="text-2xl font-semibold text-gray-800 mt-1">5</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-xl border border-gray-200 p-6 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-semibold text-gray-800">Activité Récente</h2>
                    <a href="#" class="text-blue-600 hover:text-blue-700 text-sm">Voir tout</a>
                </div>
                <div class="space-y-4">
                    <!-- Activity Item -->
                    <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                        <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center">
                            <i class="fas fa-home text-blue-600"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-800">Nouvelle annonce publiée</p>
                            <p class="text-sm text-gray-500 mt-1">Il y a 2 heures</p>
                        </div>
                    </div>

                    <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                        <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center">
                            <i class="fas fa-comment text-blue-600"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-800">Nouveau message reçu</p>
                            <p class="text-sm text-gray-500 mt-1">Il y a 5 heures</p>
                        </div>
                    </div>

                    <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                        <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center">
                            <i class="fas fa-heart text-blue-600"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-gray-800">Annonce ajoutée aux favoris</p>
                            <p class="text-sm text-gray-500 mt-1">Il y a 1 jour</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Announcements Section -->
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-semibold text-gray-800">Dernières Annonces</h2>
                    <div class="flex space-x-4">
                        <input type="text" 
                               placeholder="Rechercher..." 
                               class="px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        
                        <select class="px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Trier par</option>
                            <option value="recent">Plus récent</option>
                            <option value="price">Prix</option>
                        </select>
                    </div>
                </div>

                <!-- Announcements Grid -->
                <!-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    
                    <?php foreach($data as $anno): ?>
                    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                        <img src="<?= $anno['photo_url'] ?>" alt="Apartment" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-lg font-semibold text-gray-800"><?=$anno['title'] ?></h3>
                                <span class="text-blue-600 font-semibold"><?= $anno['price'] ?></span>
                            </div>
                            <p class="text-gray-600 text-sm mb-4"><?= $anno['address'] ?></p>
                            <div class="flex items-center justify-between text-sm text-gray-500">
                                <span><i class="fas fa-map-marker-alt mr-1"></i><?= $anno['city'] ?></span>
                                <span> <?= $anno['status'] ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div> -->

                <!-- Pagination -->
                <div class="flex justify-center mt-8">
                    <nav class="flex items-center space-x-2">
                        <a href="#" class="px-3 py-1 rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <a href="#" class="px-3 py-1 rounded-lg bg-blue-600 text-white">1</a>
                        <a href="#" class="px-3 py-1 rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50">2</a>
                        <a href="#" class="px-3 py-1 rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50">3</a>
                        <a href="#" class="px-3 py-1 rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </nav>
                </div>
            </div>
        </main>
    </div>
</body>
</html> 