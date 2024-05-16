@extends('template.base')

@section('title', 'buku')

@section('content')

<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data buku</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data buku</li>
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
                    <div class="card-header">
                       <a href="{{ route('buku.create') }}" class="btn btn-primary btn-md">Add Produk </a>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <form action="#" method="get">
                                    <div class="input-group-append">
                                        <input type="search" name="search" class="form-control float-right" placeholder="Search">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <!-- Alert Create-->
                        @if(Session::get('Create'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('create')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                        </div>
                        @endif
                        <!-- End Alert Create-->
                        <!-- Alert Delete-->
                        @if(Session::get('delete'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('delete')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                        </div>
                        @endif
                        <!-- End Alert Delete-->
                        <!-- Alert Update-->
                        @if(Session::get('update'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ Session::get('update')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                        </div>
                        @endif
                        <!-- End Alert Update-->

                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>gendre id</th>
                                    <th>jenis id</th>
                                    <th>Judul Buku</th>
                                    <th>Author</th>
                                    <th>thumbnail</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($buku as $row)
                                <tr>
                                <td>
                                        <a href="{{route('buku.edit', $row->id)}}" class="btn btn-secondary" >Edit</a>
                                        <a href="Admin.buku.deleteBuku" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$row->id}}">Delete</a>
                                    </td>
                                    <td>
                                        <!--  ngeluarin foto cara ke dua-->
                                        <img src="{{asset('storage/'. $row->thumbnail)}}" alt="{{$row->title }}" class="img-fluid">
                                    </td>
                                    <td>{{$row->jeniss->jenis ?? ''}}</td>
                                    <td>{{$row->gendres->gendre ?? ''}}</td>
                                    <td>{{$row->judul}}</td>
                                    <td>{{$row->author}}</td>
                                    <td>
                                        @if($row->status == 1)
                                        <span class="badge badge-success">Tersedia</span>
                                        @elseif($row->status ==2)
                                        <span class="badge badge-danger">Penuh</span>
                                        @endif
                                    </td>
                                    <td><a href="" class="btn btn-primary" data-toggle="modal" data-target="#">Deskripsi</a></td>
                                </tr>
                                @include('Admin.buku.deleteBuku')
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>

</section>
<!-- End Main Content -->
@endsection