@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Pesanan Berhasil!</h2>
        
        <!-- Menampilkan pesan sukses -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Menampilkan total hasdadsadarga -->
        
    </div>
@endsection
