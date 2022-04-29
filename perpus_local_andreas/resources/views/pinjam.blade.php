@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Pinjam Buku</h1>
            <form action="{{ route('pinjam.buku.add') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="buku_id" class="form-label">Pilih Judul Buku</label>
                    <select name="buku_id" id="buku_id" class="form-control">
                        @foreach ($buku as $b)
                            <option value="{{ $b->id }}">{{ $b->nama }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" value="{{ old('nama') }}" class="form-control" name="nama" id="nama">
                </div>

                <div class=" mb-3">
                    <label for="hp" class="form-label">HP</label>
                    <input type="text" value="{{ old('hp') }}" class="form-control" name="hp" id="hp">
                </div>

                <div class=" mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" value="{{ old('email') }}" class="form-control" name="email" id="email">
                </div>

                <div class=" mb-3">
                    <label for="tanggal_dikembalikan" class="form-label">Tanggal Dikembalikan</label>
                    <input type="date" value="{{ old('tanggal_dikembalikan') }}" class="form-control" name="tanggal_dikembalikan" id="tanggal_dikembalikan">
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
                        <th scope="col">Buku Dipinjam</th>
                        <th scope="col">Nama Peminjam</th>
                        <th scope="col">HP Peminjam</th>
                        <th scope="col">Email Peminjam</th>
                        <th scope="col">Tanggal Dikembalikan</th>
                        <th scope="col">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pinjam_buku as $p)
                        <tr>
                            <td>{{ $p->buku->nama }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->hp }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ date("d F Y", strtotime($p->tanggal_dikembalikan)) }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('pinjam.buku.edit.get', ['pinjam_id'=>$p->id]) }}" class="btn btn-sm btn-warning">Ubah</a>
                                    <span class="px-2"></span>
                                    <a onclick="return confirm('Yakin ingin menghapus buku ini?')" href="{{ route('pinjam.buku.delete.get', ['pinjam_id'=>$p->id]) }}" class="btn btn-sm btn-danger">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
