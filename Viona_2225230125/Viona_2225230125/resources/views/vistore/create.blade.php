@extends('layout.template')

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
    
            <form action='{{ url('vistore') }}' method='post'>
            @csrf

                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <!-- Pesan -->
                    @if ($errors->any())
                    <div class="pt-1">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>    
                    @endif

                    <div class="mb-3 row">
                        <label for="id_produk" class="col-sm-2 col-form-label">ID Produk</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='id_produk' value="{{ Session::get ('id_produk') }}" id="id_produk">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_produk' value="{{ Session::get ('nama_produk') }}" id="nama_produk">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='stok' value="{{ Session::get ('stok') }}" id="stok">
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


