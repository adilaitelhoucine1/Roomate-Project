<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher - RoomMate</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="flex">
        <?php include('layouts/sidebar.php'); ?>

        <main class="flex-1 p-8">
            <!-- Search Header with Background -->
            <div class="mb-8 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-8 text-white">
                <h1 class="text-3xl font-bold mb-2">Rechercher un logement</h1>
                <p class="text-blue-100">Trouvez le logement parfait pour vous</p>
                
                <!-- Main Search Bar -->
                <div class="mt-6">
                    <div class="relative max-w-2xl">
                        <input type="text" id="search_input"
                               placeholder="Rechercher par ville, quartier..." 
                               class="w-full pl-12 pr-4 py-4 bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl focus:outline-none focus:ring-2 focus:ring-white/50 text-white placeholder-blue-100">
                        <i class="fas fa-search absolute left-4 top-4 text-blue-100"></i>
                    </div>
                </div>
            </div>

            <!-- Advanced Filters Card -->
            <div class="bg-white rounded-xl shadow-sm mb-8">
                <!-- Filter Header -->
                <div class="p-6 border-b border-gray-100">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-800">Filtres avancés</h2>
                        <button class="text-blue-500 hover:text-blue-600 text-sm font-medium">
                            Réinitialiser les filtres
                        </button>
                    </div>
                </div>

                <!-- Filter Content -->
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Ville Filter -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Ville</label>
                            <div class="relative">
                                <select class="w-full appearance-none px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white">
                                    <option value="">Toutes les villes</option>
                                    <option value="youssoufia">Youssoufia</option>
                                    <option value="safi">Safi</option>
                                    <option value="marrakech">Marrakech</option>
                                </select>
                                <i class="fas fa-chevron-down absolute right-4 top-4 text-gray-400 pointer-events-none"></i>
                            </div>
                        </div>

                        <!-- Type de logement Filter -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Type de logement</label>
                            <div class="relative">
                                <select class="w-full appearance-none px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white">
                                    <option value="">Tous les types</option>
                                    <option value="apartment">Appartement</option>
                                    <option value="studio">Studio</option>
                                    <option value="room">Chambre</option>
                                </select>
                                <i class="fas fa-chevron-down absolute right-4 top-4 text-gray-400 pointer-events-none"></i>
                            </div>
                        </div>

                        <!-- Budget Filter -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Budget</label>
                            <div class="flex items-center space-x-4">
                                <input type="number" placeholder="Min" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white">
                                <span class="text-gray-400">-</span>
                                <input type="number" placeholder="Max" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white">
                            </div>
                        </div>

                        <!-- Tri Filter -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Trier par</label>
                            <div class="relative">
                                <select class="w-full appearance-none px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white">
                                    <option value="recent">Plus récent</option>
                                    <option value="price-asc">Prix croissant</option>
                                    <option value="price-desc">Prix décroissant</option>
                                </select>
                                <i class="fas fa-chevron-down absolute right-4 top-4 text-gray-400 pointer-events-none"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Features -->
                    <div class="mt-6 border-t border-gray-100 pt-6">
                        <h3 class="text-sm font-medium text-gray-700 mb-4">Caractéristiques</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <label class="relative flex cursor-pointer">
                                <input type="checkbox" class="peer sr-only">
                                <div class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl peer-checked:bg-blue-50 peer-checked:border-blue-500 transition-colors">
                                    <div class="flex items-center">
                                        <i class="fas fa-couch text-gray-400 peer-checked:text-blue-500 mr-3"></i>
                                        <span class="text-sm text-gray-600 peer-checked:text-blue-600">Meublé</span>
                                    </div>
                                </div>
                            </label>

                            <label class="relative flex cursor-pointer">
                                <input type="checkbox" class="peer sr-only">
                                <div class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl peer-checked:bg-blue-50 peer-checked:border-blue-500 transition-colors">
                                    <div class="flex items-center">
                                        <i class="fas fa-wifi text-gray-400 peer-checked:text-blue-500 mr-3"></i>
                                        <span class="text-sm text-gray-600 peer-checked:text-blue-600">Internet</span>
                                    </div>
                                </div>
                            </label>

                            <label class="relative flex cursor-pointer">
                                <input type="checkbox" class="peer sr-only">
                                <div class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl peer-checked:bg-blue-50 peer-checked:border-blue-500 transition-colors">
                                    <div class="flex items-center">
                                        <i class="fas fa-bolt text-gray-400 peer-checked:text-blue-500 mr-3"></i>
                                        <span class="text-sm text-gray-600 peer-checked:text-blue-600">Charges comprises</span>
                                    </div>
                                </div>
                            </label>

                            <label class="relative flex cursor-pointer">
                                <input type="checkbox" class="peer sr-only">
                                <div class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl peer-checked:bg-blue-50 peer-checked:border-blue-500 transition-colors">
                                    <div class="flex items-center">
                                        <i class="fas fa-parking text-gray-400 peer-checked:text-blue-500 mr-3"></i>
                                        <span class="text-sm text-gray-600 peer-checked:text-blue-600">Parking</span>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Apply Filters Button -->
                    <div class="mt-6 flex justify-end">
                        <button class="px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-xl transition-colors">
                            Appliquer les filtres
                        </button>
                    </div>
                </div>
            </div>

<!-- 
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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



            <!-- Search Results -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="searched_for">
                <!-- Result Card -->
                <!-- <?php foreach($data as $anno): ?>
                <div class="bg-white rounded-xl shadow-sm overflow-hidden group hover:shadow-md transition-shadow">
                    <div class="relative">
                        <img src="<?= $anno['photo_url'] ?>" alt="Apartment" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-200">
                        <span class="absolute top-4 left-4 bg-blue-500 text-white text-xs font-medium px-2.5 py-1 rounded">Nouveau</span>
                        <button class="absolute top-4 right-4 bg-white/50 backdrop-blur-sm p-2 rounded-full hover:bg-white/75 transition-colors">
                            <i class="far fa-heart text-white"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-lg font-semibold text-gray-800"><?=$anno['title'] ?></h3>
                            <span class="text-lg font-bold text-blue-600"><?= $anno['price'] ?></span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4"><?= $anno['address'] ?></p>
                        
                        
                        <div class="flex items-center gap-4 mb-4 text-sm text-gray-500">
                            <span><i class="fas fa-bed mr-1"></i> 1 chambre</span>
                            <span><i class="fas fa-wifi mr-1"></i> Internet</span>
                            <span><i class="fas fa-couch mr-1"></i> Meublé</span>
                        </div>

                        
                        <a href="/student/messages?user=<?= $anno['user_id'] ?>&announcement=<?= $anno['id'] ?>" 
               class="block w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg transition-colors text-center">
                Contacter
            </a>
                    </div>
                </div>
                <?php endforeach; ?> -->    
                <!-- Add more result cards here -->
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-8">
                <nav class="flex items-center space-x-2">
                    <button class="px-3 py-1 rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="px-3 py-1 rounded-lg bg-blue-500 text-white">1</button>
                    <button class="px-3 py-1 rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50">2</button>
                    <button class="px-3 py-1 rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50">3</button>
                    <button class="px-3 py-1 rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </nav>
            </div>
        </main>
    </div>

    <script>

document.addEventListener("DOMContentLoaded", function () {
    let searchInput = document.getElementById("search_input");
    let cardsContainer = document.getElementById("searched_for");

    function fetchAnnouncements(query = "") {
        fetch(`/api/search?query=${query}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP Error: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                cardsContainer.innerHTML = "";

                if (data.length > 0) {
                    data.forEach(announcement => {
                        cardsContainer.innerHTML += `
                            <div class="bg-white rounded-xl shadow-sm overflow-hidden group hover:shadow-md transition-shadow">
                                <div class="relative">
                                    <img src="${announcement.photo_url}" alt="Apartment" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-200">
                                    <span class="absolute top-4 left-4 bg-blue-500 text-white text-xs font-medium px-2.5 py-1 rounded">Nouveau</span>
                                    <button class="absolute top-4 right-4 bg-white/50 backdrop-blur-sm p-2 rounded-full hover:bg-white/75 transition-colors">
                                        <i class="far fa-heart text-white"></i>
                                    </button>
                                </div>
                                <div class="p-4">
                                    <div class="flex justify-between items-start mb-2">
                                        <h3 class="text-lg font-semibold text-gray-800">${announcement.title}</h3>
                                        <span class="text-lg font-bold text-blue-600">${announcement.price}</span>
                                    </div>
                                    <p class="text-gray-600 text-sm mb-4">${announcement.address}</p>

                                    <!-- Features -->
                                    <div class="flex items-center gap-4 mb-4 text-sm text-gray-500">
                                        <span><i class="fas fa-bed mr-1"></i> 1 chambre</span>
                                        <span><i class="fas fa-wifi mr-1"></i> Internet</span>
                                        <span><i class="fas fa-couch mr-1"></i> Meublé</span>
                                    </div>

                                    <!-- Contact Button -->
                                    <a href="/student/messages?user=${announcement.user_id}&announcement=${announcement.id}" 
                                        class="block w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg transition-colors text-center">
                                        Contacter
                                    </a>
                                </div>
                            </div>
                        `;
                    });
                } else {
                    cardsContainer.innerHTML = "<p class='text-gray-500'>Aucune annonce trouvée</p>";
                }
            })
            .catch(error => {
                console.error("Error fetching data:", error);
                cardsContainer.innerHTML = "<p class='text-red-500'>Erreur de chargement des annonces</p>";
            });
    }

    fetchAnnouncements();
    searchInput.addEventListener("input", (e)=> {
        fetchAnnouncements(e.target.value);
        // console.log(e.target.value);
    });
});

    </script>
</body>
</html> 