<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
  #backgroundnonfiksi {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: #ffb15e;
  }

  #buku {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    justify-content: center;
    padding: 2rem;
    flex: 0 0 calc(25% - 20px);
    box-sizing: border-box;
  }

  .navbar-nav {
    max-width: 1280px;
    display: flex;
    flex-wrap: wrap;
    align-items: right;
    justify-content: space-between;
    margin-left: auto;
    margin-right: 52px;
    padding: 4px;
  }

  .navbar-brand {
    color: rgb(146 64 14);
    font-weight: 700;
  }

  .drop {
    background-color: white;
  }

  .dropdown-toggle {
    border: none;
  }

  .footer {
    font-size: smaller;
  }

  #filter {

    background-color: white;
    color: #f28c00;
  }

  #filter:hover {
    background-color: #f3f4f6;
    color: black;
  }

  .menu:hover {
    color: #f28c00;
    background-color: #ffb15e;
  }

  img {
    border-radius: 0.75rem;
    height: 250px;
    width: 100%;
  }

  #tulisan {
    font-weight: bold;
    font-size: 0.875rem;
  }

  #review {
    padding-left: 0.75rem;
    padding-right: 0.75rem;
    font-size: 0.875rem;
    border-width: 2px;
    border-radius: 0.75rem;
    background-color: #f28c00;
    color: #ffffff;
    transition: all 0.3s ease;
  }

  .flex-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
  }
</style>

<body>
  <!-- navbar -->
  <section>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">NGABACA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <div class="dropdown" id="drop">
                <button id="menu" class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Gendre
                </button>
                <ul class="dropdown-menu">
                  <li><a id="filter" class="dropdown-item" href="{{route('romance')}}">Romance</a></li>
                  <li><a id="filter" class="dropdown-item" href="{{route('fantacy')}}">Fantacy</a></li>
                  <li><a id="filter" class="dropdown-item" href="{{route('ilmiah')}}">Ilmiah</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <div class="dropdown" id="drop">
                <button id="menu" class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Jenis
                </button>
                <ul class="dropdown-menu">
                  <li><a id="filter" class="dropdown-item" href="{{route('fiksi')}}">Fiksi</a></li>
                  <li><a id="filter" class="dropdown-item" href="{{route('nonfiksi')}}">Non Fiksi</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <div class="dropdown" id="drop">
                <button id="menu" class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Profile
                </button>
                <ul class="dropdown-menu">
                  <li><a id="filter" class="dropdown-item" href="/customer/landingcustomer">Library</a></li>
                  <li><a id="filter" class="dropdown-item" href="#">Profile</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- buku -->
    <div id="backgroundnonfiksi">
      <h1 class='font-semibold text-center text-4xl mt-24 mb-8'>Our Collection</h1>
      <div class="flex-container">
        @foreach($buku as $row)
        <div id="buku">
          <div class='bg-white p-3 rounded-xl'>
            <div>
              <img src="{{asset('storage/'. $row->thumbnail)}}" alt="{{$row->title}}" />
            </div>
            <div class='p-2 mt-5'>
              <div>
                <h1 id="tulisan">{{$row->judul}}</h1>
                <h1 id="tulisan">{{$row->author}}</h1>
              </div>
              <div class='flex flex-row justify-between mt-3'>
                <div class='flex gap-2'>
                  <a href="/Review" id="review">Review</a>
                  <a href="/customer/Peminjaman" id="review">Borrow</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <!-- end buku -->
  </section>
  <!-- end navbar -->

  <!-- footer -->
  <footer class="sticky-footer bg-black">
    <div class="container my-auto">
      <div class="copyright text-center my-auto text-white">
        <span>Copyright &copy; Your Website 2021</span>
      </div>
    </div>
  </footer>
  <!-- end footer -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>