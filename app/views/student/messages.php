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
    <div class="flex h-screen">
        <?php include('layouts/sidebar.php'); ?>

        <main class="flex-1 flex overflow-hidden ml-64">
            <!-- Contacts List -->
            <div class="w-1/3 border-r border-gray-200 bg-white flex flex-col">
                <!-- Search -->
                <div class="p-4 border-b border-gray-200">
                    <div class="relative">
                        <input type="text" 
                               placeholder="Rechercher une conversation..." 
                               class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>

                <!-- Contacts -->
                <div class="flex-1 overflow-y-auto">
                    <?php if (!empty($conversations)): ?>
                        <?php foreach($conversations as $conv): ?>
                            <a href="/student/messages?user=<?= $conv['id'] ?>" 
                               class="block p-4 hover:bg-gray-50 border-b border-gray-100">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                                        <i class="fas fa-user text-blue-500"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-sm font-semibold text-gray-800 truncate">
                                            <?= htmlspecialchars($conv['fullname']) ?>
                                        </h3>
                                        <p class="text-sm text-gray-500 truncate">
                                            <?= htmlspecialchars($conv['last_message'] ?? 'Nouvelle conversation') ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="p-4 text-center text-gray-500">
                            Aucune conversation
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Chat Area -->
            <div class="flex-1 flex flex-col bg-gray-50">
                <!-- Chat Header -->
                <div class="p-4 bg-white border-b border-gray-200">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-user text-blue-500"></i>
                        </div>
                        <h2 class="text-lg font-semibold text-gray-800">
                            <?= isset($activeConversation) ? htmlspecialchars($activeConversation['fullname']) : 'Messages' ?>
                        </h2>
                    </div>
                </div>

                <!-- Messages -->
                <div class="flex-1 overflow-y-auto p-4 space-y-4">
                    <?php if (!empty($messages)): ?>
                        <?php foreach($messages as $msg): ?>
                            <div class="flex <?= $msg['sender_id'] == $_SESSION['user_id'] ? 'justify-end' : 'justify-start' ?>">
                                <div class="max-w-md <?= $msg['sender_id'] == $_SESSION['user_id'] ? 'bg-blue-500 text-white' : 'bg-white' ?> rounded-lg p-3 shadow-sm">
                                    <p><?= htmlspecialchars($msg['content']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- Message Input -->
                <div class="p-4 bg-white border-t border-gray-200">
                    <form action="/student/messages/send" method="POST" class="flex space-x-2">
                        <input type="hidden" name="receiver_id" value="<?= $activeConversation['id'] ?? $conversations[0]['id'] ?? '' ?>">
                        <input type="text" 
                               name="content"
                               required
                               placeholder="Écrivez votre message..." 
                               class="flex-1 px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button type="submit" 
                                class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                            Envoyer
                        </button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html> 