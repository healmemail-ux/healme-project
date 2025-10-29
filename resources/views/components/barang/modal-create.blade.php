<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH BARANG</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                    <label for="name" class="control-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama_barang"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">Tanggal</label>
                    <input type="date" class="form-control" id="tgl">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tgl"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">Harga Awal</label>
                    <input type="text" class="form-control" id="harga_awal">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-harga_awal"></div>
                </div>
                
                
                <div class="form-group">
                    <label class="control-label">Deskripsi Barang</label>
                    <textarea class="form-control" id="deskripsi_barang" rows="4"></textarea>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-deskripsi_barang"></div>
                </div>

                <div class="form-group">
                    <label >Image</label>
                    <input type="file" id="image">
                </div>

               

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-warning" id="store">SIMPAN</button>
            </div>
     
        </div>
    </div>
</div>

<script>
    //button create barang event
    $('body').on('click', '#btn-create-barang', function () {

        //open modal
        $('#modal-create').modal('show');
    });
  
    //action create barang
    $('#store').click(function(e) {
        e.preventDefault();
        
        //define variable
        let formData = new FormData();
        let nama_barang   = $('#nama_barang').val();
        let tgl = $('#tgl').val();
        let harga_awal = $('#harga_awal').val();
        let deskripsi_barang = $('#deskripsi_barang').val(); 
        let image = $('#image')[0].files[0];
        let token   = $("meta[name='csrf-token']").attr("content");
        
        formData.append('nama_barang',nama_barang);
        formData.append('tgl',tgl);
        formData.append('harga_awal',harga_awal);
        formData.append('deskripsi_barang', deskripsi_barang);
        formData.append('image', image);
        formData.append('_token',token);
        
        //ajax
        $.ajax({

            url: `/barangs`,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            /*data: {
                "nama_barang": nama_barang,
                "tgl": tgl,
                "harga_awal": harga_awal,
                "deskripsi_barang": deskripsi_barang,
                "image": image,
                "_token": token
            },*/
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
                        <td><img src="{{ asset('images') }}/${response.data.image} width="100" </td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-barang" data-id="${response.data.id}" class="btn btn-info btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-barang" data-id="${response.data.id}" class="btn btn-warning btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;
                
                //append to table
                $('#table-barangs').prepend(barang);
                
                //clear form
                $('#nama_barang').val('');
                $('#tgl').val('');
                $('#harga_awal').val('');
                $('#deskripsi_barang').val('');
                $('#image').val('');

                //close modal
                $('#modal-create').modal('hide');
                

            },
            /*
            error:function(error){
                if(error.responseJSON.nama_barang[0]) {

                //show alert
                $('#alert-nama_barang').removeClass('d-none');
                $('#alert-nama_barang').addClass('d-block');

                //add message to alert
                $('#alert-nama_barang').html(error.responseJSON.nama_barang[0]);
                } 

                if(error.responseJSON.tgl[0]) {

                //show alert
                $('#alert-tgl').removeClass('d-none');
                $('#alert-tgl').addClass('d-block');

                //add message to alert
                $('#alert-tgl').html(error.responseJSON.tgl[0]);
                } 

                if(error.responseJSON.harga_awal[0]) {

                //show alert
                $('#alert-harga_awal').removeClass('d-none');
                $('#alert-harga_awal').addClass('d-block');

                //add message to alert
                $('#alert-harga_awal').html(error.responseJSON.pasword[0]);
                } 

                if(error.responseJSON.deskripsi_barang[0]) {

                //show alert
                $('#alert-deskripsi_barang').removeClass('d-none');
                $('#alert-deskripsi_barang').addClass('d-block');

                //add message to alert
                $('#alert-deskripsi_barang').html(error.responseJSON.deskripsi_barang[0]);
                }

                
                 if(error.responseJSON.image[0]) {

                //show alert
                $('#alert-image').removeClass('d-none');
                $('#alert-image').addClass('d-block');

                //add message to alert
                $('#alert-image').html(error.responseJSON.image[0]);
                }

            
                
                
            } */

            error: function(xhr, status, error) {
               alert(xhr.responseText);
            }
        });

    });

</script>