@extends('template.base')

@section('title', 'Form Edit jenis')

@section('content')
<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Edit jenis</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><a href="#">Data jenis</a></li>
                    <li class="breadcrumb-item active">Form jenis</li>
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
                    <form action="{{route('jenis.update', $jenis->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div  class="card-body">
                            <div class="form-group">
                                <label for="jenis">jenis Buku</label>
                                <input type="text" name="jenis" class="form-control @error('jenis') is-invalid @enderror" 
                                id="jenis" placeholder="Masukkan  jenis Buku ..." value="{{$jenis->jenis}}">
                                @error('jenis')
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
        .create(document.querySelector('#jenis'))
        .catch(error => {
            console.error(error);
        });
</script>

@endsection 