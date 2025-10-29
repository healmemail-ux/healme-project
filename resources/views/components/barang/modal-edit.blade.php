<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT BARANG</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="id">

                <div class="form-group">
                    <label for="name" class="control-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama_barang-edit"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Tanggal</label>
                    <input type="date" class="form-control" id="tgl-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tgl-edit"></div>
                </div>
                
                <div class="form-group">
                    <label for="name" class="control-label">Harga Awal</label>
                    <input type="number" class="form-control" id="harga_awal-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-harga_awal-edit"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">Deskripsi Barang</label>
                    <textarea class="form-control" id="deskripsi_barang-edit" rows="4"></textarea>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-deskripsi_barang-edit"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Image</label>
                    <input type="file" class="form-control" id="image-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-image-edit"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-info" id="update">UPDATE</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create barang event
    $('body').on('click', '#btn-edit-barang', function () {

        let id = $(this).data('id');

        //fetch detail barang with ajax
        $.ajax({
            url: `/barangs/${id}`,
            type: "GET",
            cache: false,
            success:function(response){

                //fill data to form
                $('#id').val(response.data.id);
                $('#nama_barang-edit').val(response.data.nama_barang);
                $('#tgl-edit').val(response.data.tgl);
                $('#harga_awal-edit').val(response.data.harga_awal);
                $('#deskripsi_barang-edit').val(response.data.deskripsi_barang);
                //$('#image-edit').val(response.data.image);

                //open modal
                $('#modal-edit').modal('show');
            }
        });
    });

    //action update barang
    $('#update').click(function(e) {
        e.preventDefault();

        //define variable
        let formData = new FormData();
        let id = $('#id').val();
        let nama_barang = $('#nama_barang-edit').val();
        let tgl = $('#tgl-edit').val();
        let harga_awal = $('#harga_awal-edit').val();
        let deskripsi_barang = $('#deskripsi_barang-edit').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        let image = $('#image-edit')[0].files[0]; 
    
        formData.append('nama_barang',nama_barang);
        formData.append('tgl',tgl);
        formData.append('harga_awal',harga_awal);
        formData.append('deskripsi_barang', deskripsi_barang);
        formData.append('image', image);
        formData.append('_token',token);
        formData.append('_method','PUT');

        //ajax
        $.ajax({

            url: `/barangs/${id}`,
            type: "POST",
            cache:false,
            data: formData,
            processData: false,
            contentType: false,
           /*  data: {
                "nama_barang": nama_barang,
                "tgl": tgl,
                "harga_awal": harga_awal,
                "deskripsi_barang": deskripsi_barang,
                //"image": image,
                "_token": token
            }, */
            success:function(response){

                //show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                //data barang
                let barang = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.nama_barang}</td>
                        <td>${response.data.tgl}</td>
                        <td>${response.data.harga_awal}</td>
                        <td>${response.data.deskripsi_barang}</td>
                        <td>img src="{{ asset('images/'.$barang->image) }}"/${response.data.image}"  width="100"></td>
                        
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-barang" data-id="${response.data.id}" class="btn btn-info btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-barang" data-id="${response.data.id}" class="btn btn-warning btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;
                
                //append to barang data
                $(`#index_${response.data.id}`).replaceWith(barang);

                //close modal
                $('#modal-edit').modal('hide');
                

            },
  /*            error:function(error){
                

                if(error.responseJSON.nama_barang[0]) {

                    //show alert
                    $('#alert-nama_barang-edit').removeClass('d-none');
                    $('#alert-nama_barang-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-nama_barang-edit').html(error.responseJSON.nama_barang[0]);
                } 

                if(error.responseJSON.tgl[0]) {

                    //show alert
                    $('#alert-tgl-edit').removeClass('d-none');
                    $('#alert-tgl-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-tgl-edit').html(error.responseJSON.tgl[0]);
                    } 

                if(error.responseJSON.harga_awal[0]) {

                        //show alert
                        $('#alert-harga_awal-edit').removeClass('d-none');
                        $('#alert-harga_awal-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-harga_awal-edit').html(error.responseJSON.harga_awal[0]);
                        } 

                if(error.responseJSON.deskripsi_barang[0]) {

                        //show alert
                        $('#alert-deskripsi_barang-edit').removeClass('d-none');
                        $('#alert-deskripsi_barang-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-deskripsi_barang-edit').html(error.responseJSON.deskripsi_barang[0]);
                        }
                        
                if(error.responseJSON.image[0]) {

                        //show alert
                        $('#alert-image-edit').removeClass('d-none');
                        $('#alert-image-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-image-edit').html(error.responseJSON.image[0]);
                    } 

            } 
 */
             error: function(xhr, status, error) {
               alert(xhr.responseText);
            } 

        });

    });

</script>