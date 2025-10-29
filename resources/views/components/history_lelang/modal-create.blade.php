<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH HISTORY LELANG</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="name" class="control-label">Lelang</label>
                    <!-- <input type="text" class="form-control" id="lelang_id"> -->
                    <select name="lelang_id" id="lelang_id" class="form-control">
                    @foreach($lelangs as $lelang)
                    <option value="{{$lelang->id}}">{{ $lelang->harga_akhir}}</option>
                    @endforeach
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-lelang_id"></div>
                </div>
                

                <div class="form-group">
                    <label for="name" class="control-label">Nama Barang</label>
                    <!-- <input type="text" class="form-control" id="barang_id"> -->
                    <select name="barang_id" id="barang_id" class="form-control">
                    @foreach($barangs as $barang)
                    <option value="{{$barang->id}}">{{ $barang->nama_barang}}</option>
                    @endforeach
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-barang_id"></div>
                </div>


                <div class="form-group">
                    <label class="control-label">User</label>
                    <!-- <input type="text" class="form-control" id="user_id"> -->
                    <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{ $user->name}}</option>
                    @endforeach
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-user_id"></div>
                </div>


                <div class="form-group">
                    <label class="control-label"> Penawaran Harga</label>
                    <input type="text" class="form-control" id="penawaran_harga">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-penawaran_harga"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-info" id="store">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create history_lelang event
    $('body').on('click', '#btn-create-history_lelang', function () {

        //open modal
        $('#modal-create').modal('show');
    });

    //action create history_lelang
    $('#store').click(function(e) {
        e.preventDefault();

        //define variable
        let lelang_id   = $('#lelang_id').val();
        let barang_id = $('#barang_id').val();
        let user_id   = $('#user_id').val();
        let penawaran_harga = $('#penawaran_harga').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/history_lelangs`,
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
                let history_lelang = `
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
                
                //append to table
                $('#table-history_lelangs').prepend(history_lelang);
                
                //clear form
                $('#lelang_id').val('');
                $('#barang_id').val('');
                $('#user_id').val('');
                $('#penawaran_harga').val('');
                //close modal
                $('#modal-create').modal('hide');
                

            },
            /*  error:function(error){
                
                if(error.responseJSON.lelang_id[0]) {

                    //show alert
                    $('#alert-lelang_id').removeClass('d-none');
                    $('#alert-lelang_id').addClass('d-block');

                    //add message to alert
                    $('#alert-lelang_id').html(error.responseJSON.lelang_id[0]);
                } 

                if(error.responseJSON.barang_id[0]) {

                    //show alert
                    $('#alert-barang_id').removeClass('d-none');
                    $('#alert-barang_id').addClass('d-block');

                    //add message to alert
                    $('#alert-barang_id').html(error.responseJSON.barang_id[0]);
                } 
                if(error.responseJSON.user_id[0]) {

                    //show alert
                    $('#alert-user_id').removeClass('d-none');
                    $('#alert-user_id').addClass('d-block');

                    //add message to alert
                    $('#alert-user_id').html(error.responseJSON.user_id[0]);
                }
                if(error.responseJSON.penawaran_harga-[0]) {

                    //show alert
                    $('#alert-penawaran_harga').removeClass('d-none');
                    $('#alert-penawaran_harga').addClass('d-block');

                    //add message to alert
                    $('#alert-penawaran_harga').html(error.responseJSON.penawaran_harga[0]);
                } 

 */
                    error: function(xhr, status, error) {
                                alert(xhr.responseText);

            }
        });

    });

</script>