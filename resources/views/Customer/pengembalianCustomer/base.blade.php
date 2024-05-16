@extends('template.base')

@section('title', 'pengembalian')

@section('content')

 <!-- Header  -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data pengembalian</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data pengembalian</li>
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
                       <a href="{{route('customer.create.form.pengembalian')}}" class="btn btn-primary btn-md">Add Produk </a>
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
                                    <th>Nama Customer</th>
                                    <th>Tanggal Peminjamamn</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Judul</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengembalian as $row)
                                <tr>
                                <td>
                                        <a href="{{route('customer.update.form.customer', $row->id)}}" class="btn btn-secondary" >Edit</a>
                                        <a href="Customer.pengembalian.deletePengembalian" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$row->id}}">delete</a>
                                    </td>
                                    <td>{{$row->user->nama??''}}</td>
                                    <td>{{$row->peminjaman->tanggal_peminjaman??''}}</td>
                                    <td>{{$row->tanggal_pengembalian}}</td>
                                    <td>{{$row->buku->judul ?? ''}}</td>
                                    <td><a href="" class="btn btn-primary" data-toggle="modal" data-target="#show#">Deskripsi</a></td>
                                </tr>
                                @include('Customer.pengembalianCustomer.deletePengembalina')
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