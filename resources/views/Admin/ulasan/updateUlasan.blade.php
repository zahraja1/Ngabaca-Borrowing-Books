@extends('template.base')

@section('title', 'Form Edit ulasan')

@section('content')
<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Edit ulasan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><a href="#">Data ulasan</a></li>
                    <li class="breadcrumb-item active">Form ulasan</li>
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
                    <form action="{{route('ulasan.update', $ulasan->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div  class="card-body">
                            <div class="form-group">
                                <label for="komentar">Komentar Buku</label>
                                <input type="text" name="komentar" class="form-control @error('komentar') is-invalid @enderror" 
                                id="komentar" placeholder="Masukkan  komentar Buku ..." value="{{$ulasan->komentar}}">
                                @error('komentar')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="rating">Rating Buku</label>
                                <input type="text" name="rating" class="form-control @error('rating') is-invalid @enderror" 
                                id="rating" placeholder="Masukkan  rating Buku ..." value="{{$ulasan->rating}}">
                                @error('rating')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="buku_id">Judul Buku</label>
                                <select class="custom-select form-control-border  @error('buku_id') is-invalid @enderror" name="buku_id" id="buku_id">
                                    <option value="">Pilih Judul Buku</option>
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
        .create(document.querySelector('#ulasan'))
        .catch(error => {
            console.error(error);
        });
</script>

@endsection 