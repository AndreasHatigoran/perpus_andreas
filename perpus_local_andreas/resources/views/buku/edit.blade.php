@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('buku.edit.post') }}" method="post">
                @csrf

                <input type="hidden" name="buku_id" value="{{ $buku->id }}">

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Buku</label>
                    <input type="text" value="{{ old('nama') ?? $buku->nama }}" class="form-control" name="nama" id="nama"">
                    </div>

                    <div class=" mb-3">
                    <label for="penulis" class="form-label">Nama Penulis Buku</label>
                    <input type="text" value="{{ old('penulis') ?? $buku->penulis }}" class="form-control" name="penulis" id="penulis"">
                    </div>

                    <div class=" mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
