@include('menu')
<div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="history_lelangs" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="history_lelangs">Today</a></li>
                    <li><a class="dropdown-item" href="history_lelangs">This Month</a></li>
                    <li><a class="dropdown-item" href="history_lelangs">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Generate Laporan<span>| Today</span></h5>

                  <table class="table table-borderless">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistem Lelang Online </title>
    <style>
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12"> <h4 class="text-center">Sistem Lelang Online <a href="http://127.0.0.1:8000">Amelia-VintageStore</a></h4>
                <div class="card border-0 shadow-sm rounded-md mt-4">
                    <div class="card-body">


                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                    <th>User</th>
                                    <th>Date</th>
                              
                                </tr>
                            </thead>
                            <tbody id="table-history_lelangs">
                                @foreach($history_lelangs as $history_lelang)
                                <tr id="index_{{ $history_lelang->id }}">
                                    <td>{{ $history_lelang->user->name}}</td>
                                    <td>{{ $history_lelang->penawaran_harga}}</td>
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
    @include('components.history_lelang.modal-create')
    @include('components.history_lelang.modal-edit')
    @include('components.history_lelang.delete-history_lelang')
    @include('footer')