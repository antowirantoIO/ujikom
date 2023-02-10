@extends('layouts.dashboard')

@section('title', 'Data Konsumen')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">

            <h2 class="page-title">Pengelolaan Data Konsumen</h2>

            <!-- Zero Configuration Table -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <a style="margin: 1vw;" href="{{ route('konsumen.create') }}" class="btn btn-primary btn-sm">Tambah Konsumen</a>
                    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Konsumen</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nomor Telp</th>
                                <th>Email</th>
                                <th>Bergabung</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($konsumen as $kons)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kons->kode_user }}</td>
                                    <td>{{ $kons->name }}</td>
                                    <td>{{ $kons->alamat }}</td>
                                    <td>{{ $kons->no_telp }}</td>
                                    <td>{{ $kons->email }}</td>
                                    <td>{{ $kons->created_at ->diffForHumans() }}</td>
                                    <td align="center">
                                        <div class="dropdown">
                                            <i class="dropdown-toggle glyphicon glyphicon-option-vertical" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

                                            </i>
                                            <ul style="margin-left: -10vw;" class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                <li><a href="#">
                                                    <i class="glyphicon glyphicon-pencil"></i>  Ubah</a>
                                                </li>
                                                <form action="{{ route('konsumen.destroy', $kons->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')

                                                    <button onclick ="return deleteFunction()" type="submit">
                                                        <i class="glyphicon glyphicon-trash"></i>  Hapus</i>
                                                    </li>
                                                </form>
                                            </ul>
                                          </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
