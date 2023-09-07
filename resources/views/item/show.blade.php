@extends('layouts.template.app')

@section('title')
    Paparan Maklumat Alat
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Maklumat Alat</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Alat</label><br>
                                {{ $item->title }}
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label><br>
                                {{ $item->details }}
                            </div>
                            <div class="form-group">
                                <label>Diurus Oleh</label><br>
                                {{ $item->user->name }}
                            </div>
                            <div>
                                @if($item->image)
                                <div class="form-group">
                                <label>Lampiran</label><br>
                                <img src="{{ asset('uploads/'.$item->image) }}" style="height: 50px;width:100px;">
                            </div>
                            @endif
                            <br>
                        <a class="btn btn-info" href="{{ Route('item') }}">KEMBALI</a>
                        
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
