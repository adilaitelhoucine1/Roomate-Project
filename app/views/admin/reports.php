<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Signalements - RoomMate YouCode</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <?php include('layouts/admin_sidebar.php'); ?>

        <main class="flex-1 p-8 ml-64">
            <div class="mb-10">
                <h1 class="text-3xl font-bold text-gray-900">Gestion des Signalements</h1>
                <p class="text-gray-600 mt-2">Traitement et suivi des signalements utilisateurs</p>
            </div>

            <!-- Filters Section -->
            <div class="bg-white rounded-2xl shadow-sm p-8 mb-8">
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="flex-1">
                        <input type="text" placeholder="Rechercher un signalement..." 
                               class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                    </div>
                    <div class="flex gap-4">
                        <select class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option>Tous les types</option>
                            <option>Comportement inapproprié</option>
                            <option>Contenu offensant</option>
                            <option>Spam</option>
                            <option>Autre</option>
                        </select>
                        <select class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option>Tous les status</option>
                            <option>En attente</option>
                            <option>En cours</option>
                            <option>Résolu</option>
                            <option>Rejeté</option>
                        </select>
                        <button class="px-6 py-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition-colors font-medium">
                            Filtrer
                        </button>
                    </div>
                </div>
            </div>

            <!-- Reports Table -->
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Signalé par</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Type</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Description</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <img class="h-10 w-10 rounded-xl object-cover" src="https://st3.depositphotos.com/4060975/17707/v/450/depositphotos_177073010-stock-illustration-male-vector-icon.jpg" alt="">
                                    <div class="ml-4">
                                        <div class="text-sm font-semibold text-gray-900">Karim Benkhira</div>
                                        <div class="text-sm text-gray-500">@karim.b</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-rose-100 text-rose-800">
                                    Comportement inapproprié
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm text-gray-900 max-w-xs truncate">
                                    Utilisateur ayant un comportement agressif dans les commentaires...
                                </p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-amber-100 text-amber-800">
                                    En attente
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                02/01/2024
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-3">
                                    <button class="p-2 hover:bg-gray-100 rounded-lg transition-colors" title="Voir les détails" onclick="openModal(1)">
                                        <i class="fas fa-eye text-indigo-600"></i>
                                    </button>
                                    <button class="p-2 hover:bg-gray-100 rounded-lg transition-colors" title="Marquer comme résolu">
                                        <i class="fas fa-check text-emerald-600"></i>
                                    </button>
                                    <button class="p-2 hover:bg-gray-100 rounded-lg transition-colors" title="Rejeter">
                                        <i class="fas fa-times text-rose-600"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Report Detail Modal -->
            <div id="reportModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center">
                <div class="bg-white rounded-2xl shadow-xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl font-bold text-gray-900">Détails du Signalement</h3>
                            <button onclick="closeModal()" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                                <i class="fas fa-times text-gray-500"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="p-6 space-y-6">
                        <!-- Reporter Info -->
                        <div class="flex items-center space-x-4">
                            <img class="h-12 w-12 rounded-xl object-cover" src="https://st3.depositphotos.com/4060975/17707/v/450/depositphotos_177073010-stock-illustration-male-vector-icon.jpg" alt="" id="reporterImage">
                            <div>
                                <h4 class="font-semibold text-gray-900" id="reporterName">Karim Benkhira</h4>
                                <p class="text-sm text-gray-500" id="reportDate">Signalé le 02/01/2024</p>
                            </div>
                        </div>

                        <!-- Report Details -->
                        <div class="space-y-6">
                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                <label class="block text-xs font-semibold uppercase tracking-wider text-gray-500 mb-2">Type de Signalement</label>
                                <div class="flex items-center">
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-medium bg-rose-100 text-rose-800 border border-rose-200">
                                        <i class="fas fa-exclamation-circle mr-2"></i>
                                        <span id="reportType">Comportement inapproprié</span>
                                    </span>
                                </div>
                            </div>
                            
                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                <label class="block text-xs font-semibold uppercase tracking-wider text-gray-500 mb-2">Description Complète</label>
                                <div class="bg-white rounded-lg p-4 border border-gray-200">
                                    <p id="reportDescription" class="text-gray-700 leading-relaxed">
                                        L'utilisateur a eu un comportement agressif dans les commentaires. Il a utilisé un langage inapproprié et a fait des menaces envers d'autres utilisateurs.
                                    </p>
                                    <div class="mt-4 pt-4 border-t border-gray-100">
                                        <div class="flex items-center text-sm text-gray-500">
                                            <i class="fas fa-calendar-alt mr-2"></i>
                                            <span>Signalé le: <span id="reportDateTime" class="font-medium">02/01/2024 à 14:30</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Status Update -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Mettre à jour le statut</label>
                                <select id="statusUpdate" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="pending">En attente</option>
                                    <option value="resolved">Résolu</option>
                                    <option value="rejected">Rejeté</option>
                                </select>
                            </div>

                            <!-- Admin Note -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Note administrative</label>
                                <textarea id="adminNote" rows="3" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Ajouter une note concernant ce signalement..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-100 flex justify-end gap-4">
                        <button onclick="closeModal()" class="px-4 py-2 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                            Annuler
                        </button>
                        <button onclick="updateReportStatus()" class="px-6 py-2 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition-colors">
                            Sauvegarder
                        </button>
                    </div>
                </div>
            </div>

            <script>
                function openModal(reportId) {
                    // Fetch report details using reportId and populate modal
                    document.getElementById('reportModal').classList.remove('hidden');
                    document.getElementById('reportModal').classList.add('flex');
                    // Example data population
                    document.getElementById('reportType').textContent = 'Comportement inapproprié';
                    document.getElementById('reportDescription').textContent = 'L\'utilisateur a eu un comportement agressif dans les commentaires. Il a utilisé un langage inapproprié et a fait des menaces envers d\'autres utilisateurs.';
                }

                function closeModal() {
                    document.getElementById('reportModal').classList.add('hidden');
                    document.getElementById('reportModal').classList.remove('flex');
                }

                function updateReportStatus() {
                    const status = document.getElementById('statusUpdate').value;
                    const note = document.getElementById('adminNote').value;
                    // Add your API call here to update the report status
                    console.log('Updating status to:', status);
                    console.log('Admin note:', note);
                    closeModal();
                }
            </script>

            <!-- Pagination -->
            <div class="mt-8 flex justify-between items-center">
                <div class="text-sm text-gray-600">
                    Affichage de 1 à 10 sur 23 signalements
                </div>
                <nav class="flex items-center gap-2">
                    <button class="px-4 py-2 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">Précédent</button>
                    <button class="px-4 py-2 bg-indigo-600 text-white rounded-xl">1</button>
                    <button class="px-4 py-2 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">2</button>
                    <button class="px-4 py-2 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">3</button>
                    <button class="px-4 py-2 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">Suivant</button>
                </nav>
            </div>
        </main>
    </div>
</body>
</html>
