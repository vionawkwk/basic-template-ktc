@extends('layout.template')
<!-- START FORM -->
@section('konten')

<div class="d-flex justify-content-center align-items-center" style="height: 100vh; width: 100%;">
    <div class="my-3 p-3" style="background-color: #ffffff; border-radius: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) ; width: 80%;">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2 rounded">
            <div class="container">
              <!-- Left-aligned items -->
              <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    Vistore <i class="fas fa-store"></i>
                  </a>
              </div>
          
              <!-- Right-aligned items -->
              <div class="navbar-collapse justify-content-between">
                <!-- Navbar items on the right -->
                <ul class="navbar-nav">
                  <li class="nav-item">
                    
                  </li>
                  <li class="nav-item">
                    
                  </li>
                </ul>
          
                <!-- Profile Name on the right -->
                <span class="navbar-text text-white">
                    <a href="{{ url('vistore') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-home fa-arrow-left"></i> Kembali
                    </a>
                  </span>                                   
              </div>
            </div>
          </nav>

        <form action='{{ url('vistore/'.$data->id_produk) }}' method='post'>
            @csrf
            @method('PUT')
            <div class="my-3 p-1 bg-body rounded shadow-sm">
                <h3 class="mb-4">Edit Data Produk</h3>
                <div class="mb-3 row">
                    <label for="id_produk" class="col-sm-2 col-form-label">ID Produk</label>
                    <div class="col-sm-10">
                    {{ $data->id_produk }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='nama_produk' value="{{ $data->nama_produk }}" id="nama_produk">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='stok' value="{{ $data->stok }}" id="stok">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="stok" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="submit">
                          <i class="fas fa-save"></i> SIMPAN
                        </button>
                      </div>
                      
                </div>

            </div>
        </form>
        <!-- AKHIR FORM -->
    </div>
</div>

@endsection