<!-- Modal -->
<div class="modal fade" id="modal-penawaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">IKUT lelang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                
            <input type="hidden" id="jid">
               <!--  <input type="hidden" id="lelang_idr"> -->
                <input type="hidden" id="jbarang_id">
                <input type="hidden" id="jtgl_lelang">
                <input type="hidden" id="juser_id">
                <input type="hidden" id="jstatus">

                <div class="form-group">
                    <label for="jharga_akhir" class="control-label">Masukkan Harga Penawaran</label>
                    <input type="text" class="form-control" id="jharga_akhir">
                    <!-- <input type="text" class="form-control" id="penawaran_harga"> -->
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-info" id="update-penawaran">SIMPAN PENAWARAN</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create lelang event
    $('body').on('click', '#btn-penawaran', function () {

        
        let lelang_id = $(this).data('id');
        //let histlelang_id = $(this).data('id');

        //fetch detail lelang with ajax
        $.ajax({
            url: `/lelangs/${lelang_id}`,
            //url: `/history_lelangs/${histlelang_id}`,
            type: "GET",
            cache: false,
            success:function(response){

                //fill data to form
                $('#jid').val(response.data.id);
                //$('#lelang_id').val(response.data.lelang_id);
                $('#jbarang_id').val(response.data.barang_id);
                $('#jtgl_lelang').val(response.data.tgl_lelang);
                $('#jharga_akhir').val(response.data.harga_akhir);
                //$('#penawaran_harga').val(response.data.penawaran_harga);
                $('#juser_id').val(response.data.user_id);
                $('#jstatus').val(response.data.status);

                //open modal
                $('#modal-penawaran').modal('show');
            }
        });
    });

    //action update lelang
    $('#update-penawaran').click(function(e) {
        e.preventDefault();

        //define variable
        let lelang_id = $('#jid').val();
        let barang_id   = $('#jbarang_id').val();
        let tgl_lelang = $('#jtgl_lelang').val();
        let harga_akhir   = $('#jharga_akhir').val();
        let user_id = $('#juser_id').val();
        let status = $('#jstatus').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/lelangs/${lelang_id}`,
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
            async: true,
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
                            <a href="javascript:void(0)" id="btn-penawaran" data-id="${response.data.id}" class="btn btn-info bi bi-dpad-fill mb-2">Ikut Lelang</a>
                        </td>
                    </tr>
                `;
                
                //append to lelang data
                $(`#index_${response.data.id}`).replaceWith(lelang);

                //close modal
                $('#modal-penawaran').modal('hide');
                

            },

            /* error:function(error){
                
                if(error.responseJSON.barang_id[0]) {

                    //show alert
                    $('#alert-barang_id-edit').removeClass('d-none');
                    $('#alert-barang_id-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-barang_id-edit').html(error.responseJSON.barang_id[0]);
                } 

                if(error.responseJSON.tgl_lelang[0]) {

                    //show alert
                    $('#alert-tgl_lelang-edit').removeClass('d-none');
                    $('#alert-tgl_lelang-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-tgl_lelang-edit').html(error.responseJSON.tgl_lelang[0]);
                } 

                if(error.responseJSON.harga_akhir[0]) {

                    //show alert
                    $('#alert-harga_akhir-edit').removeClass('d-none');
                    $('#alert-harga_akhir-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-harga_akhir-edit').html(error.responseJSON.harga_akhir[0]);
                } 

                if(error.responseJSON.user_id[0]) {

                    //show alert
                    $('#alert-user_id-edit').removeClass('d-none');
                    $('#alert-user_id-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-user_id-edit').html(error.responseJSON.user_id[0]);
                } 

                if(error.responseJSON.status[0]) {

                    //show alert
                    $('#alert-status-edit').removeClass('d-none');
                    $('#alert-status-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-status-edit').html(error.responseJSON.status[0]);
                } 

            } */

        });
        
        $.ajax({
            url: `/history_lelangs`,
            type: "POST",
            cache: false,
            data: {
                "lelang_id": lelang_id,
                "barang_id": barang_id,
                "penawaran_harga": harga_akhir,
                "user_id": user_id,
                "_token": token
            },
            async: true,
            success: function(response){
                //show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });
            }

        });

    });

</script>