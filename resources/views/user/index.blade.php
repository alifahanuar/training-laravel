@extends('layouts.template.app')

@section('title')
    Pengurusan Pengguna
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Senarai Pengguna</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="myTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">Bilangan</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $key => $user)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">-- Data tidak wujud --< </tr>
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
            $('#myTable').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#myTable_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush

