<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Custom styles */
        .category-card {
            transition: all 0.3s ease;
        }
        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .admin-panel {
            display: none;
        }
        .show-admin {
            display: block;
        }
        /* Animation for modals */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .modal-animation {
            animation: fadeIn 0.3s ease-out;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-blue-600 text-white shadow-lg">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <div class="text-2xl font-bold">CategoryHub</div>
                <div>
                    <button id="toggleView" class="bg-blue-700 px-4 py-2 rounded-lg hover:bg-blue-800 transition">
                        <i class="fas fa-shield-alt mr-2"></i>Admin
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- User Category Page -->
    <div id="userView">
        <div class="container mx-auto px-4 py-8">
            <!-- Hero Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Explore Categories</h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Browse through our extensive collection of categories to find what you need.</p>
            </div>

            <!-- Category Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" id="categoryGrid">
                <!-- Categories will be loaded here -->
            </div>

            <!-- Empty State -->
            <div id="emptyState" class="text-center py-12 hidden">
                <i class="fas fa-folder-open text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-2xl font-medium text-gray-500 mb-2">No Categories Found</h3>
                <p class="text-gray-400">There are currently no categories available.</p>
            </div>
        </div>
    </div>

    <!-- Admin Panel (Hidden by default) -->
    <div id="adminView" class="admin-panel">
        <div class="container mx-auto px-4 py-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Category Management</h1>
                <button id="addCategoryBtn" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                    <i class="fas fa-plus mr-2"></i>Add Category
                </button>
            </div>

            <!-- Admin Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">API Code</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="adminCategoryTable">
                        <!-- Categories will be loaded here -->
                    </tbody>
                </table>

                <!-- Empty State -->
                <div id="adminEmptyState" class="text-center py-12 hidden">
                    <i class="fas fa-tasks text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-2xl font-medium text-gray-500 mb-2">No Categories Exist</h3>
                    <p class="text-gray-400">Start by adding your first category.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Category Modal -->
    <div id="categoryModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md modal-animation">
            <div class="border-b px-6 py-4 flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-800" id="modalTitle">Add Category</h3>
                <button id="closeModal" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-6">
                <form id="categoryForm">
                    <input type="hidden" id="categoryId" value="">
                    <div class="mb-4">
                        <label for="categoryName" class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                        <input type="text" id="categoryName" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="apiCode" class="block text-sm font-medium text-gray-700 mb-1">API Code</label>
                        <input type="text" id="apiCode" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="categoryLogo" class="block text-sm font-medium text-gray-700 mb-1">Logo (URL)</label>
                        <input type="text" id="categoryLogo" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="https://example.com/logo.png">
                    </div>
                </form>
            </div>
            <div class="border-t px-6 py-4 flex justify-end space-x-3">
                <button id="cancelModal" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancel</button>
                <button id="submitModal" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Save</button>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md modal-animation">
            <div class="border-b px-6 py-4 flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-800">Confirm Delete</h3>
                <button id="closeDeleteModal" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-6">
                <p class="text-gray-700">Are you sure you want to delete this category? This action cannot be undone.</p>
                <input type="hidden" id="deleteCategoryId" value="">
            </div>
            <div class="border-t px-6 py-4 flex justify-end space-x-3">
                <button id="cancelDelete" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancel</button>
                <button id="confirmDelete" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
            </div>
        </div>
    </div>

    <script>
        // Sample data - in a real app, this would come from an API
        let categories = [
            { id: 1, name: 'Technology', apiCode: 'tech', icon: 'microchip' },
            { id: 2, name: 'Business', apiCode: 'biz', icon: 'briefcase' },
            { id: 3, name: 'Science', apiCode: 'sci', icon: 'flask' },
            { id: 4, name: 'Health', apiCode: 'health', icon: 'heartbeat' },
            { id: 5, name: 'Sports', apiCode: 'sports', icon: 'running' },
            { id: 6, name: 'Entertainment', apiCode: 'ent', icon: 'film' },
        ];

        // DOM Elements
        const toggleViewBtn = document.getElementById('toggleView');
        const userView = document.getElementById('userView');
        const adminView = document.getElementById('adminView');
        const addCategoryBtn = document.getElementById('addCategoryBtn');
        const categoryModal = document.getElementById('categoryModal');
        const closeModal = document.getElementById('closeModal');
        const cancelModal = document.getElementById('cancelModal');
        const submitModal = document.getElementById('submitModal');
        const categoryForm = document.getElementById('categoryForm');
        const deleteModal = document.getElementById('deleteModal');
        const closeDeleteModal = document.getElementById('closeDeleteModal');
        const cancelDelete = document.getElementById('cancelDelete');
        const confirmDelete = document.getElementById('confirmDelete');
        const categoryGrid = document.getElementById('categoryGrid');
        const adminCategoryTable = document.getElementById('adminCategoryTable');
        const emptyState = document.getElementById('emptyState');
        const adminEmptyState = document.getElementById('adminEmptyState');

        // Current mode (user or admin)
        let isAdminMode = false;

        // Initialize the app
        function init() {
            renderCategories();
            renderAdminCategories();
            setupEventListeners();
            checkEmptyStates();
        }

        // Set up event listeners
        function setupEventListeners() {
            // Toggle between user and admin views
            toggleViewBtn.addEventListener('click', toggleView);

            // Add category button
            addCategoryBtn.addEventListener('click', () => openModal('add'));

            // Modal buttons
            closeModal.addEventListener('click', () => categoryModal.classList.add('hidden'));
            cancelModal.addEventListener('click', () => categoryModal.classList.add('hidden'));
            closeDeleteModal.addEventListener('click', () => deleteModal.classList.add('hidden'));
            cancelDelete.addEventListener('click', () => deleteModal.classList.add('hidden'));

            // Submit form
            submitModal.addEventListener('click', handleSubmit);

            // Delete confirmation
            confirmDelete.addEventListener('click', handleDelete);
        }

        // Toggle between user and admin views
        function toggleView() {
            isAdminMode = !isAdminMode;
            if (isAdminMode) {
                userView.classList.add('hidden');
                adminView.classList.remove('admin-panel');
                adminView.classList.add('show-admin');
                toggleViewBtn.innerHTML = '<i class="fas fa-user mr-2"></i>User View';
            } else {
                userView.classList.remove('hidden');
                adminView.classList.add('admin-panel');
                adminView.classList.remove('show-admin');
                toggleViewBtn.innerHTML = '<i class="fas fa-shield-alt mr-2"></i>Admin';
            }
        }

        // Render categories for user view
        function renderCategories() {
            categoryGrid.innerHTML = '';

            if (categories.length === 0) {
                emptyState.classList.remove('hidden');
                return;
            }

            categories.forEach(category => {
                const categoryCard = document.createElement('div');
                categoryCard.className = 'category-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg';
                categoryCard.innerHTML = `
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-${category.icon} text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">${category.name}</h3>
                        <p class="text-blue-600 text-sm font-medium">API: ${category.apiCode}</p>
                    </div>
                `;
                categoryGrid.appendChild(categoryCard);
            });
        }

        // Render categories for admin view
        function renderAdminCategories() {
            adminCategoryTable.innerHTML = '';

            if (categories.length === 0) {
                adminEmptyState.classList.remove('hidden');
                return;
            }

            categories.forEach(category => {
                const row = document.createElement('tr');
                row.className = 'hover:bg-gray-50';
                row.innerHTML = `
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${category.id}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${category.name}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${category.apiCode}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                        <button class="text-blue-600 hover:text-blue-900 edit-btn" data-id="${category.id}">Edit</button>
                        <button class="text-red-600 hover:text-red-900 delete-btn" data-id="${category.id}">Delete</button>
                    </td>
                `;
                adminCategoryTable.appendChild(row);
            });

            // Add event listeners to edit and delete buttons
            document.querySelectorAll('.edit-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const id = parseInt(btn.getAttribute('data-id'));
                    openModal('edit', id);
                });
            });

            document.querySelectorAll('.delete-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const id = parseInt(btn.getAttribute('data-id'));
                    document.getElementById('deleteCategoryId').value = id;
                    deleteModal.classList.remove('hidden');
                });
            });
        }

        // Open modal for adding or editing
        function openModal(action, id = null) {
            const modalTitle = document.getElementById('modalTitle');
            const categoryIdInput = document.getElementById('categoryId');
            const nameInput = document.getElementById('categoryName');
            const apiInput = document.getElementById('apiCode');

            if (action === 'add') {
                modalTitle.textContent = 'Add Category';
                categoryIdInput.value = '';
                nameInput.value = '';
                apiInput.value = '';
            } else if (action === 'edit' && id) {
                modalTitle.textContent = 'Edit Category';
                const category = categories.find(c => c.id === id);
                if (category) {
                    categoryIdInput.value = category.id;
                    nameInput.value = category.name;
                    apiInput.value = category.apiCode;
                }
            }

            categoryModal.classList.remove('hidden');
        }

        // Handle form submission
        function handleSubmit() {
            const id = document.getElementById('categoryId').value;
            const name = document.getElementById('categoryName').value.trim();
            const apiCode = document.getElementById('apiCode').value.trim();

            if (!name || !apiCode) {
                alert('Please fill in all fields');
                return;
            }

            if (id) {
                // Edit existing category
                const index = categories.findIndex(c => c.id === parseInt(id));
                if (index !== -1) {
                    categories[index] = { ...categories[index], name, apiCode };
                }
            } else {
                // Add new category
                const logo = document.getElementById('categoryLogo').value.trim() || null;
                // Generate new ID (in a real app, this would come from the server)
                const newId = categories.length > 0 ? Math.max(...categories.map(c => c.id)) + 1 : 1;
                const defaultIcon = 'folder';
                categories.push({ id: newId, name, apiCode, icon: logo ? null : defaultIcon, logo });
            }

            // Update UI
            renderCategories();
            renderAdminCategories();
            checkEmptyStates();
            categoryModal.classList.add('hidden');
        }

        // Handle category deletion
        function handleDelete() {
            const id = parseInt(document.getElementById('deleteCategoryId').value);
            categories = categories.filter(c => c.id !== id);

            // Update UI
            renderCategories();
            renderAdminCategories();
            checkEmptyStates();
            deleteModal.classList.add('hidden');
        }

        // Check and update empty states
        function checkEmptyStates() {
            if (categories.length === 0) {
                emptyState.classList.remove('hidden');
                adminEmptyState.classList.remove('hidden');
            } else {
                emptyState.classList.add('hidden');
                adminEmptyState.classList.add('hidden');
            }
        }

        // Initialize the app when DOM is loaded
        document.addEventListener('DOMContentLoaded', init);
    </script>
</body>
</html>
