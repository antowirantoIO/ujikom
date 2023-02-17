@extends('layouts.dashboard')

@section('title', 'Laporan Keuangan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-title">Laporan Transaksi</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <form id="lap_input" class="d-flex">
                            <div class="col-md-4">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Tanggal Awal</label>
                                        <input type="date" id="tgl_awal_input" pattern="\d{4}-\d{2}-\d{2}" name="tanggal_masuk" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Tanggal Akhir</label>
                                        <input type="date" id="tgl_akhir_input" pattern="\d{4}-\d{2}-\d{2}" name="tanggal_keluar" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="btn btn-primary"  id="btn_filter" style="margin-top: 1.7rem;">
                                    Filter
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row">
                            <table id="lap_trans" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Konsumen</th>
                                        <th>Nama Paket</th>
                                        <th>Tipe Pembayaran</th>
                                        <th>Status</th>
                                        <th>Berat</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Total Bayar</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

<script>
    $(document).ready(function(){
        // var lap_datatable = $("#lap_trans").DataTable({
        //     processing: true,
        //     dataSrc: "data",
        //     columns: [
        //         {data: 'id'},
        //         {data: 'konsumen.nama'},
        //         {data: 'paket.nama_paket'},
        //         {data: 'tipe_pembayaran'},
        //         {data: 'status'},
        //         {data: 'berat'},
        //         {data: 'tanggal_masuk'},
        //         {data: 'tanggal_keluar'},
        //         {data: 'status_bayar'},
        //         {data: 'diskon'},
        //         {data: 'total_bayar'},
        //         {data: 'karyawan.nama'},
        //         {data: 'keterangan'},
        //         {},
        //     ],
        // });

        $('#btn_filter').click(function(){
            var tgl_awal = $('#tgl_awal_input').val();
            var tgl_akhir = $('#tgl_akhir_input').val();

            // console.log(tgl_masuk, tgl_keluar);
            // $.ajax({
            //     url: "{{ route('laporan.transaksi.ajax') }}",
            //     type: "POST",
            //     data: {
            //         "_token": "{{ csrf_token() }}",
            //         "tanggal_awal": tgl_awal,
            //         "tanggal_akhir": tgl_akhir
            //     },
            //     success: function(response){
            //         console.log(response);
            //     }
            // });

            // lap_datatable.ajax = {
            //     url: "{{ route('laporan.transaksi.ajax') }}",
            //     type: "POST",
            //     data: {
            //         "_token": "{{ csrf_token() }}",
            //         "tanggal_awal": tgl_awal,
            //         "tanggal_akhir": tgl_akhir
            //     },
            // }
        });

        var tgl_awal = "2023-02-10"
        var tgl_akhir = "2023-02-17"

        $('#lap_trans').DataTable({
            processing: true,
            dataSrc: "data",
            ajax: {
                url: "{{ route('laporan.transaksi.ajax') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "tanggal_awal": tgl_awal,
                    "tanggal_akhir": tgl_akhir
                },
            }
        });
    });
</script>

@endpush