@include('menu')
<div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="barangs" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="barangs">Today</a></li>
                    <li><a class="dropdown-item" href="barangs">This Month</a></li>
                    <li><a class="dropdown-item" href="barangs">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Your Feelings<span>| Today</span></h5>

                  <table class="table table-borderless">
                    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
            <h4 class="text-center">Journaling <a href="http://127.0.0.1:8000">HealMe!</a></h4>
                <div class="card border-0 shadow-sm rounded-md mt-4">
                    <div class="card-body">

                        <a href="javascript:void(0)" class="btn btn-primary bi bi-dpad-fill mb-2" id="btn-create-barang">Tambah</a>
                    
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  
                                    <th>Date</th>
                                    <th>Years</th>
                                    <th>Deskription of Feature</th>
                                    <th>Image</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-barangs">
                                @foreach($barangs as $barang)
                                <tr id="index_{{ $barang->id }}">
                                    <td>{{ $barang->tgl }}</td>
                                    <td>{{ $barang->harga_awal }}</td>
                                    <td>{{ $barang->deskripsi_barang }}</td>
                                    <td><img src="{{ asset('images/'.$barang->image) }}"  width="100"></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" id="btn-edit-barang" data-id="{{ $barang->id }}" class="btn btn-info bi bi-stars btn-sm">EDIT</a>
                                        <a href="javascript:void(0)" id="btn-delete-barang" data-id="{{ $barang->id }}" class="btn btn-warning btn-sm">DELETE</a>
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
    @include('components.barang.modal-create')
    @include('components.barang.modal-edit')
    @include('components.barang.delete-barang')
    @include('footer')
