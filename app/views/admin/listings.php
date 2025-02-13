<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annonces - RoomMate YouCode</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-50">
    <div class="flex">
        <?php include('layouts/admin_sidebar.php'); ?>

        <main class="flex-1 p-8 ml-64">
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Matching RoomMate</h1>
                <p class="text-gray-600 mt-1">Trouvez votre colocataire idéal</p>
            </div>

            <!-- Search Section -->
            <div class="bg-white rounded-xl border border-gray-200 p-6 mb-8">
                <div class="flex gap-4">
                    <input type="text" placeholder="Rechercher un utilisateur..." 
                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg">
                    <select class="px-4 py-2 border border-gray-300 rounded-lg">
                        <option>Tout afficher</option>
                        <option>Offres</option>
                        <option>Demandes</option>
                    </select>
                </div>
            </div>

            <!-- Users List -->
            <div class="space-y-6">
                <!-- Section Offres -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold mb-4 text-blue-600">Offres</h2>
                    <?php 
                    $hasOffres = false;
                    foreach ($announcements as $announcement) : 
                        if ($announcement['type'] == 'offer') :
                            $hasOffres = true;
                    ?>
                        <div class="bg-gradient-to-r from-blue-50 to-white rounded-xl border border-blue-200 p-6 hover:shadow-lg transition-all duration-300 mb-4">
                            <div class="grid grid-cols-7 items-center gap-6">
                                <!-- Profile Section -->
                                <div class="flex flex-col items-center gap-2">
                                    <span class="text-xs font-medium text-blue-600 uppercase tracking-wider">Photo</span>
                                    <div class="relative">
                                        <div class="absolute inset-0 bg-blue-200 rounded-full blur-md opacity-50"></div>
                                        <img src="<?php echo $announcement['profile_photo']; ?>" alt="Profile" 
                                            class="relative w-14 h-14 rounded-full object-cover ring-4 ring-white shadow-lg">
                                        <span class="absolute -top-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white shadow"></span>
                                    </div>
                                </div>

                                <!-- User Info -->
                                <div class="flex flex-col gap-2">
                                    <span class="text-xs font-medium text-blue-600 uppercase tracking-wider">Utilisateur</span>
                                    <div class="flex items-center gap-2">
                                        <h3 class="font-bold text-gray-800"><?php echo $announcement['fullname']; ?></h3>
                                    </div>
                                </div>

                                <!-- Type -->
                                <div class="flex flex-col gap-2">
                                    <span class="text-xs font-medium text-blue-600 uppercase tracking-wider">Type</span>
                                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium bg-blue-500 text-white shadow-sm">
                                        <i class="fas fa-home mr-2"></i>
                                        <?php echo $announcement['type']; ?>
                                    </span>
                                </div>

                                <!-- Budget -->
                                <div class="flex flex-col gap-2">
                                    <span class="text-xs font-medium text-blue-600 uppercase tracking-wider">Prix</span>
                                    <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-lg shadow-sm">
                                        <i class="fas fa-money-bill text-green-500"></i>
                                        <span class="font-bold text-gray-800"><?php echo $announcement['price']; ?> DH</span>
                                    </div>
                                </div>

                                <!-- Date -->
                                <div class="flex flex-col gap-2">
                                    <span class="text-xs font-medium text-blue-600 uppercase tracking-wider">Disponibilité</span>
                                    <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-lg shadow-sm">
                                        <i class="fas fa-calendar text-blue-500"></i>
                                        <?php 
                                        $date = new DateTime($announcement['creation_date']);
                                        echo $date->format('d/m/Y'); 
                                        ?>
                                    </div>
                                </div>

                                <!-- Location -->
                                <div class="flex flex-col gap-2">
                                    <span class="text-xs font-medium text-blue-600 uppercase tracking-wider">Ville</span>
                                    <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-lg shadow-sm">
                                        <i class="fas fa-map-marker-alt text-red-500"></i>
                                        <span class="text-gray-800"><?php echo $announcement['city']; ?></span>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="flex flex-col gap-2">
                                    <span class="text-xs font-medium text-blue-600 uppercase tracking-wider">Actions</span>
                                    <div class="flex flex-col gap-2">
                                        <?php if ($announcement['status'] == 'active' ) : ?>
                                            <a href="/admin/deactivate/<?= $announcement['id'] ?>" 
                                               class="group flex items-center justify-center gap-2 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 text-sm font-medium transition-all duration-300 shadow-sm hover:shadow">
                                                <i class="fas fa-check text-xs group-hover:rotate-180 transition-transform duration-300"></i>
                                                Activer
                                            </a>
                                        <?php elseif ($announcement['status'] == 'inactive' || $announcement['status'] == 'pending') : ?>
                                            <a href="/admin/activate/<?= $announcement['id'] ?>" 
                                               class="group flex items-center justify-center gap-2 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 text-sm font-medium transition-all duration-300 shadow-sm hover:shadow">
                                                <i class="fas fa-ban text-xs group-hover:rotate-180 transition-transform duration-300"></i>
                                                Désactiver
                                            </a>
                                        <?php endif; ?>
                                        <a href="/admin/delete/<?= $announcement['id'] ?>" 
                                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')"
                                           class="group flex items-center justify-center gap-2 px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 text-sm font-medium transition-all duration-300 shadow-sm hover:shadow">
                                            <i class="fas fa-trash text-xs group-hover:rotate-12 transition-transform duration-300"></i>
                                            Supprimer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                        endif;
                    endforeach;
                    if (!$hasOffres) : ?>
                        <p class="text-gray-500">Aucune offre disponible</p>
                    <?php endif; ?>
                </div>

                <!-- Section Demandes -->
                <div>
                    <h2 class="text-2xl font-bold mb-4 text-orange-600">Demandes</h2>
                    <?php 
                    $hasDemandes = false;
                    foreach ($announcements as $announcement) : 
                        if ($announcement['type'] == 'request') :
                            $hasDemandes = true;
                    ?>
                        <div class="bg-gradient-to-r from-orange-50 to-white rounded-xl border border-orange-200 p-6 hover:shadow-lg transition-all duration-300 mb-4">
                            <div class="grid grid-cols-7 items-center gap-6">
                                <div class="flex flex-col items-center gap-2">
                                    <span class="text-xs font-medium text-orange-600 uppercase tracking-wider">Photo</span>
                                    <div class="relative">
                                        <div class="absolute inset-0 bg-orange-200 rounded-full blur-md opacity-50"></div>
                                        <img src="<?php echo $announcement['profile_photo']; ?>" alt="Profile" 
                                            class="relative w-14 h-14 rounded-full object-cover ring-4 ring-white shadow-lg">
                                        <span class="absolute -top-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white shadow"></span>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-2">
                                    <span class="text-xs font-medium text-orange-600 uppercase tracking-wider">Utilisateur</span>
                                    <div class="flex items-center gap-2">
                                        <h3 class="font-bold text-gray-800"><?php echo $announcement['fullname']; ?></h3>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-2">
                                    <span class="text-xs font-medium text-orange-600 uppercase tracking-wider">Type</span>
                                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium bg-orange-500 text-white shadow-sm">
                                        <i class="fas fa-home mr-2"></i>
                                        <?php echo $announcement['type']; ?>
                                    </span>
                                </div>

                                <div class="flex flex-col gap-2">
                                    <span class="text-xs font-medium text-orange-600 uppercase tracking-wider">Budget</span>
                                    <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-lg shadow-sm">
                                        <i class="fas fa-money-bill text-green-500"></i>
                                        <span class="font-bold text-gray-800"><?php echo $announcement['budget']; ?> DH</span>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-2">
                                    <span class="text-xs font-medium text-orange-600 uppercase tracking-wider">Disponibilité</span>
                                    <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-lg shadow-sm">
                                        <i class="fas fa-calendar text-orange-500"></i>
                                        <span class="text-gray-800"><?php echo $announcement['move_in_date']; ?></span>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-2">
                                    <span class="text-xs font-medium text-orange-600 uppercase tracking-wider">Ville</span>
                                    <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-lg shadow-sm">
                                        <i class="fas fa-map-marker-alt text-red-500"></i>
                                        <span class="text-gray-800"><?php echo $announcement['city']; ?></span>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-2">
                                    <span class="text-xs font-medium text-blue-600 uppercase tracking-wider">Actions</span>
                                    <div class="flex flex-col gap-2">
                                        <?php if ($announcement['status'] == 'active') : ?>
                                            <a href="/admin/deactivate/<?= $announcement['id'] ?>" 
                                               class="group flex items-center justify-center gap-2 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 text-sm font-medium transition-all duration-300 shadow-sm hover:shadow">
                                                <i class="fas fa-check text-xs group-hover:rotate-180 transition-transform duration-300"></i>
                                                Activer
                                            </a>
                                        <?php elseif ($announcement['status'] == 'inactive') : ?>
                                            <a href="/admin/activate/<?= $announcement['id'] ?>" 
                                               class="group flex items-center justify-center gap-2 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 text-sm font-medium transition-all duration-300 shadow-sm hover:shadow">
                                                <i class="fas fa-ban text-xs group-hover:rotate-180 transition-transform duration-300"></i>
                                                Désactiver
                                            </a>
                                        <?php endif; ?>
                                        <a href="/admin/delete/<?= $announcement['id'] ?>" 
                                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')"
                                           class="group flex items-center justify-center gap-2 px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 text-sm font-medium transition-all duration-300 shadow-sm hover:shadow">
                                            <i class="fas fa-trash text-xs group-hover:rotate-12 transition-transform duration-300"></i>
                                            Supprimer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                        endif;
                    endforeach;
                    if (!$hasDemandes) : ?>
                        <p class="text-gray-500">Aucune demande disponible</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Pagination -->
           
        </main>
    </div>
</body>

</html>
