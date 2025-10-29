<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH USER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" class="form-control" id="name">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name"></div>
                </div>
                

                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="text" class="form-control" id="email">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-email"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">Password</label>
                    <input type="text" class="form-control" id="password">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-password"></div>
                </div>

                <div class="form-group">
                    <label class="control-label">Telephone</label>
                    <input type="text" class="form-control" id="telp">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-telp"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Level</label>
                    <select id="level">
                    <option value="administrator">Administrator</option>
                    <option value="petugas">Petugas</option>
                    <option value="masyarakat">Masyarakat</option>
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create user event
    $('body').on('click', '#btn-create-user', function () {

        //open modal
        $('#modal-create').modal('show');
    });

    //action create user
    $('#store').click(function(e) {
        e.preventDefault();

        //define variable
        let name   = $('#name').val();
        let email = $('#email').val();
        let password   = $('#password').val();
        let telp = $('#telp').val();
        let level = $('#level').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/users`,
            type: "POST",
            cache: false,
            data: {
                "name": name,
                "email": email,
                "password": password,
                "telp": telp,
                "level": level,
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

                //data user
                let user = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.name}</td>
                        <td>${response.data.email}</td>
                        <td>${response.data.password}</td>
                        <td>${response.data.telp}</td>
                        <td>${response.data.level}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-user" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-user" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;
                
                //append to table
                $('#table-users').prepend(user);
                
                //clear form
                $('#name').val('');
                $('#email').val('');
                $('#password').val('');
                $('#telp').val('');
                $('#level').val('');

                //close modal
                $('#modal-create').modal('hide');
                

            },
            /* error:function(error){
                
                if(error.responseJSON.name[0]) {

                    //show alert
                    $('#alert-name').removeClass('d-none');
                    $('#alert-name').addClass('d-block');

                    //add message to alert
                    $('#alert-name').html(error.responseJSON.name[0]);
                } 

                if(error.responseJSON.email[0]) {

                    //show alert
                    $('#alert-email').removeClass('d-none');
                    $('#alert-email').addClass('d-block');

                    //add message to alert
                    $('#alert-email').html(error.responseJSON.email[0]);
                } 
                if(error.responseJSON.password[0]) {

                    //show alert
                    $('#alert-password').removeClass('d-none');
                    $('#alert-password').addClass('d-block');

                    //add message to alert
                    $('#alert-password').html(error.responseJSON.password[0]);
                } 

                if(error.responseJSON.telp-[0]) {

                    //show alert
                    $('#alert-telp').removeClass('d-none');
                    $('#alert-telp').addClass('d-block');

                    //add message to alert
                    $('#alert-telp').html(error.responseJSON.telp[0]);
                } 

                if(error.responseJSON.level-[0]) {

                    //show alert
                    $('#alert-level').removeClass('d-none');
                    $('#alert-level').addClass('d-block');

                    //add message to alert
                    $('#alert-level').html(error.responseJSON.level[0]);
                } 

            } 
            */
            error: function(xhr, status, error) {
               alert(xhr.responseText);
            } 

        });

    });

</script>