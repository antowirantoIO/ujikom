@extends('layouts.dashboard')

@section('title', 'Buat Transaksi Baru')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">

            <h2 class="page-title">Buat Transaksi Baru</h2>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form action="{{ route('transaksi.store') }}" method="POST" class="form-horizontal">
                                @csrf
                                <h4>DATA KONSUMEN</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label">Konsumen</label>
                                                <select name="konsumen_id" id="konsumen_select" class="form-control">
                                                    <option>Select Konsumen</option>
                                                    @foreach($konsumen as $kons)
                                                        <option data-kode_user="{{ $kons->kode_user }}" data-no_telp="{{ $kons->no_telp }}" value="{{ $kons->id }}">{{ $kons->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label">Kode</label>
                                                <input type="text" readonly id="kode_user_input" placeholder="Kode User" name="kode_konsumen" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label">No Telp</label>
                                                <input type="text" readonly id="no_telp_input" placeholder="No Telepon" name="no_telp_konsumen" class="form-control">
                                            </div>
                                       </div>
                                    </div>
                                </div>
                                <h4>DATA PAKET</h4>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            
                                            <div class="col-sm-12">
                                            <label class="control-label">Paket</label>
                                                <select name="paket_id" id="paket_select" class="form-control">
                                                    <option>Select Paket</option>
                                                    @foreach($paket as $item)
                                                        <option data-jenis="{{ $item->jenis }}" data-hari="{{ $item->jumlah_hari }}" data-satuan="{{ $item->satuan }}" data-harga="{{ $item->harga }}" value="{{ $item->id }}">{{ $item->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            
                                            <div class="col-sm-12">
                                            <label class="control-label">Jenis</label>
                                                <input type="text" id="jenis_input" readonly placeholder="Jenis Paket" name="paket_jenis" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            
                                            <div class="col-sm-12">
                                            <label class="control-label">Hari</label>
                                                <input type="text" id="hari_input" readonly placeholder="Lamanya Hari" name="paket_hari" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                            <label class="control-label">Harga</label>
                                                <input type="text" id="harga_input" readonly placeholder="Harga Paket" name="paket_harga" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                            <label class="control-label">Satuan</label>
                                                <input type="text" placeholder="Berat Satuan" id="satuan_input" name="paket_satuan" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                            <label class="control-label">Berat</label>
                                                <input type="text" id="berat_input" placeholder="Berat Cucian" name="paket_berat" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            
                                            <div class="col-sm-12">
                                            <label class="control-label">Tangal Masuk</label>
                                                <input type="text" id="tgl_masuk_input" name="tgl_masuk" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            
                                            <div class="col-sm-12">
                                            <label class="control-label">Tangal Keluar</label>
                                                <input type="text" readonly id="tgl_keluar_input" name="tgl_keluar" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            
                                            <div class="col-sm-12">
                                            <label class="control-label">Jenis Pembayaran</label>
                                                <select name="pembayaran_id" id="" class="form-control">
                                                    <option>Select Jenis Pembayaran</option>
                                                    @foreach($jenis_pembayaran as $pembayaran)
                                                        <option value="{{ $pembayaran->id }}">{{ $pembayaran->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            
                                            <div class="col-sm-12">
                                            <label class="control-label">Status Bayar</label>
                                                <select name="status_bayar" id="" class="form-control">
                                                    <option>Select Status Bayar</option>
                                                    <option value="1">Sudah Bayar</option>
                                                    <option value="0">Belum Bayar</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                            <label class="control-label">Kode Transaksi</label>
                                                <input type="text" readonly id="kode_transaksi" name="kode_transaksi" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                            <label class="control-label">Jumlah Bayar</label>
                                                <input type="text" id="jml_bayar_input" name="jumlah_bayar" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            
                                            <div class="col-sm-12">
                                            <label class="control-label">Diskon</label>
                                                <input type="text" id="diskon_input" name="diskon" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                            <label class="control-label">Total Bayar</label>
                                                <input type="text" readonly id="total_bayar_input" name="total_bayar" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            
                                            <div class="col-sm-12">
                                            <label class="control-label">Kembalian</label>
                                                <input type="text" readonly id="kembalian_input" name="kembalian" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                            <label class="control-label">Hutang</label>
                                                <input type="text" readonly id="hutang_input" name="hutang" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6" style="display: flex; justify-content: right;">
                                        <button class="btn btn-primary" type="submit">Buat Transaksi</button>
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

@push('js')
    <script>
        $('#konsumen_select').on('change', function(e){
            let kode_user = $('option:selected', this).attr('data-kode_user')
            let no_telp = $('option:selected', this).attr('data-no_telp')

            $('#kode_user_input').val(kode_user)
            $('#no_telp_input').val(no_telp)
        })

        $('#paket_select').on('change', function(e){
            let jenis = $('option:selected', this).attr('data-jenis')
            let hari = $('option:selected', this).attr('data-hari')
            let harga = $('option:selected', this).attr('data-harga')
            let satuan = $('option:selected', this).attr('data-satuan')

            $('#jenis_input').val(jenis)
            $('#hari_input').val(hari)
            $('#harga_input').val(harga)
            $('#satuan_input').val(satuan)

            let date = new Date()

            let day = date.getDate()
            let month = date.getMonth() + 1
            let year = date.getFullYear()

            let dateNow = `${day}/${month}/${year}`
            $('#tgl_masuk_input').val(dateNow)

            let dateOut = new Date(date.setDate(date.getDate() + parseInt(hari)))
            let dayOut = dateOut.getDate()
            let monthOut = dateOut.getMonth() + 1
            let yearOut = dateOut.getFullYear()

            let dateOutNow = `${dayOut}/${monthOut}/${yearOut}`
            $('#tgl_keluar_input').val(dateOutNow)

            
        })

        $('#berat_input').on('keyup', function(e){
            let berat = $(this).val()
            let harga = $('#harga_input').val()

            let jml_bayar = berat * harga

            $('#total_bayar_input').val(jml_bayar)
        })

        $('#diskon_input').on('keyup', function(e){
            let diskon = $(this).val()
            let jml_bayar = $('#total_bayar_input').val()

            let total_bayar = jml_bayar - (jml_bayar * (diskon/100))

            $('#total_bayar_input').val(total_bayar)
        })

        $('#jml_bayar_input').on('keyup', function(e){
            let jml_bayar = $(this).val()
            let total_bayar = $('#total_bayar_input').val()

            let kembalian = jml_bayar - total_bayar

            if(kembalian < 0){
                $('#kembalian_input').val(0)
                $('#hutang_input').val(Math.abs(kembalian))
            } else {
                $('#hutang_input').val(0)
                $('#kembalian_input').val(kembalian)
            }
        })

        let date = new Date()
        let day = date.getDate()
        let month = date.getMonth() + 1
        let year = date.getFullYear()

        // 'TRX' + day + month + year + Math.floor(Math.random() * 1000)

        $('#kode_transaksi').val(`TRX${day}${month}${year}${Math.floor(Math.random() * 1000)}`)
        
    </script>
@endpush
