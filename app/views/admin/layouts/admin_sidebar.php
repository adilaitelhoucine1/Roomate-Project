<aside class="fixed top-0 left-0 bg-white border-r border-gray-200 w-72 h-screen overflow-y-auto shadow-sm">
    <!-- Logo and Profile Section -->
    <div class="p-6 border-b border-gray-100">
        <div class="flex items-center justify-center mb-6">
            <h2 class="text-2xl font-bold text-blue-600">Room<span class="text-gray-800">Mate</span></h2>
        </div>
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                <i class="fas fa-user-shield text-blue-500"></i>
            </div>
            <div>
                <h3 class="text-gray-800 font-semibold">Admin YouCode</h3>
                <p class="text-sm text-gray-500">Administrateur</p>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="p-4 mb-20"> <!-- Added margin bottom to prevent overlap with footer -->
        <ul class="space-y-2">
            <!-- Dashboard -->
            <li>
                <a href="/admin/dashboard" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 rounded-xl transition-colors group">
                    <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center mr-3 group-hover:bg-blue-200">
                        <i class="fas fa-chart-pie text-blue-600"></i>
                    </div>
                    <span class="font-medium group-hover:text-blue-600">Dashboard</span>
                </a>
            </li>

            <!-- Users -->
            <li>
                <a href="/admin/users" class="flex items-center px-4 py-3 text-gray-700 hover:bg-purple-50 rounded-xl transition-colors group">
                    <div class="w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center mr-3 group-hover:bg-purple-200">
                        <i class="fas fa-users text-purple-600"></i>
                    </div>
                    <span class="font-medium group-hover:text-purple-600">Utilisateurs</span>
                </a>
            </li>

            <!-- Listings -->
            <li>
                <a href="/admin/listings" class="flex items-center px-4 py-3 text-gray-700 hover:bg-emerald-50 rounded-xl transition-colors group">
                    <div class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center mr-3 group-hover:bg-emerald-200">
                        <i class="fas fa-home text-emerald-600"></i>
                    </div>
                    <span class="font-medium group-hover:text-emerald-600">Annonces</span>
                </a>
            </li>

            <!-- Reports -->
            <li>
                <a href="/admin/reports" class="flex items-center px-4 py-3 text-gray-700 hover:bg-amber-50 rounded-xl transition-colors group">
                    <div class="w-8 h-8 rounded-lg bg-amber-100 flex items-center justify-center mr-3 group-hover:bg-amber-200">
                        <i class="fas fa-flag text-amber-600"></i>
                    </div>
                    <span class="font-medium group-hover:text-amber-600">Signalements</span>
                </a>
            </li>

            <!-- Settings -->
            <li>
                <a href="/admin/settings" class="flex items-center px-4 py-3 text-gray-700 hover:bg-indigo-50 rounded-xl transition-colors group">
                    <div class="w-8 h-8 rounded-lg bg-indigo-100 flex items-center justify-center mr-3 group-hover:bg-indigo-200">
                        <i class="fas fa-cog text-indigo-600"></i>
                    </div>
                    <span class="font-medium group-hover:text-indigo-600">Paramètres</span>
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
    <div class="fixed bottom-0 left-0 w-72 bg-white p-6 border-t border-gray-100">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                <span class="text-sm text-gray-500">En ligne</span>
            </div>
            <span class="text-xs text-gray-400">v1.0.0</span>
        </div>
    </div>
</aside>