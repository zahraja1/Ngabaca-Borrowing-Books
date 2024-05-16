@extends('template.base')

@section('title', 'buku')

@section('content')

<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>buku</h1>
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
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>gendre id</th>
                                    <th>jenis id</th>
                                    <th>Judul Buku</th>
                                    <th>Author</th>
                                    <th width ="10%">thumbnail</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($buku as $row)
                                <tr>
                                    
                                    <td>
                                        <!--  ngeluarin foto cara ke dua-->
                                        <img src="{{asset('storage/'. $row->thumbnail)}}" alt="{{$row->title }}" class="img-fluid">
                                    </td>
                                    <td>{{$row->jenis->jenis}}</td>
                                    <td>{{$row->gendre->gendre}}</td>
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