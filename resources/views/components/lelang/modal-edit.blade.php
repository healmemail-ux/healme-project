<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT LELANG</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="id">

                <div class="form-group">
                    <label for="barang_id" class="control-label">Nama Barang</label>
                    <!-- <input type="text" class="form-control" id="barang_id"> -->
                    <select  name="barang_id-edit" id="barang_id-edit" class="form-control">
                    @foreach($barangs as $barang)
                    <option value="{{$barang->id}}">{{ $barang->nama_barang }}</option> 
                    @endforeach  
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-barang_id-edit"></div>
                </div>
                
                <div class="form-group">
                    <label for="name" class="control-label">Tanggal Lelang</label>
                    <input type="date" class="form-control" id="tgl_lelang-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tgl_lelang-edit"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Harga Akhir</label>
                    <input type="text" class="form-control" id="harga_akhir-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-harga_akhir-edit"></div>
                </div>

                <div class="form-group">
                    <label for="user_id" class="control-label">User</label>
                    <!-- <input type="text" class="form-control" id="barang_id"> -->
                    <select  name="user_id-edit" id="user_id-edit" class="form-control">
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{ $user->name }}</option> 
                    @endforeach  
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-user_id-edit"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">Status</label>
                    <select  id="status-edit" class="form-control">
                    <option value="dibuka">dibuka</option>
                    <option value="ditutup">ditutup</option>
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-status-edit"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-warning" id="update">UPDATE</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create lelang event
    $('body').on('click', '#btn-edit-lelang', function () {

        let id = $(this).data('id');

        //fetch detail lelang with ajax
        $.ajax({
            url: `/lelangs/${id}`,
            type: "GET",
            cache: false,
            success:function(response){

                //fill data to form
                $('#id').val(response.data.id);
                $('#barang_id').val(response.data.barang_id);
                $('#tgl_lelang-edit').val(response.data.tgl_lelang);
                $('#harga_akhir-edit').val(response.data.harga_akhir);
                $('#user_id-edit').val(response.data.user_id);
                $('#status-edit').val(response.data.status);

                //open modal
                $('#modal-edit').modal('show');
            }
        });
    });

    //action update lelang
    $('#update').click(function(e) {
        e.preventDefault();

        //define variable
        let id   = $('#id').val();
        let barang_id   = $('#barang_id-edit').val();
        let tgl_lelang = $('#tgl_lelang-edit').val();
        let harga_akhir = $('#harga_akhir-edit').val();
        let user_id   = $('#user_id-edit').val();
        let status = $('#status-edit').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/lelangs/${id}`,
            type: "PUT",
            cache: false,
            data: {
                "barang_id": barang_id,
                "tgl_lelang": tgl_lelang,
                "harga_akhir": harga_akhir,
                "user_id": user_id,
                "status": status,
                "_token": token
            },
            success:function(response){

                //show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                //data lelang
                let lelang = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.barang_id}</td>
                        <td>${response.data.tgl_lelang}</td>
                        <td>${response.data.harga_akhir}</td>
                        <td>${response.data.user_id}</td>
                        <td>${response.data.status}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-lelang" data-id="${response.data.id}" class="btn btn-info btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-lelang" data-id="${response.data.id}" class="btn btn-warning btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;
                
                //append to lelang data
                $(`#index_${response.data.id}`).replaceWith(lelang);

                //close modal
                $('#modal-edit').modal('hide');
                

            },
            /* error:function(error){
                
                if(error.responseJSON.barang[0]) {

                    //show alert
                    $('#alert-barang-edit').removeClass('d-none');
                    $('#alert-barang-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-barang-edit').html(error.responseJSON.title[0]);
                } 

                if(error.responseJSON.tgl_lelang[0]) {

                    //show alert
                    $('#alert-tgl_lelang-edit').removeClass('d-none');
                    $('#alert-tgl_lelang-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-tgl_lelang-edit').html(error.responseJSON.content[0]);
                } 

                if(error.responseJSON.user[0]) {

                    //show alert
                    $('#alert-user-edit').removeClass('d-none');
                    $('#alert-user-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-user-edit').html(error.responseJSON.title[0]);
                } 

                    if(error.responseJSON.status[0]) {

                    //show alert
                    $('#alert-status-edit').removeClass('d-none');
                    $('#alert-status-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-status-edit').html(error.responseJSON.title[0]);
                } 

            } */

        });

    });

</script>