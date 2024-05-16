@extends('template.base')

@section('title', 'Form reservasi')

@section('content')
<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Peminjaman</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><a href="">Data reservasi</a></li>
                    <li class="breadcrumb-item active">Form reservasi</li>
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
                    <form action="{{route('customer.create.reservasi')}}" method="post" enctype="multipart/form-data">
                        @csrf
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
        .create(document.querySelector('#artikel'))
        .catch(error => {
            console.error(error);
        });
</script>

@endsection