@extends('layouts.dashboard')

@section('title', 'Edit Data Konsumen')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">

            <h2 class="page-title">Edit Data Konsumen</h2>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post" action="{{ route('konsumen.update', $konsumen->id) }}" class="form-horizontal">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                <div class="col-md-6"><div class="form-group">
                                    <label class="col-sm-2 control-label">Kode Konsumen</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly value="{{ $konsumen->kode_user }}" name="kode_konsumen" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6"><div class="form-group">
                                    <label class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama" value="{{ $konsumen->name }}" class="form-control" autofocus>
                                        </div>
                                    </div>
                                </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6"><div class="form-group">
                                        <label class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="email" value="{{ $konsumen->email }}" class="form-control" autocomplete="off" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6"><div class="form-group">
                                        <label class="col-sm-2 control-label">No Telp</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="no_telp" value="{{ $konsumen->no_telp }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"><div class="form-group">
                                        <label class="col-sm-2 control-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea name="alamat" id="" class="form-control" rows="5">{{ $konsumen->alamat }}</textarea>
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
