<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Instagram Clone')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-to-b from-slate-800 to-slate-900 text-white">
            <div class="p-6">
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-camera text-white"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold">Instagram Admin</h2>
                        <p class="text-sm text-slate-300">Management Panel</p>
                    </div>
                </div>

                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 text-white bg-purple-600 rounded-lg hover:bg-purple-700 transition-colors duration-200">
                        <i class="fas fa-chart-pie w-5 h-5"></i>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('admin.users') }}" class="flex items-center space-x-3 px-4 py-3 text-slate-300 hover:text-white hover:bg-slate-700 rounded-lg transition-colors duration-200">
                        <i class="fas fa-users w-5 h-5"></i>
                        <span>Users</span>
                    </a>

                    <a href="{{ route('admin.posts') }}" class="flex items-center space-x-3 px-4 py-3 text-slate-300 hover:text-white hover:bg-slate-700 rounded-lg transition-colors duration-200">
                        <i class="fas fa-images w-5 h-5"></i>
                        <span>Posts</span>
                    </a>

                    <a href="{{ route('admin.stories') }}" class="flex items-center space-x-3 px-4 py-3 text-slate-300 hover:text-white hover:bg-slate-700 rounded-lg transition-colors duration-200">
                        <i class="fas fa-play-circle w-5 h-5"></i>
                        <span>Stories</span>
                    </a>

                    <a href="{{ route('admin.reports') }}" class="flex items-center space-x-3 px-4 py-3 text-slate-300 hover:text-white hover:bg-slate-700 rounded-lg transition-colors duration-200">
                        <i class="fas fa-flag w-5 h-5"></i>
                        <span>Reports</span>
                        <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">156</span>
                    </a>

                    <a href="{{ route('admin.analytics') }}" class="flex items-center space-x-3 px-4 py-3 text-slate-300 hover:text-white hover:bg-slate-700 rounded-lg transition-colors duration-200">
                        <i class="fas fa-chart-line w-5 h-5"></i>
                        <span>Analytics</span>
                    </a>

                    <a href="{{ route('admin.settings') }}" class="flex items-center space-x-3 px-4 py-3 text-slate-300 hover:text-white hover:bg-slate-700 rounded-lg transition-colors duration-200">
                        <i class="fas fa-cog w-5 h-5"></i>
                        <span>Settings</span>
                    </a>
                </nav>
            </div>

            <!-- Back to Website Button -->
            <div class="absolute bottom-0 left-0 right-0 p-6">
                <a href="/" class="w-full flex items-center justify-center space-x-2 px-4 py-3 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white rounded-lg font-semibold transition-all duration-300 shadow-lg hover:shadow-xl">
                    <i class="fas fa-arrow-left w-5 h-5"></i>
                    <span>Back to Instagram</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                        <p class="text-gray-600">@yield('page-description', 'Manage your Instagram clone platform')</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="p-2 text-gray-400 hover:text-gray-500">
                            <i class="fas fa-bell"></i>
                        </button>
                        <div class="flex items-center space-x-2">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop&crop=face" alt="Admin" class="w-8 h-8 rounded-full">
                            <span class="text-sm font-medium text-gray-700">{{ session('admin_user.name', 'Admin') }}</span>
                        </div>
                        <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-400 hover:text-gray-500">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>