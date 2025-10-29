@include('menu')
<div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="users" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="users">Today</a></li>
                    <li><a class="dropdown-item" href="users">This Month</a></li>
                    <li><a class="dropdown-item" href="users">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Users<span>| Today</span></h5>

                  <table class="table table-borderless">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ujikom Amelia</title>
    <style>

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
            <h4 class="text-center">Sistem Lelang Online <a href="http://127.0.0.1:8000">Amelia-VintageStore</a></h4>
                <div class="card border-0 shadow-sm rounded-md mt-4">
                    <div class="card-body">

                        <a href="javascript:void(0)" class="btn  btn-primary bi bi-dpad-fill mb-2" id="btn-create-user">Tambah</a>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Telp</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody user_id="table-users">
                                @foreach($users as $user)
                                <tr id="index_{{ $user->id }}">
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email }}</td>
                                     <td>{{ $user->telp }}</td>
                                    <td>{{ $user->level }}</td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" id="btn-edit-user" data-id="{{ $user->id }}" class="btn btn-info bi bi-stars btn-sm">EDIT</a>
                                        <a href="javascript:void(0)" id="btn-delete-user" data-id="{{ $user->id }}" class="btn btn-warning btn-sm">DELETE</a>
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
    @include('components.users.modal-create')
    @include('components.users.modal-edit')
    @include('components.users.delete-user')
    @include('footer')