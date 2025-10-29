<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT USER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="user_id">

                <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" class="form-control" id="name-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name-edit"></div>
                </div>
                

                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="text" class="form-control" id="email-edit" rows="4"></textarea>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-email-edit"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Password</label>
                    <input type="text" class="form-control" id="password-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-password-edit"></div>
                </div>
                
                <div class="form-group">
                    <label for="name" class="control-label">Telephone</label>
                    <input type="text" class="form-control" id="telp-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-telp-edit"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">level</label>
                    <select id="level-edit" class="form-control">
                        <option value="administrator">Administrator</option>
                        <option value="petugas">Petugas</option>
                        <option value="masyarakat">Masyarakat</option>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-level-edit"></div>

                    </select>
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
    //button create user event
    $('body').on('click', '#btn-edit-user', function () {

        let user_id = $(this).data('id');

        //fetch detail user with ajax
        $.ajax({
            url: `/users/${user_id}`,
            type: "GET",
            cache: false,
            success:function(response){

                //fill data to form
                $('#user_id').val(response.data.id);
                $('#name-edit').val(response.data.name);
                $('#email-edit').val(response.data.email);
                $('#password-edit').val(response.data.password);
                $('#telp-edit').val(response.data.telp);
                $('#level-edit').val(response.data.level);

                //open modal
                $('#modal-edit').modal('show');
            }
        });
    });

    //action update user
    $('#update').click(function(e) {
        e.preventDefault();

        //define variable
        let user_id = $('#user_id').val();
        let name   = $('#name-edit').val();
        let email = $('#email-edit').val();
        let password   = $('#password-edit').val();
        let telp = $('#telp-edit').val();
        let level = $('#level-edit').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/users/${user_id}`,
            type: "PUT",
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
                
                //append to user data
                $(`#index_${response.data.id}`).replaceWith(user);

                //close modal
                $('#modal-edit').modal('hide');
                

            },
            error:function(error){
                
                if(error.responseJSON.name[0]) {

                    //show alert
                    $('#alert-name-edit').removeClass('d-none');
                    $('#alert-name-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-name-edit').html(error.responseJSON.name[0]);
                } 

                if(error.responseJSON.email[0]) {

                    //show alert
                    $('#alert-email-edit').removeClass('d-none');
                    $('#alert-email-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-email-edit').html(error.responseJSON.email[0]);
                } 

                if(error.responseJSON.password[0]) {

                    //show alert
                    $('#alert-password-edit').removeClass('d-none');
                    $('#alert-password-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-password-edit').html(error.responseJSON.password[0]);
                } 

                if(error.responseJSON.telp[0]) {

                    //show alert
                    $('#alert-telp-edit').removeClass('d-none');
                    $('#alert-telp-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-telp-edit').html(error.responseJSON.telp[0]);
                } 
                if(error.responseJSON.level[0]) {

                    //show alert
                    $('#alert-level').removeClass('d-none');
                    $('#alert-level').addClass('d-block');

                    //add message to alert
                    $('#alert-level').html(error.responseJSON.level[0]);
                } 

            }

        });

    });

</script>