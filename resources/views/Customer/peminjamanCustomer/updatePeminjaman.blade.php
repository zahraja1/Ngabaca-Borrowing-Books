@extends('template.base')

@section('title', 'Form Edit peminjaman')

@section('content')
<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Edit peminjaman</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><a href="#">Data peminjaman</a></li>
                    <li class="breadcrumb-item active">Form peminjaman</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- ENd Header -->

<!-- Main Content -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{route('customer.update.peminjaman', $peminjaman->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div  class="card-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="user_id">Customer</label>
                                <select class="custom-select form-control-border  @error('user_id') is-invalid @enderror" name="user_id" id="user_id">
                                    <option value="">Pilih Customer</option>
                                    @foreach($user as $row)
                                    <option value="{{ $row->id }}" {{ old('user_id') == $row->id ? 'selected' : '' }}> {{$row->name ?? ''}} </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="buku_id">Judul Buku</label>
                                <select class="custom-select form-control-border  @error('buku_id') is-invalid @enderror" name="buku_id" id="buku_id">
                                    <option value="">Pilih Gendre Buku</option>
                                    @foreach($buku as $row)
                                    <option value="{{ $row->id }}" {{ old('buku_id') == $row->id ? 'selected' : '' }}> {{$row->judul}} </option>
                                    @endforeach
                                </select>
                                @error('buku_id')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kode_peminjaman">Kode Peminjaman</label>
                                <input type="text" name="kode_peminjaman" class="form-control @error('kode_peminjaman') is-invalid @enderror" id="kode_peminjaman" placeholder="Masukkan kode_peminjaman peminjaman ...">
                                @error('kode_peminjaman')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                                <input type="text" name="tanggal_peminjaman" class="form-control @error('tanggal_peminjaman') is-invalid @enderror" id="tanggal_peminjaman" placeholder="Masukkan tanggal_peminjaman peminjaman ...">
                                @error('tanggal_peminjaman')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                                <input type="text" name="tanggal_pengembalian" class="form-control @error('tanggal_pengembalian') is-invalid @enderror" id="tanggal_pengembalian" placeholder="Masukkan tanggal_pengembalian peminjaman ...">
                                @error('tanggal_pengembalian')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>   

            </div>
        </div>
    </div>
</section>

<!-- End Main Content -->

@endsection

@section('ckEditor')
<script>
    ClassicEditor
        .create(document.querySelector('#peminjaman'))
        .catch(error => {
            console.error(error);
        });
</script>

@endsection 