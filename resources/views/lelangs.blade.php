@include('menu')
<div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="lelangs" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="lelangs">Today</a></li>
                    <li><a class="dropdown-item" href="lelangs">This Month</a></li>
                    <li><a class="dropdown-item" href="lelangs">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Your Feelings<span>| Today</span></h5>

                  <table class="table table-borderless">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Journaling </title>
    <style>
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12"> <h4 class="text-center">Journaling <a href="http://127.0.0.1:8000">HealMe!</a></h4>
                <div class="card border-0 shadow-sm rounded-md mt-4">
                    <div class="card-body">

                    @if (auth()->user()->level == "masyarakat")
                    <a href="javascript:void(0)" class="btn btn-primary bi bi-dpad-fill mb-2" id="btn-create-lelang">Tambah</a>
                    @endif

                        <table class="table table-bordered table-striped">
                            <thead>
                                    <th>Tanggal Lelang</th>
                                    <th>User</th>
                                    <th>Harga Akhir</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-lelangs">
                                @foreach($lelangs as $lelang)
                                <tr id="index_{{ $lelang->id }}">
                                    
                                    <td>{{ $lelang->tgl_lelang }}</td>
                                    <td>{{ $lelang->user->name}}</td>
                                    <td>{{ $lelang->harga_akhir }}</td>
                                    <td>{{ $lelang->status }}</td>
                                    <td class="text-center">
                                        @if (auth()->user()->level == "petugas")
                                        <a href="javascript:void(0)" id="btn-edit-lelang" data-id="{{ $lelang->id }}" class="btn btn-info bi bi-stars btn-sm">EDIT</a>
                                        <a href="javascript:void(0)" id="btn-delete-lelang" data-id="{{ $lelang->id }}" class="btn btn-warning btn-sm">DELETE</a>
                                        @endif
                                        @if (auth()->user()->level == "masyarakat" &  $lelang->status== 'dibuka' )
                                        <a href="javascript:void(0)" id="btn-penawaran" data-id="{{ $lelang->id }}" class="btn btn-info bi bi-dpad-fill mb-2">Ikut Lelang</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                        </table>
                        </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
    @include('components.lelang.modal-create')
    @include('components.lelang.modal-edit')
    @include('components.lelang.delete-lelang')
    @include('components.lelang.modal-penawaran')
    @include('footer')