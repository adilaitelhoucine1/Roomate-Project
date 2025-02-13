<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - RoomMate</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="flex">
        <?php include('layouts/sidebar.php'); ?>

        <main class="flex-1 flex">
            <!-- Contacts List -->
            <div class="w-1/3 border-r border-gray-200 bg-white">
                <!-- Search -->
                <div class="p-4 border-b">
                    <div class="relative">
                        <input type="text" 
                               placeholder="Rechercher une conversation..." 
                               class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>

                <!-- Contacts -->
                <div class="overflow-y-auto h-[calc(100vh-5rem)]">
                    <!-- Active Contact -->
                    <div class="p-4 bg-blue-50 border-l-4 border-blue-500 cursor-pointer">
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                                    <i class="fas fa-user text-blue-500"></i>
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-sm font-semibold text-gray-800">Sarah Amrani</h3>
                                <p class="text-sm text-gray-500 truncate">À propos du studio...</p>
                            </div>
                            <div class="text-right">
                                <span class="text-xs text-gray-400">14:23</span>
                                <div class="mt-1 w-5 h-5 bg-blue-500 rounded-full text-white text-xs flex items-center justify-center">
                                    2
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Other Contacts -->
                    <div class="p-4 hover:bg-gray-50 cursor-pointer">
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center">
                                    <i class="fas fa-user text-purple-500"></i>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-sm font-semibold text-gray-800">Karim Alami</h3>
                                <p class="text-sm text-gray-500 truncate">Merci pour les informations</p>
                            </div>
                            <div class="text-right">
                                <span class="text-xs text-gray-400">Hier</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chat Area -->
            <div class="flex-1 flex flex-col">
                <!-- Chat Header -->
                <div class="p-4 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                                    <i class="fas fa-user text-blue-500"></i>
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></div>
                            </div>
                            <div>
                                <h2 class="text-sm font-semibold text-gray-800">Sarah Amrani</h2>
                                <p class="text-xs text-green-500">En ligne</p>
                            </div>
                        </div>
                        <button class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                    </div>
                </div>

                <!-- Messages -->
                <div class="flex-1 overflow-y-auto p-4 space-y-4">
                    <!-- Received Message -->
                    <div class="flex items-end space-x-2">
                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-user text-blue-500 text-sm"></i>
                        </div>
                        <div class="max-w-md bg-white rounded-lg rounded-bl-none p-4 shadow-sm">
                            <p class="text-gray-700">Bonjour, je suis intéressée par votre studio. Est-il toujours disponible ?</p>
                            <span class="text-xs text-gray-400 mt-1">14:20</span>
                        </div>
                    </div>

                    <!-- Sent Message -->
                    <div class="flex items-end justify-end space-x-2">
                        <div class="max-w-md bg-blue-500 text-white rounded-lg rounded-br-none p-4">
                            <p>Oui, il est toujours disponible ! Quand souhaitez-vous le visiter ?</p>
                            <span class="text-xs text-blue-100 mt-1">14:22</span>
                        </div>
                    </div>
                </div>

                <!-- Message Input -->
                <div class="p-4 bg-white border-t border-gray-200">
                    <div class="flex items-center space-x-2">
                        <button class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-paperclip"></i>
                        </button>
                        <input type="text" 
                               placeholder="Écrivez votre message..." 
                               class="flex-1 px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html> 