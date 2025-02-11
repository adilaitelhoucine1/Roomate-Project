<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - RoomMate YouCode</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold text-center mb-6">Connexion</h2>
            
            <form class="space-y-4">
                <div>
                    <label class="block text-gray-700 mb-2" for="email">
                        Email YouCode
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="prenom.nom@youcode.ma"
                        required
                    >
                </div>

                <div>
                    <label class="block text-gray-700 mb-2" for="password">
                        Mot de passe
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    >
                </div>

                <button 
                    type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700"
                >
                    Se connecter
                </button>
            </form>

            <p class="mt-4 text-center text-gray-600">
                Pas encore de compte? 
                <a href="register.html" class="text-blue-600 hover:text-blue-700">
                    S'inscrire
                </a>
            </p>
        </div>
    </div>
</body>
</html>