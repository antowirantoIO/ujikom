@extends('layouts.dashboard')

@section('title', 'Data Transaksi')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">

            <h2 class="page-title">Pengelolaan Data Transaksi</h2>

            <!-- Zero Configuration Table -->
            <div class="panel panel-default">
                <div class="panel-body">
                    @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <a style="margin: 1vw;" class="btn btn-primary btn-sm">Tambah Transaksi</a>
                    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Konsumen</th>
                                <th>Nama Paket</th>
                                <th>Tipe Pembayaran</th>
                                <th>Status</th>
                                <th>Berat</th>
                                <th>Tanggal Masuk</th>
                                <th>Tanggal Keluar</th>
                                <th>Status Bayar</th>
                                <th>Diskon</th>
                                <th>Total Bayar</th>
                                <th>Karyawan</th>
                                <th>Keterangan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $trans)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $trans->konsumen->name }}</td>
                                    <td>{{ $trans->paket->nama }}</td>
                                    <td>{{ $trans->tipe_bayar->nama }}</td>
                                    <td>{{ $trans->status->nama }}</td>
                                    <td>{{ $trans->berat }}</td>
                                    <td>{{ $trans->tanggal_masuk }}</td>
                                    <td>{{ $trans->tanggal_keluar }}</td>
                                    <td>{{ $trans->status_bayar }}</td>
                                    <td>{{ $trans->diskon }}</td>
                                    <td>{{ $trans->total_bayar }}</td>
                                    
                                    @php
                                        $data = json_decode($trans->keterangan, true);
                                        if($data['kembalian'] > 0){
                                            $keterangan = 'Kembalian Rp.' . $data['kembalian'];
                                        } else {
                                            $keterangan = 'Hutang Rp.' . $data['hutang'];
                                        }
                                    @endphp
                                    
                                    <td>{{ $trans->karyawan->name }}</td>
                                    <td>{{ $keterangan }}</td>
                                    <td align="center">
                                        <div class="dropdown">
                                            <i class="dropdown-toggle glyphicon glyphicon-option-vertical" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            </i>
                                            <ul style="margin-left: -10vw;" class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                <li>
                                                    <form action="{{ route('transaksi.destroy', $trans->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')

                                                        <button class="b1" onclick ="return deleteFunction()" type="submit">
                                                            <i class="glyphicon glyphicon-trash"></i>  Hapus
                                                        </button>
                                                    </form>
                                                </li>
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