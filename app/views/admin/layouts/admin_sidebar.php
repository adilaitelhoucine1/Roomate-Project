<aside class="fixed top-0 left-0 w-64 h-screen bg-gradient-to-b from-gray-50 to-white border-r border-gray-200 flex flex-col shadow-lg">
    <div class="flex items-center justify-center h-16 border-b border-gray-200 bg-white">
        <h1 class="text-xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">
            RoomMate Admin
        </h1>
    </div>

    <nav class="flex-1 overflow-y-auto py-6">
        <div class="px-4 space-y-3">
            <!-- Active link with gradient -->
            <a href="/admin/dashboard" class="flex items-center px-4 py-3 bg-gradient-to-r from-blue-50 to-white rounded-xl border border-blue-100 shadow-sm group transition-all duration-300">
                <i class="fas fa-chart-pie text-blue-600 mr-3 group-hover:scale-110 transition-transform duration-300"></i>
                <span class="font-medium text-blue-900">Dashboard</span>
            </a>

            <!-- Regular links with hover effects -->
            <a href="/admin/users" class="flex items-center px-4 py-3 text-gray-600 rounded-xl hover:bg-gradient-to-r hover:from-gray-50 hover:to-white group transition-all duration-300 hover:shadow-sm hover:border hover:border-gray-100">
                <i class="fas fa-users text-gray-500 mr-3 group-hover:text-blue-600 group-hover:scale-110 transition-all duration-300"></i>
                <span class="group-hover:text-gray-900">Utilisateurs</span>
            </a>

            <a href="/admin/listings" class="flex items-center px-4 py-3 text-gray-600 rounded-xl hover:bg-gradient-to-r hover:from-gray-50 hover:to-white group transition-all duration-300 hover:shadow-sm hover:border hover:border-gray-100">
                <i class="fas fa-home text-gray-500 mr-3 group-hover:text-blue-600 group-hover:scale-110 transition-all duration-300"></i>
                <span class="group-hover:text-gray-900">Annonces</span>
            </a>

            <a href="/admin/reports" class="flex items-center px-4 py-3 text-gray-600 rounded-xl hover:bg-gradient-to-r hover:from-gray-50 hover:to-white group transition-all duration-300 hover:shadow-sm hover:border hover:border-gray-100">
                <i class="fas fa-flag text-gray-500 mr-3 group-hover:text-blue-600 group-hover:scale-110 transition-all duration-300"></i>
                <span class="group-hover:text-gray-900">Signalements</span>
            </a>

            <a href="/admin/settings" class="flex items-center px-4 py-3 text-gray-600 rounded-xl hover:bg-gradient-to-r hover:from-gray-50 hover:to-white group transition-all duration-300 hover:shadow-sm hover:border hover:border-gray-100">
                <i class="fas fa-cog text-gray-500 mr-3 group-hover:text-blue-600 group-hover:scale-110 transition-all duration-300"></i>
                <span class="group-hover:text-gray-900">Paramètres</span>
            </a>
            
            <a href="/logout" class="flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 rounded-xl transition-colors group">
                <div class="w-8 h-8 rounded-lg bg-red-100 flex items-center justify-center mr-3 group-hover:bg-red-200">
                    <i class="fas fa-sign-out-alt text-red-600"></i>
                </div>
                <span class="font-medium group-hover:text-red-600">Déconnexion</span>
            </a>
        </div>
    </nav>

    <div class="border-t border-gray-200 bg-white bg-opacity-50 backdrop-blur-sm">
        <div class="p-4">
            <div class="flex items-center p-3 rounded-xl bg-gradient-to-r from-gray-50 to-white border border-gray-100 shadow-sm">
                <div class="relative">
                    <div class="absolute inset-0 bg-blue-200 rounded-full blur-md opacity-50"></div>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTY1ehZZ3OVwUWBwzrdBHWgwwuVTpgPBf65w&s" 
                         alt="Admin" 
                         class="relative w-10 h-10 rounded-full ring-2 ring-white shadow-sm">
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">Admin YouCode</p>
                    <p class="text-xs text-gray-500">admin@youcode.ma</p>
                </div>
            </div>
        </div>
    </div>
</aside>