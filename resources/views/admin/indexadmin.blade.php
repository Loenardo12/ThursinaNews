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
                        <a href="/admin/dashboard" class="flex items-center px-4 py-2 text-sm font-medium rounded-md text-white bg-primary">
                            <i class="fas fa-tachometer-alt mr-3"></i>
                            Dashboard
                        </a>
                        <a href="/admin/categories" class="flex items-center px-4 py-2 text-sm font-medium rounded-md text-gray-600 hover:text-primary hover:bg-gray-100">
                            <i class="fas fa-list-alt mr-3"></i>
                            Categories
                        </a>
                        <a href="/admins" class="flex items-center px-4 py-2 text-sm font-medium rounded-md text-gray-600 hover:text-primary hover:bg-gray-100">
                            <i class="fas fa-users mr-3"></i>
                            Users
                        </a>
                        <div class="border-t border-gray-200 mt-4"></div>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center px-4 py-2 text-sm font-medium rounded-md text-gray-600 hover:text-red-500 hover:bg-gray-100">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            Logout
                        </a>
                    </nav>
                </div>
                <div class="px-4 py-4 border-t border-gray-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Admin profile">
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
                        <button id="close-sidebar" class="flex items-center justify-center w-12 h-12 rounded-full focus:outline-none focus:bg-gray-600">
                            <i class="fas fa-times text-white"></i>
                        </button>
                    </div>
                    <div class="flex items-center justify-center h-16 px-4 bg-primary">
                        <div class="text-white font-bold text-xl">Admin Panel</div>
                    </div>
                    <div class="flex flex-col flex-grow px-4 py-4 overflow-y-auto">
                        <nav class="flex-1 space-y-2">
                            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium rounded-md text-white bg-primary">
                                <i class="fas fa-tachometer-alt mr-3"></i>
                                Dashboard
                            </a>
                            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium rounded-md text-gray-600 hover:text-primary hover:bg-gray-100">
                                <i class="fas fa-list-alt mr-3"></i>
                                Categories
                            </a>
                            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium rounded-md text-gray-600 hover:text-primary hover:bg-gray-100">
                                <i class="fas fa-users mr-3"></i>
                                Users
                            </a>
                            <div class="border-t border-gray-200 mt-4"></div>
                            <a href="#" class="flex items-center px-4 py-2 text-sm font-medium rounded-md text-gray-600 hover:text-red-500 hover:bg-gray-100">
                                <i class="fas fa-sign-out-alt mr-3"></i>
                                Logout
                            </a>
                        </nav>
                    </div>
                    <div class="px-4 py-4 border-t border-gray-200">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Admin profile">
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
                    <button class="p-1 text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:text-gray-500">
                        <i class="fas fa-bell"></i>
                    </button>
                    <div class="ml-4">
                        <div class="relative">
                            <button class="flex items-center text-sm text-gray-700 focus:outline-none" id="user-menu">
                                <span class="hidden md:inline-block">Admin User</span>
                                <img class="w-8 h-8 ml-2 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Admin profile">
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="flex-1 overflow-auto p-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium">Total Users</p>
                                <p class="text-2xl font-bold">1,256</p>
                            </div>
                            <div class="p-3 rounded-full bg-primary bg-opacity-10">
                                <i class="fas fa-users text-primary"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="text-green-500 text-sm font-medium">
                                <i class="fas fa-arrow-up mr-1"></i> 12% from last month
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium">Total Categories</p>
                                <p class="text-2xl font-bold">24</p>
                            </div>
                            <div class="p-3 rounded-full bg-primary bg-opacity-10">
                                <i class="fas fa-list-alt text-primary"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="text-green-500 text-sm font-medium">
                                <i class="fas fa-arrow-up mr-1"></i> 3 new this month
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm font-medium">Active Sessions</p>
                                <p class="text-2xl font-bold">48</p>
                            </div>
                            <div class="p-3 rounded-full bg-primary bg-opacity-10">
                                <i class="fas fa-chart-line text-primary"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="text-red-500 text-sm font-medium">
                                <i class="fas fa-arrow-down mr-1"></i> 5% from last month
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg font-semibold text-gray-800">Recent Activity</h2>
                        <button class="text-sm text-primary">View All</button>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="p-2 rounded-full bg-primary bg-opacity-10">
                                <i class="fas fa-check text-primary"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium">New user registered</p>
                                <p class="text-xs text-gray-500">John Doe (john@example.com) just signed up</p>
                                <p class="text-xs text-gray-400 mt-1">2 minutes ago</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="p-2 rounded-full bg-primary bg-opacity-10">
                                <i class="fas fa-tag text-primary"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium">New category added</p>
                                <p class="text-xs text-gray-500">"Electronics" category was created</p>
                                <p class="text-xs text-gray-400 mt-1">1 hour ago</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="p-2 rounded-full bg-primary bg-opacity-10">
                                <i class="fas fa-user-edit text-primary"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium">User profile updated</p>
                                <p class="text-xs text-gray-500">Sarah Johnson updated her profile information</p>
                                <p class="text-xs text-gray-400 mt-1">3 hours ago</p>
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
    </script>
</body>
</html>
