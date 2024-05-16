@extends('template.base')

@section('title', 'Form Edit Product')

@section('content')
<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Edit Customer</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><a href="#">Data Customer</a></li>
                    <li class="breadcrumb-item active">Form Customer</li>
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
                    <form action="{{route('customer.update', $customer->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div  class="card-body">
                            <div class="form-group">
                                <label for="notelp">Nomor Telepon</label>
                                <input type="text" name="notelp" class="form-control @error('notelp') is-invalid @enderror" 
                                id="notelp" placeholder="Masukkan Nomor Telepon ..." value="{{$customer->notelp}}">
                                @error('notelp')
                                <div class="invalid-feedback">
                                    <strong>{{ $message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="img_customer">Image Product</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="img_customer" class="custom-file-input  @error('img_customer') is-invalid @enderror" id="img_customer">
                                        <label class="custom-file-label" for="img_customer">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    @error('img_customer')
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
        .create(document.querySelector('#customer'))
        .catch(error => {
            console.error(error);
        });
</script>

@endsection 