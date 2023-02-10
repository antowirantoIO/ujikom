@extends('layouts.dashboard')

@section('title', 'Edit Data Karyawan')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">

            <h2 class="page-title">Edit Data Karyawan</h2>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post" action="{{ route('karyawan.update', $karyawan->id) }}" class="form-horizontal">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                <div class="col-md-6"><div class="form-group">
                                    <label class="col-sm-2 control-label">Kode Karyawan</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly value="{{ $karyawan->kode_user }}" name="kode_karyawan" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6"><div class="form-group">
                                    <label class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama" value="{{ $karyawan->name }}" class="form-control" autofocus>
                                        </div>
                                    </div>
                                </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6"><div class="form-group">
                                        <label class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="email" value="{{ $karyawan->email }}" class="form-control" autocomplete="off" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6"><div class="form-group">
                                        <label class="col-sm-2 control-label">No Telp</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="no_telp" value="{{ $karyawan->no_telp }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"><div class="form-group">
                                        <label class="col-sm-2 control-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea name="alamat" id="" class="form-control" rows="5">{{ $karyawan->alamat }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <button class="btn btn-default" type="submit">Batal</button>
                                        <button class="btn btn-primary" type="submit">Simpan</button>
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
