<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit();
}
?>

<!-- Sidebar -->
<aside class="w-64 bg-white border-r border-gray-200 min-h-screen">
    <!-- Logo -->
    <div class="p-6 border-b">
        <a href="/student/dashboard" class="flex items-center justify-center">
            <span class="text-2xl font-bold">
                <span class="text-blue-600">Room</span><span class="text-gray-800">Mate</span>
                <i class="fas fa-home text-blue-600 ml-2"></i>
            </span>
        </a>
    </div>

    <!-- User Profile -->
    <div class="p-4 border-b">
        <div class="flex items-center space-x-3">
            <div class="relative">
                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-500 to-blue-600 flex items-center justify-center">
                    <i class="fas fa-user text-white"></i>
                </div>
                <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></div>
            </div>
            <div>
                <h3 class="text-sm font-semibold text-gray-800"><?php echo $_SESSION['user_name']; ?></h3>
                <span class="text-xs text-gray-500">Étudiant</span>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="p-4 space-y-2">
        <a href="/student/dashboard" 
           class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 group transition-all duration-200 <?= str_contains($_SERVER['REQUEST_URI'], '/dashboard') ? 'bg-blue-50 text-blue-600' : 'text-gray-600' ?>">
            <div class="w-10 h-10 rounded-lg bg-blue-100 group-hover:bg-blue-200 flex items-center justify-center transition-all duration-200">
            <i class="fas fa-home text-blue-600"></i>
            </div>
            <span class="font-medium">Dashboard</span>
        </a>
        <a href="/student/announcements" 
           class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 group transition-all duration-200 <?= str_contains($_SERVER['REQUEST_URI'], '/student/announcements') ? 'bg-blue-50 text-blue-600' : 'text-gray-600' ?>">
            <div class="w-10 h-10 rounded-lg bg-blue-100 group-hover:bg-blue-200 flex items-center justify-center transition-all duration-200">
            <i class="fas fa-home text-blue-600"></i>
            </div>
            <span class="font-medium group-hover:text-purple-600">Mes Annonces</span>
                </a>

        <a href="/student/search" 
           class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 group transition-all duration-200 <?= str_contains($_SERVER['REQUEST_URI'], '/search') ? 'bg-purple-50 text-purple-600' : 'text-gray-600' ?>">
            <div class="w-10 h-10 rounded-lg bg-purple-100 group-hover:bg-purple-200 flex items-center justify-center transition-all duration-200">
            <i class="fas fa-bullhorn text-purple-600"></i>
            </div>
            <span class="font-medium">Rechercher</span>
        </a>

        <a href="/student/messages" 
           class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 group transition-all duration-200 <?= str_contains($_SERVER['REQUEST_URI'], '/messages') ? 'bg-amber-50 text-amber-600' : 'text-gray-600' ?>">
            <div class="w-10 h-10 rounded-lg bg-amber-100 group-hover:bg-amber-200 flex items-center justify-center transition-all duration-200">
            <i class="fas fa-search text-emerald-600"></i>
            </div>
            <span class="font-medium">Messages</span>
            <span class="ml-auto bg-red-100 text-red-600 text-xs font-medium px-2 py-1 rounded-full">3</span>
        </a>

        <a href="/student/profile" 
           class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 group transition-all duration-200 <?= str_contains($_SERVER['REQUEST_URI'], '/profile') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-600' ?>">
            <div class="w-10 h-10 rounded-lg bg-indigo-100 group-hover:bg-indigo-200 flex items-center justify-center transition-all duration-200">
            <i class="fas fa-comments text-amber-600"></i>
            </div>
            <span class="font-medium">Profil</span>
        </a>


        <a href="/logout" 
           class="flex items-center space-x-3 p-3 rounded-lg hover:bg-red-50 group transition-all duration-200 text-gray-600">
            <div class="w-10 h-10 rounded-lg bg-red-100 group-hover:bg-red-200 flex items-center justify-center transition-all duration-200">
                <i class="fas fa-sign-out-alt text-red-600"></i>
            </div>
            <span class="font-medium group-hover:text-red-600">Déconnexion</span>
        </a>

        <!-- <div class="absolute bottom-0 w-full p-4 border-t">
            <a href="/logout" 
               class="flex items-center space-x-3 p-3 rounded-lg hover:bg-red-50 group transition-all duration-200 text-gray-600">
                <div class="w-10 h-10 rounded-lg bg-red-100 group-hover:bg-red-200 flex items-center justify-center transition-all duration-200">
                    <i class="fas fa-sign-out-alt text-red-600"></i>
                </div>
                <span class="font-medium group-hover:text-red-600">Déconnexion</span>
            </a>
        </div> -->
    </nav>

    <!-- Logout Button -->
</aside> 