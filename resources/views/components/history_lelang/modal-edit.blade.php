<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit History Lelang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="id">

                <div class="form-group">
                    <label for="lelang_id" class="control-label">Lelang</label>
                    <!-- <input type="text" class="form-control" id="lelang_id"> -->
                    <select  name="lelang_id-edit" id="lelang_id-edit" class="form-control">
                    @foreach($lelangs as $lelang)
                    <option value="{{$lelang->id}}">{{ $lelang->harga_akhir }}</option> 
                    @endforeach  
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-lelang_id-edit"></div>
                </div>
                
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
                    <label for="name" class="control-label">Penawaran Harga</label>
                    <input type="text" class="form-control" id="penawaran_harga-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-penawaran_harga-edit"></div>
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
    //button create history_lelang event
    $('body').on('click', '#btn-edit-history_lelang', function () {

        let id = $(this).data('id');

        //fetch detail history_lelang with ajax
        $.ajax({
            url: `/history_lelangs/${id}`,
            type: "GET",
            cache: false,
            success:function(response){

                //fill data to form
                $('#id').val(response.data.id);
                $('#lelang_id').val(response.data.lelang_id);
                $('#barang_id-edit').val(response.data.barang_id);
                $('#user_id-edit').val(response.data.user_id);
                $('#penawaran_harga-edit').val(response.data.penawaran_harga);

                //open modal
                $('#modal-edit').modal('show');
            }
        });
    });

    //action update history_lelang
    $('#update').click(function(e) {
        e.preventDefault();

        //define variable
        let id   = $('#id').val();
        let lelang_id   = $('#lelang_id-edit').val();
        let barang_id = $('#barang_id-edit').val();
        let user_id = $('#user_id-edit').val();
        let penawaran_harga   = $('#penawaran_harga-edit').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/history_lelangs/${id}`,
            type: "POST",
            cache: false,
            data: {
                "lelang_id": lelang_id,
                "barang_id": barang_id,
                "user_id": user_id,
                "penawaran_harga": penawaran_harga,
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

                //data history_lelang
                let history_lelangs = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.lelang_id}</td>
                        <td>${response.data.barang_id}</td>
                        <td>${response.data.user_id}</td>
                        <td>${response.data.penawaran_harga}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-history_lelang" data-id="${response.data.id}" class="btn btn-info btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-history_lelang" data-id="${response.data.id}" class="btn btn-warning btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;
                
                //append to history_lelang data
                $(`#index_${response.data.id}`).replaceWith(history_lelang);

                //close modal
                $('#modal-edit').modal('hide');
                

            },
            /* error:function(error){
                
                if(error.responseJSON.lelang[0]) {

                    //show alert
                    $('#alert-lelang-edit').removeClass('d-none');
                    $('#alert-lelang-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-lelang-edit').html(error.responseJSON.lelang[0]);
                } 

                if(error.responseJSON.barang[0]) {

                    //show alert
                    $('#alert-barang-edit').removeClass('d-none');
                    $('#alert-barang-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-barang-edit').html(error.responseJSON.barang[0]);
                } 

                if(error.responseJSON.user[0]) {

                    //show alert
                    $('#alert-user-edit').removeClass('d-none');
                    $('#alert-user-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-user-edit').html(error.responseJSON.user[0]);
                } 

                    if(error.responseJSON.penawaran_harga[0]) {

                    //show alert
                    $('#alert-penawaran_harga-edit').removeClass('d-none');
                    $('#alert-penawaran_harga-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-penawaran_harga-edit').html(error.responseJSON.penawaran_harga[0]);
                } 

            } 
            */
            error: function(xhr, status, error) {
               alert(xhr.responseText);
            } 
  
        });

    });

</script>