<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Category Management</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <style>
    .modal-animation {
      animation: fadeIn 0.3s ease-out;
    }
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
  </style>
</head>
<body class="bg-gray-50">
  <div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
      <h1 class="text-3xl font-bold text-gray-800">Category Management</h1>
      <button id="addCategoryBtn" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
        <i class="fas fa-plus mr-2"></i>Add Category
      </button>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">API Code</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
          </tr>
        </thead>
        <tbody id="adminCategoryTable" class="bg-white divide-y divide-gray-200"></tbody>
      </table>
      <div id="adminEmptyState" class="text-center py-12 hidden">
        <i class="fas fa-tasks text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-2xl font-medium text-gray-500 mb-2">No Categories Exist</h3>
        <p class="text-gray-400">Start by adding your first category.</p>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md modal-animation">
      <h2 class="text-xl font-bold mb-4" id="modalTitle">Add Category</h2>
      <form id="categoryForm">
        <input type="hidden" id="categoryId" />
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
          <input type="text" id="categoryName" required class="w-full border border-gray-300 rounded px-3 py-2"/>
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-1">API Code</label>
          <input type="text" id="categoryApiCode" required class="w-full border border-gray-300 rounded px-3 py-2"/>
        </div>
        <div class="flex justify-end gap-2">
          <button type="button" id="cancelBtn" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Cancel</button>
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Delete Confirmation Modal -->
  <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-sm modal-animation">
      <h2 class="text-xl font-bold mb-4 text-center">Delete Category</h2>
      <p class="text-center mb-6 text-gray-600">Are you sure you want to delete this category?</p>
      <div class="flex justify-center gap-4">
        <button id="cancelDeleteBtn" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Cancel</button>
        <button id="confirmDeleteBtn" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button>
      </div>
    </div>
  </div>

  <script>
    let categories = [
      { id: 1, name: 'Technology', apiCode: 'tech' },
      { id: 2, name: 'Business', apiCode: 'biz' },
      { id: 3, name: 'Science', apiCode: 'sci' },
    ];
    let selectedCategoryId = null;

    const table = document.getElementById('adminCategoryTable');
    const emptyState = document.getElementById('adminEmptyState');
    const modal = document.getElementById('modal');
    const deleteModal = document.getElementById('deleteModal');
    const categoryForm = document.getElementById('categoryForm');
    const categoryName = document.getElementById('categoryName');
    const categoryApiCode = document.getElementById('categoryApiCode');
    const categoryId = document.getElementById('categoryId');
    const modalTitle = document.getElementById('modalTitle');

    function renderTable() {
      table.innerHTML = '';
      if (categories.length === 0) {
        emptyState.classList.remove('hidden');
        return;
      }
      emptyState.classList.add('hidden');
      categories.forEach(cat => {
        const row = document.createElement('tr');
        row.innerHTML = `
          <td class="px-6 py-4 text-sm text-gray-500">${cat.id}</td>
          <td class="px-6 py-4 text-sm font-medium text-gray-900">${cat.name}</td>
          <td class="px-6 py-4 text-sm text-gray-500">${cat.apiCode}</td>
          <td class="px-6 py-4 text-right text-sm font-medium space-x-2">
            <button onclick="editCategory(${cat.id})" class="text-blue-600 hover:text-blue-900">Edit</button>
            <button onclick="showDeleteModal(${cat.id})" class="text-red-600 hover:text-red-900">Delete</button>
          </td>
        `;
        table.appendChild(row);
      });
    }

    document.getElementById('addCategoryBtn').onclick = () => {
      modalTitle.textContent = 'Add Category';
      categoryForm.reset();
      categoryId.value = '';
      modal.classList.remove('hidden');
    };

    document.getElementById('cancelBtn').onclick = () => modal.classList.add('hidden');

    categoryForm.onsubmit = function(e) {
      e.preventDefault();
      const id = categoryId.value ? parseInt(categoryId.value) : Date.now();
      const name = categoryName.value.trim();
      const apiCode = categoryApiCode.value.trim();

      if (categoryId.value) {
        // edit
        const index = categories.findIndex(c => c.id === id);
        categories[index].name = name;
        categories[index].apiCode = apiCode;
      } else {
        // add
        categories.push({ id, name, apiCode });
      }

      modal.classList.add('hidden');
      renderTable();
    };

    function editCategory(id) {
      const category = categories.find(c => c.id === id);
      if (!category) return;
      modalTitle.textContent = 'Edit Category';
      categoryId.value = category.id;
      categoryName.value = category.name;
      categoryApiCode.value = category.apiCode;
      modal.classList.remove('hidden');
    }

    function showDeleteModal(id) {
      selectedCategoryId = id;
      deleteModal.classList.remove('hidden');
    }

    document.getElementById('cancelDeleteBtn').onclick = () => {
      deleteModal.classList.add('hidden');
      selectedCategoryId = null;
    };

    document.getElementById('confirmDeleteBtn').onclick = () => {
      categories = categories.filter(c => c.id !== selectedCategoryId);
      deleteModal.classList.add('hidden');
      renderTable();
    };

    renderTable();
  </script>
</body>
</html>
