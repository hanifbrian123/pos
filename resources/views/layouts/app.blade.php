<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fried Chicken - Menu Management</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F8FAFC] text-[#1E293B]">
<div class="flex h-screen">

{{-- Sidebar --}}
@include('partials.layout.sidebar')

<!-- Main Content -->
<main class="flex-1 overflow-y-auto p-12">
    <div class="max-w-6xl mx-auto">
        {{-- Content --}}
        @yield('content')
    </div>
</main>

</div>
</body>
</html>
