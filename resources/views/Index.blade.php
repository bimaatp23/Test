<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Tobacco</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('Favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Beau+Rivage&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">  
    <script src="https://kit.fontawesome.com/01ab9e1577.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        * {
            cursor: url(https://cur.cursors-4u.net/cursors/cur-2/cur222.cur), auto !important;
        }
        #sidebar:checked ~ div#grid1 {
            @apply -translate-x-60;
        }
        #sidebar:checked ~ div#grid2 {
            @apply w-full -translate-x-60;
        }
        #sidebar:checked ~ div#grid3 {
            @apply -translate-x-60;
        }
        #sidebar:checked ~ div#grid4 {
            @apply w-full -translate-x-60;
        }
        #profile:checked ~ div.profile {
            @apply translate-y-[28rem];
        }
        #grid1 {
            width: 15rem;
            height: 4rem;
            @apply fixed transition-all duration-1000 border border-green-500 bg-slate-50;
        }
        #grid2 {
            width: calc(100% - 15rem);
            height: 4rem;
            left: 15rem;
            @apply fixed transition-all duration-1000 border border-green-500 bg-slate-50;
        }
        #grid3 {
            width: 15rem;
            height: calc(100% - 4rem);
            top: 4rem;
            @apply fixed transition-all duration-1000 border border-green-500 bg-slate-50;
        }
        #grid4 {
            width: calc(100% - 15rem);
            height: calc(100% - 4rem);
            left: 15rem;
            top: 4rem;
            @apply fixed transition-all duration-1000 border border-green-500 bg-slate-50;
        }
        body {
            font-family: 'Roboto', sans-serif;
        }
        .profile {
            @apply fixed right-5 -top-96 transition duration-1000;
        }
        .profile ul {
            @apply rounded-md shadow-lg overflow-hidden;
        }
        .profile li {
            @apply px-3 py-2 font-bold text-white bg-gradient-to-r from-green-600 to-green-400 hover:from-green-700 hover:to-green-500;
        }
        .text-logo {
            @apply p-2 text-4xl font-bold;
        }
        .text-logo span {
            font-family: 'Beau Rivage', cursive;
            @apply text-5xl font-bold text-green-600;
        }
        .button-navbar {
            @apply px-3 py-2 rounded-md shadow-lg font-bold text-white bg-gradient-to-r from-green-600 to-green-400 hover:from-green-700 hover:to-green-500 active:ring-4 active:ring-green-600;
        }
        .item-sidebar {
            @apply pl-9 py-3 font-bold text-white bg-gradient-to-r from-green-600 to-green-400 hover:from-green-700 hover:to-green-500;
        }
        .item-sidebar span {
            @apply absolute -translate-x-6;
        }
        .title-page {
            @apply px-3 py-3 text-3xl font-bold text-green-700;
        }
        .static-form input {
            @apply px-2 py-1 w-full rounded-md text-lg text-green-600 font-medium border-2 border-green-600 hover:bg-slate-100 focus:bg-slate-100 focus:outline-none;
        }
        .static-form button {
            @apply px-3 py-2 w-full rounded-md shadow-lg font-bold text-white bg-gradient-to-r from-green-600 to-green-400 hover:from-green-700 hover:to-green-500 active:ring-4 active:ring-green-600;
        }
        ::-webkit-scrollbar {
            @apply w-3 h-3;
        }
        ::-webkit-scrollbar-track {     
            @apply bg-slate-300 rounded-full; 
        }
        ::-webkit-scrollbar-thumb {
            @apply bg-green-600 rounded-full;
        }
    </style>
</head>
@if (Session::has('alertSuccess'))
<body onpageshow="alertSuccess()">
@elseif (Session::has('alertInfo'))
<body onpageshow="alertInfo()">
@elseif (Session::has('alertError'))
<body onpageshow="alertError()">
@else
<body>
@endif
    <input type="checkbox" id="sidebar" class="hidden">
    <input type="checkbox" id="profile" class="hidden">
    <div id="grid1">
        <center>
            <a href="">
                <h1 class="text-logo"><span>E</span>-Tobacco</h1>
            </a>
        </center>
    </div>
    <div id="grid2">
        <label for="sidebar" class="button-navbar float-left ml-4 mt-3"><i class="fa-solid fa-list"></i> Menu</label>
        <label for="profile" class="button-navbar float-right mr-4 mt-3"><i class="fa-solid fa-user"></i> {{ Session::get('Nama') }} ({{ Session::get('Level') }})</label>
    </div>
    <div id="grid3">
        <ul>
            <a href="">
                <li class="item-sidebar"><span><i class="fa-solid fa-house"></i></span> Dashboard</li>
            </a>
        </ul>
    </div>
    <div id="grid4">
        <h1 class="title-page">@yield('Title')</h1>
        @yield('Main')
    </div>
    <div class="profile">
        <ul>
            <a href="{{ route('PengaturanProfile') }}">
                <li><i class="fa-solid fa-user-pen"></i> Pengaturan Profile</li>
            </a>
            <a href="{{ route('Logout') }}">
                <li><i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar</li>
            </a>
        </ul>
    </div>
    @php
    echo "
    <script>
        function alertSuccess() {
            Swal.fire({
                width: 350,
                icon: 'success',
                title: 'Sukses',
                text: '".Session::get('alertSuccess')."',
                showConfirmButton: false,
                timer: 3000
            });
        }
        function alertInfo() {
            Swal.fire({
                width: 350,
                icon: 'info',
                title: 'Info',
                text: '".Session::get('alertInfo')."',
                showConfirmButton: false,
                timer: 3000
            });
        }
        function alertError() {
            Swal.fire({
                width: 350,
                icon: 'error',
                title: 'Gagal',
                text: '".Session::get('alertError')."',
                showConfirmButton: false,
                timer: 3000
            });
        }
    </script>";
    @endphp
</body>
</html>