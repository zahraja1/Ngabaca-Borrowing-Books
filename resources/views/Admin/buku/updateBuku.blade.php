@extends('template.base')

@section('title', 'Form Edit buku')

@section('content')
<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Edit buku</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><a href="#">Data buku</a></li>
                    <li class="breadcrumb-item active">Form buku</li>
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
                    <form action="{{route('buku.update', $buku->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div  class="card-body">
                        <div class="form-group">
                                <label for="gendre_id">Gendre buku</label>
                                <select class="custom-select form-control-border  @error('gendre_id') is-invalid @enderror" 
                                name="gendre_id" id="gendre_id">
                                    <option value="{{$buku->gendre_id}}">{{$buku->gendre->gendre_id}}</option>
                                    @foreach($gendre as $row)
                                    <option value="{{ $row->id }}" {{ old('gendre_id') == $row->id ? 'selected' : '' }}> {{$row->gendre}} </option>
                                    @endforeach
                                </select>
                                @error('gendre_id')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jenis_id">Jenis buku</label>
                                <select class="custom-select form-control-border  @error('jenis_id') is-invalid @enderror" 
                                name="jenis_id" id="jenis_id">
                                    <option value="{{$buku->jenis_id}}">{{$buku->jenis->jenis_id}}</option>
                                    @foreach($jenis as $row)
                                    <option value="{{ $row->id }}" {{ old('jenis_id') == $row->id ? 'selected' : '' }}> {{$row->jenis}} </option>
                                    @endforeach
                                </select>
                                @error('jenis_id')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul buku</label>
                                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" 
                                id="judul" placeholder="Masukkan Nama_produk buku ..." value="{{$buku->judul}}">
                                @error('judul')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>
                                @enderror
                                <label for="author">Author Buku</label>
                                <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" 
                                id="author" placeholder="Masukkan Nama_produk buku ..." value="{{$buku->author}}">
                                @error('author')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="thumbnail">Image buku</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="thumbnail" 
                                        class="custom-file-input  @error('thumbnail') is-invalid @enderror" id="thumbnail" value="{{$buku->thumbnail}}">
                                        <label class="custom-file-label" for="thumbnail">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    @error('thumbnail')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message}}</strong>
                                    </div>
                                    @enderror
                                </div>
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
        .create(document.querySelector('#buku'))
        .catch(error => {
            console.error(error);
        });
</script>

@endsection 