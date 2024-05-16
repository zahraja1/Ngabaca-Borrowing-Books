@extends('template.base')

@section('title', 'Form Edit gendre')

@section('content')
<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Edit gendre</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><a href="#">Data gendre</a></li>
                    <li class="breadcrumb-item active">Form gendre</li>
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
                <form action="{{ route('gendre.update', $gendre->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div  class="card-body">
                            <div class="form-group">
                                <label for="gendre">gendre Buku</label>
                                <input type="text" name="gendre" class="form-control @error('gendre') is-invalid @enderror" 
                                id="gendre" placeholder="Masukkan  gendre Buku ..." value="{{$gendre->gendre}}">
                                @error('gendre')
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
        .create(document.querySelector('#gendre'))
        .catch(error => {
            console.error(error);
        });
</script>

@endsection 