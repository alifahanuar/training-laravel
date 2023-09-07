@extends('layouts.template.app')

@section('title')
    Pengurusan Alat (Item)
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title bold">Senarai Alat</h2>
                            <a href="{{ Route('item.create') }}" class="btn btn-primary"> Alat Baru</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="myTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">Bilangan</th>
                                        <th>Nama Alat</th>
                                        <th>Keterangan</th>
                                        <th>Diurus Oleh</th>
                                        <th>Status</th>
                                        {{-- <th>Gambar</th> --}}
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->details }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>
                                                @if ($item->deleted_at)
                                                    Hapus
                                                @else
                                                    Aktif
                                                @endif
                                            </td>
                                             {{-- <td>
                                                @if($item->image)
                                                        <img src="{{ asset('uploads/'.$item->image) }}" style="height: 50px;width:100px;">
                                                @endif
                                                </td> --}}
                                            <td>
                                                @if (!$item->deleted_at)
                                                <a href="{{ Route('item.show', $item->id) }}"class="btn btn-success">Papar</a>
                                                <a href="{{ Route('item.edit', $item->id) }}"class="btn btn-info">Kemaskini</a>
                                                <a href="javascript:void(0)"class="btn btn-danger confirmation"data-id="#delete-data-{{ $item->id }}" data-title="{{ $item->title }}"><i class="fas fa-trash"></i></a>
                                                <form id="delete-data-{{ $item->id }}"action="{{ route('item.destroy', $item->id) }}"method="POST"class="d-none">
                                                    @csrf
                                                </form>
                                                @else
                                                <a href="javascript:void(0)"class="btn btn-danger restoration"data-id="#restore-data-{{ $item->id }}" data-title="{{ $item->title }}"><i class="fas fa-trash"></i></a>
                                                <form id="restore-data-{{ $item->id }}"action="{{ route('item.restore', $item->id) }}"method="POST"class="d-none">
                                                    @csrf
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">-- Data tidak wujud
                                                --< </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            {{-- {{ $users->links('vendor.pagination.pagination') }} --}}
                        </div>
                        <!-- /.card-body -->

                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@push('js')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();

            confirmation_dialog();
            restoration_dialog();


            function confirmation_dialog() {
                $(".confirmation").click(function() {
                    var id = $(this).data('id');
                    var title = $(this).data('title');
                    Swal.fire({
                        title: 'Confirmation',
                        html: "Are you sure you want to remove <b>" + title.toUpperCase() +
                            "</b>? You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#6259ca',
                        cancelButtonColor: '#f16d75',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value) {
                            $(id).submit();
                        }
                    });
                })
            }

            
            function restoration_dialog() {
                $(".restoration").click(function() {
                    var id = $(this).data('id');
                    var title = $(this).data('title');
                    Swal.fire({
                        title: 'Restoration',
                        html: "Are you sure you want to restore <b>" + title.toUpperCase() + "</b>?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#6259ca',
                        cancelButtonColor: '#f16d75',
                        confirmButtonText: 'Yes, restore it!'
                    }).then((result) => {
                        if (result.value) {
                            $(id).submit();
                        }
                    });
                })
            }
        });
    </script>
@endpush
