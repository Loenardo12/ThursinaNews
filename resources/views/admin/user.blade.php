<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#385ee7',
                    }
                }
            }
        }
    </script>
    <style>
        /* For custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-white border-r">
                <div class="flex items-center justify-center h-16 px-4 bg-primary">
                    <div class="text-white font-bold text-xl">Admin Panel</div>
                </div>
                <div class="flex flex-col flex-grow px-4 py-4 overflow-y-auto">
                    <nav class="flex-1 space-y-2">
                        <a href="#"
                            class="flex items-center px-4 py-2 text-sm font-medium rounded-md text-white bg-primary">
                            <i class="fas fa-tachometer-alt mr-3"></i>
                            Dashboard
                        </a>
                        <a href="#"
                            class="flex items-center px-4 py-2 text-sm font-medium rounded-md text-gray-600 hover:text-primary hover:bg-gray-100">
                            <i class="fas fa-list-alt mr-3"></i>
                            Categories
                        </a>
                        <a href="#"
                            class="flex items-center px-4 py-2 text-sm font-medium rounded-md text-white bg-primary">
                            <i class="fas fa-users mr-3"></i>
                            Users
                        </a>
                        <div class="border-t border-gray-200 mt-4"></div>
                        <a href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="flex items-center px-4 py-2 text-sm font-medium rounded-md text-gray-600 hover:text-red-500 hover:bg-gray-100">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            Logout
                        </a>
                    </nav>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
                <div class="px-4 py-4 border-t border-gray-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="Admin profile">
                        </div>
                        <div class="ml-3">
                            <div class="text-sm font-medium text-gray-700">Admin User</div>
                            <div class="text-xs text-gray-500">admin@example.com</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile sidebar -->
        <div class="md:hidden">
            <div class="fixed inset-0 z-40 hidden" id="mobile-sidebar">
                <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>
                <div class="relative flex flex-col flex-1 w-64 max-w-xs bg-white">
                    <div class="absolute top-0 right-0 p-1 -mr-14">
                        <button id="close-sidebar"
                            class="flex items-center justify-center w-12 h-12 rounded-full focus:outline-none focus:bg-gray-600">
                            <i class="fas fa-times text-white"></i>
                        </button>
                    </div>
                    <div class="flex items-center justify-center h-16 px-4 bg-primary">
                        <div class="text-white font-bold text-xl">Admin Panel</div>
                    </div>
                    <div class="flex flex-col flex-grow px-4 py-4 overflow-y-auto">
                        <nav class="flex-1 space-y-2">
                            <a href="/admin"
                                class="flex items-center px-4 py-2 text-sm font-medium rounded-md text-white bg-primary">
                                <i class="fas fa-tachometer-alt mr-3"></i>
                                Dashboard
                            </a>
                            <a href="/admin/categories"
                                class="flex items-center px-4 py-2 text-sm font-medium rounded-md text-gray-600 hover:text-primary hover:bg-gray-100">
                                <i class="fas fa-list-alt mr-3"></i>
                                Categories
                            </a>
                            <a href="#"
                                class="flex items-center px-4 py-2 text-sm font-medium rounded-md text-white bg-primary">
                                <i class="fas fa-users mr-3"></i>
                                Users
                            </a>
                            <div class="border-t border-gray-200 mt-4"></div>
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="flex items-center px-4 py-2 text-sm font-medium rounded-md text-gray-600 hover:text-red-500 hover:bg-gray-100">
                                <i class="fas fa-sign-out-alt mr-3"></i>
                                Logout
                            </a>
                        </nav>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                    <div class="px-4 py-4 border-t border-gray-200">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="w-10 h-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="Admin profile">
                            </div>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-700">Admin User</div>
                                <div class="text-xs text-gray-500">admin@example.com</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top navigation -->
            <div class="flex items-center justify-between h-16 px-4 bg-white border-b">
                <div class="flex items-center">
                    <button id="open-sidebar" class="md:hidden text-gray-500 focus:outline-none">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="ml-4 text-lg font-semibold text-gray-900">Dashboard</div>
                </div>
                <div class="flex items-center">
                    <button
                        class="p-1 text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:text-gray-500">
                        <i class="fas fa-bell"></i>
                    </button>
                    <div class="ml-4">
                        <div class="relative">
                            <button class="flex items-center text-sm text-gray-700 focus:outline-none" id="user-menu">
                                <span class="hidden md:inline-block">Admin User</span>
                                <img class="w-8 h-8 ml-2 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="Admin profile">
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="flex-1 overflow-auto p-4">
                <div class="bg-white rounded-lg shadow mb-6">
                    <div class="p-4 border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <h2 class="text-lg font-semibold text-gray-800">User Management</h2>
                            <button
                                class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-md text-sm font-medium">
                                <i class="fas fa-plus mr-2"></i>Add User
                            </button>
                        </div>
                    </div>

                    <div class="p-4">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td class="px-6 py-4 text-sm text-gray-500">{{ $admin->id }}</td>
                                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $admin->name }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">{{ $admin->email }}</td>
                                            <td class="px-6 py-4 text-sm font-medium">
                                                {{-- <button type="button"
                                                    class="text-indigo-600 hover:text-indigo-900 mr-3 edit-user-btn"
                                                    data-id="{{ $admin->id }}" data-name="{{ $admin->name }}"
                                                    data-email="{{ $admin->email }}">
                                                    <i class="fas fa-edit"></i>
                                                </button> --}}

                                                <form method="POST" action="{{ route('admin.destroy', $admin->id) }}"
                                                    class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                                        class="text-red-600 hover:text-red-900">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

                <!-- Add/Edit User Modal -->
                <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="userModal">
                    <div
                        class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                            aria-hidden="true">&#8203;</span>
                        <div
                            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Add New Admin</h3>

                                <form id="adminForm" method="POST" action="{{ route('admin.store') }}">
                                    @csrf
                                    <input type="hidden" name="id" id="adminId" value="">
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Full
                                            Name</label>
                                        <input name="name"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="name" type="text" placeholder="Full Name" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2"
                                            for="email">Email</label>
                                        <input name="email"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="email" type="email" placeholder="Email" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2"
                                            for="password">Password</label>
                                        <input name="password"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="password" type="password" placeholder="Password" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2"
                                            for="password_confirmation">Confirm Password</label>
                                        <input name="password_confirmation"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="password_confirmation" type="password" placeholder="Confirm Password"
                                            required>
                                    </div>
                                </form>

                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="submit" form="adminForm"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary-dark focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">Save</button>
                                <button type="button"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                    onclick="document.getElementById('userModal').classList.add('hidden')">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Mobile sidebar toggle
        document.getElementById('open-sidebar').addEventListener('click', function() {
            document.getElementById('mobile-sidebar').classList.remove('hidden');
        });

        document.getElementById('close-sidebar').addEventListener('click', function() {
            document.getElementById('mobile-sidebar').classList.add('hidden');
        });

        // User CRUD functionality
        const addUserBtn = document.querySelector('button.bg-primary');
        const modal = document.getElementById('userModal');
        const cancelBtn = modal.querySelector('button.bg-white');

        // Open modal
        addUserBtn.addEventListener('click', function() {
            modal.classList.remove('hidden');
        });

        // Close modal
        cancelBtn.addEventListener('click', function() {
            modal.classList.add('hidden');
        });

        // Close modal when clicking outside
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        });

        // Edit buttons
        document.querySelectorAll('.fa-edit').forEach(btn => {
            btn.addEventListener('click', function() {
                // In a real app, you would populate the form with user data
                modal.classList.remove('hidden');
                modal.querySelector('h3').textContent = 'Edit User';
                // Example of populating form (would come from API in real app)
                const row = this.closest('tr');
                const name = row.querySelector('td:nth-child(2)').textContent;
                const email = row.querySelector('td:nth-child(3)').textContent;
                const role = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
                const status = row.querySelector('span').textContent.toLowerCase();

                modal.querySelector('#name').value = name;
                modal.querySelector('#email').value = email;
                modal.querySelector('#role').value = role;
                modal.querySelector('#status').value = status;
            });
        });
    </script>
</body>

</html>
