@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Ubah Data Pinjam Buku</h1>
            <form action="{{ route('pinjam.buku.edit.post') }}" method="post">
                @csrf

                <input type="hidden" name="pinjam_id" value="{{ $pinjam->id }}">

                <div class="mb-3">
                    <label for="buku_id" class="form-label">Pilih Judul Buku</label>
                    <input type="text" value="{{ $buku->nama }}" class="form-control" readonly>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" value="{{ old('nama') ?? $pinjam->nama }}" class="form-control" name="nama" id="nama">
                </div>

                <div class=" mb-3">
                    <label for="hp" class="form-label">HP</label>
                    <input type="text" value="{{ old('hp') ?? $pinjam->hp }}" class="form-control" name="hp" id="hp">
                </div>

                <div class=" mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" value="{{ old('email') ?? $pinjam->email }}" class="form-control" name="email" id="email">
                </div>

                <div class=" mb-3">
                    <label for="tanggal_dikembalikan" class="form-label">Tanggal Dikembalikan</label>
                    <input type="date" value="{{ old('tanggal_dikembalikan') ?? $pinjam->tanggal_dikembalikan }}" class="form-control" name="tanggal_dikembalikan" id="tanggal_dikembalikan">
                </div>

                <div class=" mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
