<!-- user.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Explore Categories</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body class="bg-gray-50">
  <div class="container mx-auto px-4 py-8">
    <div class="text-center mb-12">
      <h1 class="text-4xl font-bold text-gray-800 mb-4">Explore Categories</h1>
      <p class="text-xl text-gray-600 max-w-2xl mx-auto">Browse through our extensive collection of categories.</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" id="categoryGrid"></div>
    <div id="emptyState" class="text-center py-12 hidden">
      <i class="fas fa-folder-open text-6xl text-gray-300 mb-4"></i>
      <h3 class="text-2xl font-medium text-gray-500 mb-2">No Categories Found</h3>
      <p class="text-gray-400">There are currently no categories available.</p>
    </div>
  </div>

  <script>
    const categories = [
      { id: 1, name: 'Technology', apiCode: 'tech', icon: 'microchip' },
      { id: 2, name: 'Business', apiCode: 'biz', icon: 'briefcase' },
      { id: 3, name: 'Science', apiCode: 'sci', icon: 'flask' },
      { id: 4, name: 'Health', apiCode: 'health', icon: 'heartbeat' },
      { id: 5, name: 'Sports', apiCode: 'sports', icon: 'running' },
      { id: 6, name: 'Entertainment', apiCode: 'ent', icon: 'film' },
    ];

    const categoryGrid = document.getElementById('categoryGrid');
    const emptyState = document.getElementById('emptyState');

    function renderCategories() {
      categoryGrid.innerHTML = '';
      if (categories.length === 0) {
        emptyState.classList.remove('hidden');
        return;
      }
      categories.forEach(category => {
        const card = document.createElement('div');
        card.className = 'bg-white rounded-lg shadow-md hover:shadow-lg p-6 text-center';
        card.innerHTML = `
          <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-${category.icon} text-blue-600 text-2xl"></i>
          </div>
          <h3 class="text-xl font-semibold text-gray-800 mb-2">${category.name}</h3>
          <p class="text-blue-600 text-sm font-medium">API: ${category.apiCode}</p>
        `;
        categoryGrid.appendChild(card);
      });
    }

    document.addEventListener('DOMContentLoaded', renderCategories);
  </script>
</body>
</html>
