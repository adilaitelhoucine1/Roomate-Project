<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Utilisateurs - RoomMate YouCode</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100">
    <div class="flex">
        <?php include('layouts/admin_sidebar.php'); ?>

        <main class="flex-1 p-8 ml-64">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">
                        Modération des Utilisateurs
                    </h1>
                    <p class="text-gray-600 mt-1">Centre de contrôle pour la gestion et modération des utilisateurs</p>
                </div>
                <button class="px-6 py-2.5 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl hover:shadow-lg transition-all duration-300 flex items-center gap-2 group">
                    <i class="fas fa-user-slash group-hover:rotate-12 transition-transform"></i>
                    Utilisateurs signalés
                    <span class="ml-2 bg-red-400 bg-opacity-50 backdrop-blur-sm px-2 py-0.5 rounded-full text-sm">3</span>
                </button>
            </div>

            <!-- Enhanced Filters Section -->
            <div class="bg-gradient-to-r from-gray-50 to-white rounded-xl border border-gray-200 p-6 mb-8 shadow-sm">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <input type="text" placeholder="Rechercher par nom, email ou identifiant..." 
                               class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 shadow-sm">
                    </div>
                    <div class="flex gap-4">
                        <select class="px-4 py-2.5 bg-white border border-gray-200 rounded-lg shadow-sm">
                            <option>Tous les rôles</option>
                            <option>Administrateur</option>
                            <option>Modérateur</option>
                            <option>Utilisateur</option>
                        </select>
                        <select class="px-4 py-2.5 bg-white border border-gray-200 rounded-lg shadow-sm">
                            <option>Tous les statuts</option>
                            <option>Actif</option>
                            <option>Suspendu</option>
                            <option>Banni</option>
                        </select>
                        <button class="px-6 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:shadow-lg transition-all duration-300 flex items-center gap-2">
                            <i class="fas fa-filter"></i>
                            Filtrer
                        </button>
                    </div>
                </div>
            </div>

            <!-- Enhanced Users Table -->

            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-gray-50 to-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Utilisateur</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rôle</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dernière activité</th>
                            <th class="px-6 py-4 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                    <?php foreach ($AllUsers as $user) { ?>

                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="relative">
                                        <div class="absolute inset-0 bg-blue-200 rounded-full blur-md opacity-50"></div>
                                        <img class="relative h-10 w-10 rounded-full ring-2 ring-white shadow-sm" 
                                             src="<?= $user["profile_photo"]; ?>" alt="">
                                        <span class="absolute bottom-0 right-0 h-3 w-3 rounded-full bg-green-400 border-2 border-white shadow-sm"></span>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-semibold text-gray-900"><?= $user["fullname"]; ?></div>
                                        <div class="text-xs text-gray-500">ID: #<?= $user["id"]; ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900"><?= $user["email"]; ?></div>
                                <!-- <div class="text-xs text-gray-500">+212 612345678</div> -->
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-medium bg-gradient-to-r from-purple-50 to-purple-100 text-purple-800 border border-purple-200">
                                    <i class="fas fa-user-shield mr-1.5"></i>
                                    <?= $user["role"]; ?>
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-medium bg-gradient-to-r from-green-50 to-green-100 text-green-800 border border-green-200">
                                    <i class="fas fa-check-circle mr-1.5"></i>
                                    <?= $user["status"]; ?>
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">Il y a 2 heures</div>
                                <div class="text-xs text-gray-500 flex items-center gap-1">
                                    <i class="fas fa-flag text-red-400"></i>
                                    3 signalements
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                   <form action="/admin/users" method="post">
                                    <input type="hidden" name="user_id" value="<?= $user["id"]; ?>">
                                   <button name="deleteuser" class="p-1.5 rounded-lg hover:bg-blue-50 text-blue-600 transition-colors" title="delete user">
                                    <i class="fas fa-user-times"></i>
                                    </button>
                                    </form>

                                    <!-- <button class="p-1.5 rounded-lg hover:bg-yellow-50 text-yellow-600 transition-colors" title="Suspendre">
                                        <i class="fas fa-user-clock"></i>
                                    </button> -->
                                    <form action="/admin/change_status" method="post">

                            <button name="block_user" class="p-1.5 rounded-lg hover:bg-red-50 text-red-600 transition-colors" title="Bannir">
                                <input type="hidden" name="status" value=" <?= $user["status"]; ?>">
                                <input type="hidden" name="id" value=" <?= $user["id"]; ?>">

                                    <?php if( $user["status"]== "inactive"){
                                         ?>
                                    <i class="fas fa-user-slash"></i>

                                    <?php }else{ ?>
                                        <i class="fas fa-user-shield"></i>

                                    <?php } ?>

                                    </button>
                                    </form>



                                    <!-- <button class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-600 transition-colors" title="user's detail info">
                                        <i class="fas fa-user-tag"></i></button> -->
                                </div>
                            </td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>


            <!-- Enhanced Pagination -->
            <div class="mt-8 flex justify-between items-center">
                <div class="text-sm text-gray-500">
                    Affichage de 1 à 10 sur 45 utilisateurs
                </div>
                <nav class="flex items-center gap-2">
                    <button class="px-4 py-2 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">Précédent</button>
                    <button class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg shadow-sm">1</button>
                    <button class="px-4 py-2 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">2</button>
                    <button class="px-4 py-2 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">3</button>
                    <button class="px-4 py-2 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">Suivant</button>
                </nav>
            </div>
        </main>
    </div>
</body>
</html>
