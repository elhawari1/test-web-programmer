@extends('layout_admin.index')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="/add/product" class="btn btn-outline-danger">
                            <i class="fa-solid fa-circle-plus"></i> Tambah Product
                        </a>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Produk</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Nama Product</th>
                                <th>Kategori Product</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('image_product/' . $data->image) }}" alt="Product Image"
                                            style="height: 70px; weight: 70px;">
                                    </td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->category->name }}</td>
                                    <td>Rp.{{ number_format($data->harga_beli, 0, ',', '.') }}</td>
                                    <td>Rp.{{ number_format($data->harga_jual, 0, ',', '.') }}</td>
                                    <td>{{ $data->stok }}</td>
                                    <td>
                                        <a href="/edit/product/{{ $data->id_product }}" class="btn btn-outline-primary">
                                            <i class="fa-solid fa-pen" title="Edit Produk"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-danger delete"
                                            data-id={{ $data->id_product }} data-name={{ $data->name }}
                                            title="Hapus Produk">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        @if (session('success'))
            Swal.fire({
                title: "Success!",
                text: "{{ session('success') }}",
                icon: "success"
            });
        @endif

        $('.delete').click(function() {
            var id_product = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            Swal.fire({
                title: 'Are you sure?',
                html: "You want delete this! <strong>" + name + "</strong>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/destroy/product/" + id_product + ""
                    Swal.fire(
                        'Deleted!',
                        'Data Deleted Successfully.',
                        'success'
                    )
                }
            })
        });
    </script>
@endsection
