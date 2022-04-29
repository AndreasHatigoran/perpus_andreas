@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Buku</h1>
            <form action="{{ route('buku.add.post') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Buku</label>
                    <input type="text" value="{{ old('nama') }}" class="form-control" name="nama" id="nama"">
                    </div>

                    <div class=" mb-3">
                    <label for="penulis" class="form-label">Nama Penulis Buku</label>
                    <input type="text" value="{{ old('penulis') }}" class="form-control" name="penulis" id="penulis"">
                    </div>

                    <div class=" mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Buku</th>
                        <th scope="col">Nama Penulis Buku</th>
                        <th scope="col">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buku as $b)
                        <tr>
                            <th scope="row">{{ $b->id }}</th>
                            <td>{{ $b->nama }}</td>
                            <td>{{ $b->penulis }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('buku.edit.get', ['buku_id'=>$b->id]) }}" class="btn btn-sm btn-warning">Ubah</a>
                                    <span class="px-2"></span>
                                    <a onclick="return confirm('Yakin ingin menghapus buku ini?')" href="{{ route('buku.delete.get', ['buku_id'=>$b->id]) }}" class="btn btn-sm btn-danger">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
