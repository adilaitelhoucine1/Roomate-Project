<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - RoomMate YouCode</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <?php include('layouts/admin_sidebar.php'); ?>

        <main class="flex-1 p-8 ml-64">
            <div class="mb-10">
                <h1 class="text-3xl font-bold text-gray-900">Dashboard Administrateur</h1>
                <p class="text-gray-600 mt-2">Bienvenue sur votre espace de gestion RoomMate YouCode</p>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="p-4 bg-indigo-100 rounded-xl">
                            <i class="fas fa-users text-2xl text-indigo-600"></i>
                        </div>
                        <div>
                            <h2 class="text-sm font-medium text-gray-500">Utilisateurs Total</h2>
                            <p class="text-3xl font-bold text-gray-900 mt-1"><?php echo $totalUsers; ?></p>
                            <p class="text-sm text-indigo-600 mt-2">+12% ce mois</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="p-4 bg-emerald-100 rounded-xl">
                            <i class="fas fa-home text-2xl text-emerald-600"></i>
                        </div>
                        <div>
                            <h2 class="text-sm font-medium text-gray-500">Total Annonces</h2>
                            <p class="text-3xl font-bold text-gray-900 mt-1"><?php echo $totalAnnouncements; ?></p>
                            <p class="text-sm text-emerald-600 mt-2">+5 aujourd'hui</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="p-4 bg-blue-100 rounded-xl">
                            <i class="fas fa-check-circle text-2xl text-blue-600"></i>
                        </div>
                        <div>
                            <h2 class="text-sm font-medium text-gray-500">Annonces actives</h2>
                            <p class="text-3xl font-bold text-gray-900 mt-1"><?php echo $totalAnnouncementsActive; ?></p>
                            <p class="text-sm text-blue-600 mt-2">+3 cette semaine</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="p-4 bg-rose-100 rounded-xl">
                            <i class="fas fa-flag text-2xl text-rose-600"></i>
                        </div>
                        <div>
                            <h2 class="text-sm font-medium text-gray-500">Signalements</h2>
                            <p class="text-3xl font-bold text-gray-900 mt-1"><?php echo $totalSignals; ?></p>
                            <p class="text-sm text-rose-600 mt-2">2 en attente</p>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</body>

</html>