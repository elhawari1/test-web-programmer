@extends('layout_admin.index')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0"><span style="color: #DCDCDC">Daftar Product</span>
                        <i class="fa-solid fa-chevron-right fa-2xs"></i> Edit Product
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="/update/product/{{ $product->id_product }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="text-start">
                    <div class="row align-items-start">
                        <div class="col-4">
                            <label class="form-label">Kategori</label>
                            <select class="form-control" name="id_category" id="cars">
                                @foreach ($category as $data)
                                    <option value="{{ $data->id_category }}"
                                        @if ($data->id_category == $product->id_category) selected @endif>{{ $data->name }}</option>
                                    @error('id_category')
                                        <p class="tex text-danger">{{ $message }}</p>
                                    @enderror
                                @endforeach
                            </select>
                        </div>
                        <div class="col-8">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                            @error('name')
                                <p class="tex text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="text-start pt-3">
                    <div class="row align-items-start">
                        <div class="col">
                            <label class="form-label">Harga Beli</label>
                            <input type="number" name="harga_beli" id="harga_beli" class="form-control"
                                value="{{ $product->harga_beli }}">
                            @error('harga_beli')
                                <p class="tex text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="form-label">Harga Jual</label>
                            <input type="text" name="harga_jual" id="harga_jual" class="form-control"
                                value="{{ $product->harga_jual }}" readonly>
                            @error('harga_jual')
                                <p class="tex text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="form-label">Stok Barang</label>
                            <input type="number" name="stok" class="form-control" value="{{ $product->stok }}">
                            @error('stok')
                                <p class="tex text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="text-start pt-3">
                    <div class="row align-items-start">
                        <label class="form-label">Image</label>

                        <div class="col-8">
                            <input id="input-fa" type="file" name="image" value="{{ old('image') }}"
                                class="form-control file" data-browse-on-zone-click="true">
                            @error('image')
                                <p class="tex text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('image_product/' . $product->image) }}" alt="Product Image"
                                style="height: 350px; weight: 250px; padding-bottom: 10px;">
                        </div>
                    </div>
                </div>

                <div class="text-center pt-3 pb-3">
                    <div class="col">
                        <a href="/" type="submit" class="btn btn-outline-danger mr-3">Batalkan</a>
                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('js')
    <script>
        document.getElementById('harga_beli').addEventListener('input', function() {
            var harga_beli = parseFloat(this.value);
            var harga_jual = parseInt(harga_beli * 1.3); // 30% dari harga_beli ditambah harga_beli
            document.getElementById('harga_jual').value = harga_jual;
        });
    </script>
@endsection
