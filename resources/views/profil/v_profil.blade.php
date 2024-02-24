@extends('layout_admin.index')
@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="pt-5 text-center">
                <div style="width: 250px; height: 250px; border-radius: 50%; overflow: hidden; margin: auto;">
                    <img src="{{ asset('profile/' . $user->image) }}" alt="Product Image"
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <h1>{{ $user->name }}</h1>
            </div>

            <div class="text-start pt-3">
                <div class="row align-items-start">
                    <div class="col">
                        <label class="form-label">Nama Kandidat</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                    </div>
                    <div class="col">
                        <label class="form-label">Posisi Kandidat</label>
                        <input type="text" class="form-control" value="{{ $user->role }}" readonly>
                    </div>
                    <div class="col">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
