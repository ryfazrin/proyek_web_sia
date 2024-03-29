@extends('adminlte::page') @section('title', 'Master Tabel Jabatan')
@section('content_header')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">
      Master Tabel Jabatan
    </li>
  </ol>
</nav>
@stop @section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div style="display: flex; justify-content: space-between;
 align-items: cente;">
            <span id="card_title">
              <h3>Master Tabel Jabatan</h3>
            </span>
            <div class="float-right">
              @include('mst-jabatan.search',['url'=>'mst-jabatan',
              'link'=>'mst-jabatan'])
            </div>
          </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead class="thead">
                <tr>
                  <th>No</th>
                  <th>Nama Jabatan</th>
                  <th>Tunjangan</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($mstJabatan as $mstJabatans)
                <tr>
                  <td>{{ +(+$i) }}</td>
                  <td>{{ $mstJabatans->nama_jabatan }}</td>
                  <td>{{ number_format($mstJabatans->tunjangan) }}</td>
                  <td>
                    <form action="{{ route('mst-jabatan.destroy',$mstJabatans->id) }}" method="POST">
                      <a class="btn btn-sm btn-primary" href="{{ route('mst-jabatan.show',$mstJabatans->id) }}">
                        <i class="fa fa-fw fa-eye"></i>Lihat</a>
                      <a class="btn btn-sm btn-success" href="{{ route('mst-jabatan.edit',$mstJabatans->id) }}">
                        <i class="fa fa-fw fa-edit"></i>
                        Ubah</a>
                      @csrf @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fa fa-fw fa-trash"></i>
                        Hapus
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      {!! $mstJabatan->links('pagination::bootstrap-4') !!}
    </div>
  </div>
</div>
@endsection