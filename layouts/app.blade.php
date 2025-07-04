<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Profile')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-blue-100 font-sans min-h-screen m-0 p-0">

  <!-- Navbar (Fixed Top) -->
  <header class="fixed top-0 left-0 w-full bg-white z-50 h-16 flex items-center justify-between px-6 shadow-sm">
    <!-- Logo -->
    <div class="text-xl font-bold text-blue-600">Laravel</div>

    <!-- Profile Dropdown -->
    <div x-data="{ open: false }" class="relative">
      <img
        @click="open = !open"
        src="{{ Auth::user()->avatar_url ?? 'https://www.svgrepo.com/show/506970/user-circle.svg' }}"
        class="w-8 h-8 rounded-full cursor-pointer"
        alt="User Avatar"
      />

      <!-- Dropdown Menu (Enlarged) -->
      <div
        x-show="open"
        @click.away="open = false"
        x-transition
        class="absolute right-0 mt-2 w-56 bg-white border rounded-xl shadow-lg z-50"
      >
        <a href="/dashboard" class="block px-5 py-3 text-base text-gray-700 hover:bg-gray-100">Dashboard</a>
        <a href="/profile" class="block px-5 py-3 text-base text-gray-700 hover:bg-gray-100">Profile</a>
        <form method="POST" action="/logout">
          @csrf
          <button type="submit" class="w-full text-left px-5 py-3 text-base text-gray-700 hover:bg-gray-100">
            Logout
          </button>
        </form>
      </div>
    </div>
  </header>

  <!-- Wrapper (Sidebar + Content) -->
  <div class="pt-16 flex flex-col md:flex-row min-h-screen">

    <!-- Sidebar -->
    <aside class="bg-blue-200 w-full md:w-64 md:p-0 md:border-r md:sticky md:top-16 md:h-[calc(100vh-4rem)]">
      <div class="px-4 py-4 md:px-0 overflow-y-auto md:h-full">
        @yield('sidebar')
      </div>
    </aside>
        
    <!-- Main Content -->
    <main class="flex-1 px-4 md:px-6 py-6 overflow-y-auto">
      <div class="max-w-screen-xl mx-auto">
        @yield('content')
      </div>
    </main>

  </div>

</body>
</html>
