<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RoomMate YouCode</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    
    <header class="bg-white shadow-sm">
        <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">RoomMate YouCode</h1>
            <div class="space-x-4">
                <a href="login.html" class="text-gray-600 hover:text-blue-600">Connexion</a>
                <a href="register.html" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                    Inscription
                </a>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">
                Trouvez votre colocataire idéal à YouCode
            </h2>
            <p class="text-xl text-gray-600">
                La plateforme dédiée aux étudiants de YouCode pour une colocation réussie
            </p>
        </div>

        <!-- Features Grid -->
        <div class="grid md:grid-cols-2 gap-8 mt-12">
            <!-- Card 1 -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">J'ai un Logement</h3>
                <p class="text-gray-600 mb-4">
                    Publiez votre annonce et trouvez les colocataires qui vous correspondent
                </p>
                <a href="register.html" class="text-blue-600 hover:text-blue-700">
                    Publier une annonce →
                </a>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Je cherche un Logement</h3>
                <p class="text-gray-600 mb-4">
                    Trouvez le logement et les colocataires qui correspondent à vos critères
                </p>
                <a href="register.html" class="text-blue-600 hover:text-blue-700">
                    Rechercher un logement →
                </a>
            </div>
        </div>
    </main>
</body>
</html>