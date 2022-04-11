<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login E-Tobacco</title>
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
        body {
            font-family: 'Roboto', sans-serif;
            @apply bg-neutral-500 transition-all;
        }
        #slide:checked ~ div div#slide-page {
            background: url({{ asset('Image/Slide2.jpg') }});
            background-size: cover;
            @apply -translate-x-full;
        }
        #slide-page {
            background: url({{ asset('Image/Slide1.jpg') }});
            background-size: cover;
            @apply absolute right-0 w-[50%] h-full transition-all duration-700;
        }
        .card {
            @apply absolute left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 min-w-[30rem] w-[80%] max-w-[55rem] h-[70%] shadow-2xl;
        }
        .card img {
            @apply absolute bottom-0 animate-bounce;
        }
        .inner-card {
            @apply bg-slate-50 border;
        }
        .static-form {
            @apply mx-5;
        }
        .static-form .grid div {
            @apply w-full;
        }
        .static-form h1 {
            @apply text-2xl text-slate-700;
        }
        .static-form h1 span {
            @apply text-3xl font-medium text-green-600;
        }
        .static-form input {
            @apply px-2 py-1 w-[90%] text-lg text-green-600 bg-transparent focus:outline-none;
        }
        .static-form button {
            @apply px-3 py-2 w-full rounded-md shadow-lg font-bold text-white bg-gradient-to-r from-green-600 to-green-400 hover:from-green-700 hover:to-green-500 active:ring-4 active:ring-green-600;
        }
        .static-form label {
            @apply font-medium text-green-600 hover:text-green-700;
        }
        ::-webkit-scrollbar {
            @apply w-3 h-3;
        }
        ::-webkit-scrollbar-track {     
            @apply rounded-full bg-slate-300; 
        }
        ::-webkit-scrollbar-thumb {
            @apply rounded-full bg-green-600;
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
    <input type="checkbox" id="slide" class="hidden">
    <div class="card hidden md:inline">
        <img src="{{ asset('Logo/Transparan.png') }}" alt="Logo" width="10%" class="left-2">
        <img src="{{ asset('Logo/Transparan.png') }}" alt="Logo" width="10%" class="right-2">
        <div id="slide-page"></div>
        <div class="grid grid-cols-2 h-full">
            <div class="inner-card">
                <form action="{{ route('AuthLogin') }}" method="post" class="static-form">
                    <input type="text" name="level" value="Karyawan" class="hidden">
                    <div class="grid grid-cols-1 gap-4">
                        <div class="mt-7 mb-3 px-5">
                            <h1><span>L</span>ogin <span>K</span>aryawan</h1>
                        </div>
                        <div class="mb-3 border-b border-green-600">
                            <i class="fa-solid fa-user text-green-600"></i>
                            <input type="text" name="username" placeholder="Username">
                        </div>
                        <div class="mb-3 border-b border-green-600">
                            <i class="fa-solid fa-lock text-green-600"></i>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <div class="mt-7">
                            <button>Login</button>
                        </div>
                        <div class="mt-3">
                            <center>
                                <p>Anda Manager? <label for="slide">Login Disini!</label></p>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
            <div class="inner-card">
                <form action="{{ route('AuthLogin') }}" method="post" class="static-form">
                    <input type="text" name="level" value="Manager" class="hidden">
                    <div class="grid grid-cols-1 gap-4">
                        <div class="mt-7 mb-3 px-5">
                            <h1><span>L</span>ogin <span>M</span>anager</h1>
                        </div>
                        <div class="mb-3 border-b border-green-600">
                            <i class="fa-solid fa-user text-green-600"></i>
                            <input type="text" name="username" placeholder="Username">
                        </div>
                        <div class="mb-3 border-b border-green-600">
                            <i class="fa-solid fa-lock text-green-600"></i>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <div class="mt-7">
                            <button>Login</button>
                        </div>
                        <div class="mt-3">
                            <center>
                                <p>Anda Karyawan? <label for="slide">Login Disini!</label></p>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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