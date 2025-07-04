@extends('layouts.app')

@section('title', 'Student Profile')

@section('sidebar')
@php
  $sidebarItemClass = 'flex items-center gap-3 px-3 py-2 rounded transition cursor-pointer hover:bg-blue-100 active:bg-blue-200';
@endphp

<div x-data="{ open: false }" class="space-y-2 md:space-y-4">
  <!-- Dropdown (Mobile) -->
  <div class="md:hidden">
    <button @click="open = !open" class="w-full px-4 py-3 bg-white rounded-md shadow flex justify-between items-center">
      <span class="font-semibold">Navigation</span>
      <svg :class="{ 'rotate-180': open }" class="w-5 h-5 transform transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </button>
    <div x-show="open" class="mt-2 space-y-2" x-cloak>
      <div class="{{ $sidebarItemClass }}">
        <img src="https://www.svgrepo.com/show/507370/profile-circled.svg" class="w-5 h-5" />
        <span>My Profile</span>
      </div>
      <div class="{{ $sidebarItemClass }}">
        <img src="https://www.svgrepo.com/show/533307/course-outline.svg" class="w-5 h-5" />
        <span>Student Feedback</span>
      </div>
      <div class="{{ $sidebarItemClass }}">
        <img src="https://www.svgrepo.com/show/521105/chat-dots.svg" class="w-5 h-5" />
        <span>Feedback Platform</span>
      </div>
    </div>
  </div>

  <!-- Sidebar (Desktop) -->
  <div class="hidden md:block space-y-2">
    <h2 class="text-xl font-bold text-gray-800 text-center border-b pb-2 pt-0">Navigation</h2>
    <div class="{{ $sidebarItemClass }}">
      <img src="https://www.svgrepo.com/show/507370/profile-circled.svg" class="w-5 h-5" />
      <span>My Profile</span>
    </div>
    <div class="{{ $sidebarItemClass }}">
      <img src="https://www.svgrepo.com/show/533307/course-outline.svg" class="w-5 h-5" />
      <span>Student Feedback</span>
    </div>
    <div class="{{ $sidebarItemClass }}">
      <img src="https://www.svgrepo.com/show/521105/chat-dots.svg" class="w-5 h-5" />
      <span>Feedback Platform</span>
    </div>
  </div>
</div>
@endsection

@section('content')
<!-- Form Card -->
<div class="w-full md:w-[90%] max-w-screen-md mx-auto bg-white p-6 md:p-8 rounded-xl shadow space-y-6 mt-3">
  <h2 class="text-xl md:text-2xl font-bold text-gray-800 text-center">Edit Profile</h2>

  <!-- Avatar -->
  <div class="w-24 h-24 mx-auto">
    <label for="avatarInput" class="block w-full h-full rounded-full border-2 border-dashed border-gray-400 flex items-center justify-center cursor-pointer hover:bg-gray-100 transition overflow-hidden relative group">
      <img id="avatarPreview" class="hidden object-cover w-full h-full rounded-full" />
      <span class="text-xs text-gray-500 group-hover:underline absolute bottom-2"></span>
    </label>
    <input type="file" id="avatarInput" accept="image/*" class="hidden" />
  </div>

  <!-- Form -->
  <form class="space-y-4">
    <div>
      <label class="block font-medium">Name</label>
      <input type="text" placeholder="Insert your name" class="w-full p-3 rounded bg-gray-100 outline-none" />
    </div>
    <div>
      <label class="block font-medium">Email Address</label>
      <input type="email" value="callof404@gmail.com" class="w-full p-3 rounded bg-gray-100 outline-none" />
    </div>
    <div class="flex flex-col md:flex-row gap-4">
      <div class="flex-1">
        <label class="block font-medium">Website or Linkedln</label>
        <input type="url" placeholder="https://yourwebsite.com or LinkedIn" class="w-full p-3 rounded bg-gray-100 outline-none" />
      </div>
      <div class="flex-1">
        <label class="block font-medium">Headline</label>
        <input type="text" placeholder="" class="w-full p-3 rounded bg-gray-100 outline-none" />
      </div>
    </div>
    <div>
      <label class="block font-medium">Bio</label>
      <textarea rows="5" placeholder="Write a short bio..." class="w-full p-3 rounded bg-gray-100 outline-none resize-none"></textarea>
    </div>

    <!-- Ganti Password Button -->
    <div class="flex justify-end mt-2">
      <button type="button" onclick="document.getElementById('passwordModal').classList.remove('hidden')" class="text-sm text-blue-600 hover:underline">
        Ganti Password
      </button>
    </div>

    <!-- Submit -->
    <div class="text-center pt-4">
      <button type="submit" class="px-6 py-2 bg-blue-500 text-white font-semibold rounded-md shadow hover:bg-blue-600 transition duration-200">
        Update
      </button>
    </div>
  </form>
</div>

<!-- Modal Change Password -->
<div id="passwordModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl p-8 md:p-10">
    <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Change Password</h3>

    <div class="mb-5">
      <label class="block text-sm font-semibold mb-1">Current Password</label>
      <input type="password" class="w-full mt-1 border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Enter your current password">
    </div>

    <div class="mb-5">
      <label class="block text-sm font-semibold mb-1">New Password</label>
      <input type="password" class="w-full mt-1 border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Enter new password">
    </div>

    <div class="mb-8">
      <label class="block text-sm font-semibold mb-1">Confirm New Password</label>
      <input type="password" class="w-full mt-1 border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-400 focus:outline-none" placeholder="Confirm new password">
    </div>

    <div class="flex justify-end gap-4">
      <button type="button" onclick="document.getElementById('passwordModal').classList.add('hidden')" class="px-5 py-2 text-sm border border-gray-400 rounded-lg text-gray-700 hover:bg-gray-100 transition">
        Cancel
      </button>
      <button type="submit" class="px-5 py-2 text-sm bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
        Update Password
      </button>
    </div>
  </div>
</div>

<!-- JS Avatar Preview -->
<script>
  const input = document.getElementById('avatarInput');
  const preview = document.getElementById('avatarPreview');

  input.addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        preview.src = e.target.result;
        preview.classList.remove('hidden');
      };
      reader.readAsDataURL(file);
    }
  });
</script>
@endsection
