@extends('layouts.template.app')

@section('title')
    Tambah Alat
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Alat Baru</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ Route('item.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @include('item.form')

                            <!-- /.card-body -->
                            <a class="btn btn-info" href="{{ Route('item') }}">KEMBALI</a>
                            <input type="submit" class="btn btn-primary" value="SIMPAN">
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
