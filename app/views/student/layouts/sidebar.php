<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit();
}
?>

<aside class="bg-white border-r border-gray-200 w-72 min-h-screen shadow-sm">
    <!-- Logo and Profile Section -->
    <div class="p-6 border-b border-gray-100">
        <div class="flex items-center justify-center mb-6">
            <h2 class="text-2xl font-bold text-blue-600">Room<span class="text-gray-800">Mate</span></h2>
        </div>
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                <i class="fas fa-user text-blue-500"></i>
            </div>
            <div>
                <h3 class="text-gray-800 font-semibold">John Doe</h3>
                <p class="text-sm text-gray-500">Étudiant</p>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="p-4">
        <ul class="space-y-2">
            <!-- Dashboard -->
            <li>
                <a href="/student/dashboard" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 rounded-xl transition-colors group">
                    <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center mr-3 group-hover:bg-blue-200">
                        <i class="fas fa-home text-blue-600"></i>
                    </div>
                    <span class="font-medium group-hover:text-blue-600">Dashboard</span>
                </a>
            </li>

            <!-- Mes Annonces -->
            <li>
                <a href="/student/announcements" class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-colors group">
                    <div class="w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center mr-3 group-hover:bg-purple-200">
                        <i class="fas fa-bullhorn text-purple-600"></i>
                    </div>
                    <span class="font-medium group-hover:text-purple-600">Mes Annonces</span>
                </a>
            </li>

            <!-- Rechercher -->
            <li>
                <a href="/student/search" class="flex items-center px-4 py-3 text-gray-700 hover:bg-emerald-50 rounded-xl transition-colors group">
                    <div class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center mr-3 group-hover:bg-emerald-200">
                        <i class="fas fa-search text-emerald-600"></i>
                    </div>
                    <span class="font-medium group-hover:text-emerald-600">Rechercher</span>
                </a>
            </li>

            <!-- Messages -->
            <li>
                <a href="/student/messages" class="flex items-center px-4 py-3 text-gray-700 hover:bg-amber-50 rounded-xl transition-colors group">
                    <div class="w-8 h-8 rounded-lg bg-amber-100 flex items-center justify-center mr-3 group-hover:bg-amber-200">
                        <i class="fas fa-comments text-amber-600"></i>
                    </div>
                    <span class="font-medium group-hover:text-amber-600">Messages</span>
                    <span class="ml-auto bg-red-100 text-red-600 text-xs font-medium px-2 py-1 rounded-full">3</span>
                </a>
            </li>

            <!-- Profile -->
            <li>
                <a href="/student/profile" class="flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 rounded-xl transition-colors group">
                    <div class="w-8 h-8 rounded-lg bg-indigo-100 flex items-center justify-center mr-3 group-hover:bg-indigo-200">
                        <i class="fas fa-user text-indigo-600"></i>
                    </div>
                    <span class="font-medium group-hover:text-indigo-600">Profile</span>
                </a>
            </li>
        </ul>

        <!-- Logout Button -->
        <div class="mt-8 px-4">
            <a href="/logout" class="flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 rounded-xl transition-colors group">
                <div class="w-8 h-8 rounded-lg bg-red-100 flex items-center justify-center mr-3 group-hover:bg-red-200">
                    <i class="fas fa-sign-out-alt text-red-600"></i>
                </div>
                <span class="font-medium group-hover:text-red-600">Déconnexion</span>
            </a>
        </div>
    </nav>

    <!-- Footer -->
    <div class="absolute bottom-0 w-full p-6 border-t border-gray-100">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                <span class="text-sm text-gray-500">En ligne</span>
            </div>
            <span class="text-xs text-gray-400">v1.0.0</span>
        </div>
    </div>
</aside> 