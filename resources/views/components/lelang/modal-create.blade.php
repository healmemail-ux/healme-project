<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH LELANG</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <input type="hidden" id="jid">
                    <input type="hidden" id="juser_id">

                <div class="form-group">
                    <label for="name" class="control-label"> Nama Barang</label>
                    <!-- <input type="text" class="form-control" id="nama_barang"> -->
                    <select name="barang_id" id="barang_id" class="form-control">
                    @foreach($barangs as $barang)
                    <option value="{{$barang->id}}">{{ $barang->nama_barang}}</option>
                    @endforeach
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-barang_id"></div>
                </div>
                

                <div class="form-group">
                    <label class="control-label">Tanggal Lelang</label>
                    <input type="date" class="form-control" id="tgl_lelang">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tgl_lelang"></div>
                </div>


                <div class="form-group">
                    <label class="control-label">Harga Akhir</label>
                    <input type="text" class="form-control" id="harga_akhir">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-harga_akhir"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Status</label>
                    <select id="status">
                    <option value="dibuka">Dibuka</option>
                    <option value="ditutup">Ditutup</option>
                    </select>
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
    //button create lelang event
    $('body').on('click', '#btn-create-lelang', function () {

        //open modal
        $('#modal-create').modal('show');
    });

    //action create lelang
    $('#store').click(function(e) {
        e.preventDefault();

        //define variable
        let barang_id   = $('#barang_id').val();
        let tgl_lelang = $('#tgl_lelang').val();
        let user_id   = $('#juser_id').val();
        let harga_akhir = $('#harga_akhir').val();
        let status = $('#status').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/lelangs`,
            type: "POST",
            cache: false,
            data: {
                "barang_id": barang_id,
                "tgl_lelang": tgl_lelang,
                "user_id": user_id,
                "harga_akhir": harga_akhir,
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
                        <td>${response.data.user_id}</td>
                        <td>${response.data.harga_akhir}</td>
                        <td>${response.data.status}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-lelang" data-id="${response.data.id}" class="btn btn-info btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-lelang" data-id="${response.data.id}" class="btn btn-warning btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;
                
                //append to table
                $('#table-lelangs').prepend(lelang);
                
                //clear form
                $('#barang_id').val('');
                $('#tgl_lelang').val('');
                $('#juser_id').val('');
                $('#harga_akhir').val('');
                $('#status').val('');

                //close modal
                $('#modal-create').modal('hide');
                

            },
            /* error:function(error){
                
                if(error.responseJSON.barang_id[0]) {

                    //show alert
                    $('#alert-barang_id').removeClass('d-none');
                    $('#alert-barang_id').addClass('d-block');

                    //add message to alert
                    $('#alert-barang_id').html(error.responseJSON.barang_id[0]);
                } 

                if(error.responseJSON.tgl_lelang[0]) {

                    //show alert
                    $('#alert-tgl_lelang').removeClass('d-none');
                    $('#alert-tgl_lelang').addClass('d-block');

                    //add message to alert
                    $('#alert-tgl_lelang').html(error.responseJSON.tgl_lelang[0]);
                } 
                if(error.responseJSON.user_id[0]) {

                    //show alert
                    $('#alert-user_id').removeClass('d-none');
                    $('#alert-user_id').addClass('d-block');

                    //add message to alert
                    $('#alert-user_id').html(error.responseJSON.user_id[0]);
                }
                if(error.responseJSON.harga_akhir-[0]) {

                    //show alert
                    $('#alert-harga_akhir').removeClass('d-none');
                    $('#alert-harga_akhir').addClass('d-block');

                    //add message to alert
                    $('#alert-harga_akhir').html(error.responseJSON.harga_akhir[0]);
                } 

                if(error.responseJSON.status-[0]) {

                    //show alert
                    $('#alert-status').removeClass('d-none');
                    $('#alert-status').addClass('d-block');

                    //add message to alert
                    $('#alert-status').html(error.responseJSON.status[0]);
               } 


            }
 */
error: function(xhr, status, error) {
               alert(xhr.responseText);
            } 
        });

    });

</script>