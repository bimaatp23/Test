@extends('Index')

@section('Title')
    Pengaturan Profile
@endsection

@section('Main')
    <div class="container mx-auto">
        <form action="{{ route('AuthPengaturanProfile') }}" method="post" class="static-form">
            <input type="text" name="level" value="{{ Session::get('Level') }}" class="hidden">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mx-4">
                <div class="w-full text-center">
                    <input type="text" name="nama" placeholder="Nama" value="{{ Session::get('Nama') }}" required>
                </div>
                <div class="w-full text-center">
                    <input type="text" name="username" placeholder="Username" value="{{ Session::get('Username') }}" readonly>
                </div>
                <div class="w-full text-center">
                    <input type="text" name="password" placeholder="Password" value="{{ Session::get('Password') }}" required>
                </div>
                <div class="w-full text-center">
                    <button type="submit">Perbarui</button>
                </div>
            </div>
        </form>
    </div>
@endsection