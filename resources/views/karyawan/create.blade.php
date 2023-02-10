@extends('layouts.dashboard')

@section('title, 'Tambah Data Karyawan')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">

            <h2 class="page-title">Tambah Data Karyawan</h2>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="POST" action="{{ route('karyawan.store') }}" class="form-horizontal">
                                @csrf
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Kode Karyawan</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly value="{{ $kode }}" name="kode_user" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6"><div class="form-group">
                                    <label class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ old('nama') }}" name="nama" class="form-control" autofocus>
                                        @error('nama')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6"><div class="form-group">
                                        <label class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="email" class="form-control" autocomplete="off" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6"><div class="form-group">
                                        <label class="col-sm-2 control-label">No Telp</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="no_telp" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"><div class="form-group">
                                        <label class="col-sm-2 control-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea name="alamat" id="" class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <a href="{{ route('karyawan.index') }}"
                                            class="btn btn-danger waves-effect waves-light">Batal</a>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
