<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Instagram Clone')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gradient-bg { background: linear-gradient(45deg, #f093fb 0%, #f5576c 100%); }
        .gradient-text { background: linear-gradient(45deg, #f093fb 0%, #f5576c 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .story-gradient { background: linear-gradient(45deg, #f093fb, #f5576c, #4facfe, #00f2fe); }
        .glass-effect { background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Mobile Header -->
    <header class="bg-white border-b border-gray-300 sticky top-0 z-50 lg:hidden">
        <div class="flex items-center justify-between px-4 py-3">
            <div class="flex items-center space-x-3">
                <i class="fas fa-camera text-2xl gradient-text"></i>
                <h1 class="text-2xl font-bold gradient-text">Instagram</h1>
            </div>
            <div class="flex items-center space-x-4">
                <button class="p-2 hover:bg-gray-100 rounded-full transition-colors">
                    <i class="far fa-heart text-xl text-gray-700"></i>
                </button>
                <button class="p-2 hover:bg-gray-100 rounded-full transition-colors">
                    <i class="far fa-paper-plane text-xl text-gray-700"></i>
                </button>
            </div>
        </div>
    </header>

    <div class="flex">
        <!-- Desktop Sidebar -->
        <aside class="hidden lg:block w-64 bg-white border-r border-gray-300 min-h-screen fixed left-0 top-0">
            <div class="p-6">
                <div class="flex items-center space-x-3 mb-8">
                    <i class="fas fa-camera text-3xl gradient-text"></i>
                    <h1 class="text-2xl font-bold gradient-text">Instagram</h1>
                </div>

                <nav class="space-y-2">
                    <a href="{{ route('feed') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                        <i class="fas fa-home text-xl"></i>
                        <span class="font-medium">Home</span>
                    </a>
                    <a href="{{ route('explore') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                        <i class="fas fa-search text-xl"></i>
                        <span class="font-medium">Explore</span>
                    </a>
                    <a href="{{ route('notifications') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                        <i class="far fa-heart text-xl"></i>
                        <span class="font-medium">Notifications</span>
                    </a>
                    <a href="{{ route('messages') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                        <i class="far fa-paper-plane text-xl"></i>
                        <span class="font-medium">Messages</span>
                    </a>
                    <a href="{{ route('upload') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                        <i class="fas fa-plus-square text-xl"></i>
                        <span class="font-medium">Create</span>
                    </a>
                    <a href="{{ route('profile') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                        <i class="far fa-user text-xl"></i>
                        <span class="font-medium">Profile</span>
                    </a>
                </nav>

                <div class="mt-8 pt-8 border-t border-gray-200">
                    @if(session('user_logged_in'))
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200 w-full">
                                <i class="fas fa-sign-out-alt text-xl"></i>
                                <span class="font-medium">Logout</span>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                            <i class="fas fa-sign-in-alt text-xl"></i>
                            <span class="font-medium">Login</span>
                        </a>
                    @endif
                </div>

                <!-- Admin Panel Link -->
                <div class="mt-4">
                    <a href="{{ route('admin.login') }}" class="flex items-center space-x-3 px-4 py-3 bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl">
                        <i class="fas fa-cog text-xl"></i>
                        <span class="font-medium">Admin Panel</span>
                    </a>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="lg:ml-64 flex-1 min-h-screen">
            @yield('content')
        </main>
    </div>

    <!-- Mobile Bottom Navigation -->
    <nav class="lg:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-300 px-4 py-2">
        <div class="flex justify-around">
            <a href="{{ route('feed') }}" class="p-3 text-gray-700 hover:text-gray-900">
                <i class="fas fa-home text-xl"></i>
            </a>
            <a href="{{ route('explore') }}" class="p-3 text-gray-700 hover:text-gray-900">
                <i class="fas fa-search text-xl"></i>
            </a>
            <a href="{{ route('upload') }}" class="p-3 text-gray-700 hover:text-gray-900">
                <i class="fas fa-plus-square text-xl"></i>
            </a>
            <a href="{{ route('notifications') }}" class="p-3 text-gray-700 hover:text-gray-900">
                <i class="far fa-heart text-xl"></i>
            </a>
            <a href="{{ route('profile') }}" class="p-3 text-gray-700 hover:text-gray-900">
                <i class="far fa-user text-xl"></i>
            </a>
        </div>
    </nav>

    <script>
        // Like button functionality
        $(document).on('click', '.like-btn', function() {
            const postId = $(this).data('post-id');
            const $this = $(this);
            
            $.post(`/post/${postId}/like`, {
                _token: '{{ csrf_token() }}'
            }).done(function(response) {
                if (response.liked) {
                    $this.find('i').removeClass('far').addClass('fas text-red-500');
                    $this.siblings('.likes-count').text(response.likes + ' likes');
                }
            });
        });

        // Follow button functionality
        $(document).on('click', '.follow-btn', function() {
            const username = $(this).data('username');
            const $this = $(this);
            
            $.post(`/follow/${username}`, {
                _token: '{{ csrf_token() }}'
            }).done(function(response) {
                if (response.following) {
                    $this.removeClass('bg-blue-500 hover:bg-blue-600').addClass('bg-gray-300 hover:bg-gray-400');
                    $this.text('Following');
                }
            });
        });

        // Comment functionality
        $(document).on('submit', '.comment-form', function(e) {
            e.preventDefault();
            const postId = $(this).data('post-id');
            const comment = $(this).find('input[name="comment"]').val();
            
            $.post(`/post/${postId}/comment`, {
                comment: comment,
                _token: '{{ csrf_token() }}'
            }).done(function(response) {
                if (response.success) {
                    $(this).find('input[name="comment"]').val('');
                    alert('Comment added successfully!');
                }
            });
        });
    </script>
</body>
</html>