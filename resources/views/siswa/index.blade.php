@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1>Data Siswa</h1>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{ route('siswa.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Siswa
            </a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th>No Telepon</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswa as $item)
                            <tr>
                                <td>{{ $item->nis }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    @if ($item->jenis_kelamin == 'L')
                                        <span class="badge badge-info">Laki-laki</span>
                                    @else
                                        <span class="badge badge-danger">Perempuan</span>
                                    @endif
                                </td>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ $item->no_telp }}</td>
                                <td>
                                    @if ($item->status == 'aktif')
                                        <span class="badge badge-success">Aktif</span>
                                    @else
                                        <span class="badge badge-warning">Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('siswa.show', $item->id) }}" class="btn btn-sm btn-info" title="Lihat">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('siswa.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data siswa</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $siswa->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
