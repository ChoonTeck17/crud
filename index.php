<?php
 include ("db.php");
?>

<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Basic Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <script defer src ="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src ="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script defer src ="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    <script defer src ="script.js"></script>

  </head>
  
  <body>
    <div class ="container">
      <div class ="row justify-content-center">
        <div class ="col-md8">

        <?php
        if(isset($_SESSION['status']) && $_SESSION['status'] != '')
        {

          ?>
          <div class="alert alert-success" role="alert">
            <strong>hey !</strong> <?php echo $_SESSION['status']; ?>
            <hr>
          </div>
          <?php
          unset ($_SESSION['status']);
        }

        ?>
          <div class ="card">
           <div class ="card-header">
           <br><h3 class= "text-center">Basic Crud using bootstrap 5.3</h3><br>

            
                  
           <!-- insert -->
                  <form action = "db.php" method ="POST">

                      <div class ="text-center">
                         <button type="button" class="btn btn-primary " name="insert" data-bs-toggle="modal" data-bs-target="#insert">Insert</button>
                      </div>

                  <div class="modal fade" id="insert" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="insert">Insert</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="mb-3">
                          <label for="" class="form-label">First Name </label>
                          <input type="text" class="form-control" name="fname" id="fname" placeholder="enter first name">
                          </div>
                          <div class="mb-3">
                          <label for="" class="form-label">Last Name </label>
                          <input type="text" class="form-control" name="lname" id="lname" placeholder="enter last name">
                          </div>
                          <div class="mb-3">
                          <label for="" class="form-label">Email </label>
                          <input type="email" class="form-control" name="email" id="email" placeholder="enter email">
                          </div>
                          <div class="mb-3">
                          <label for="" class="form-label">Phone </label>
                          <input type="tel" class="form-control" id="phone" name="phone" placeholder="enter phone" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="submit" class="btn btn-primary">Confirm</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  </form> 
           </div>
         </div>
        </div>
      </div>
    </div>
    
    <!-- view modal -->
                

                  <div class="modal fade" id="view_data" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="view_dataLabel">View</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="view_user_data"></div>
                          </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>

    <!-- edit data  -->
                 <form action="db.php" method = "post">
                 <div class="modal fade" id="edit_data" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="edit_dataLabel">Edit Data</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <input type="hidden" class="form-control" name="id" id="id1" placeholder="enter enter id">
                          <div class="mb-3">
                          <label for="" class="form-label">First Name </label>
                          <input type="text" class="form-control" name="fname" id="fname1" placeholder="enter first name">
                          </div>
                          <div class="mb-3">
                          <label for="" class="form-label">Last Name </label>
                          <input type="text" class="form-control" name="lname" id="lname1" placeholder="enter last name">
                          </div>
                          <div class="mb-3">
                          <label for="" class="form-label">Email </label>
                          <input type="email" class="form-control" name="email" id="email1" placeholder="enter email">
                          </div>
                          <div class="mb-3">
                          <label for="" class="form-label">Phone </label>
                          <input type="tel" class="form-control" name="phone" id="phone1"  placeholder="enter phone" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="update" class="btn btn-primary">Update</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  </form>

    <!-- delete data -->

              <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteusermodalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="deleteusermodalLabel">Modal title</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action ="" method="post">
                    <input type ="text" class="form-control" name="user_id" id="confirm_delete_id">
                    <div class="modal-body">
                      Confirm delete ?
                    </div>
                    <div class="modal-footer">
                    <button type="button" name="delete_data "class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="confirmDeleteBtn">Confirm</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>

    <div class ="container">
      <div class ="row justify-content-center">
        <div class ="col-md8">
        <div class ="card">
           <div class ="card-header">
           
                <table class="table table-hover table-fixed mx-auto">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">#</th>
                      <th scope="col" class="text-center">First Name</th>
                      <th scope="col" class="text-center">Last Name</th>
                      <th scope="col" class="text-center">Email</th>
                      <th scope="col" class="text-center">Phone</th>
                      <th scope="col" class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $con = mysqli_connect("localhost", "root", "", "crud");
                    $query = "SELECT * FROM crud";
                    $result= mysqli_query($con, $query);

                    if(mysqli_num_rows($result) > 0){
                      while ($row = mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td class="text-center border border-2 user_id"><?php echo "{$row['id']}";?></td>
                            <td class="text-center border border-2"><?php echo "{$row['fname']}";?></td>
                            <td class="text-center border border-2"><?php echo "{$row['lname']}";?></td>
                            <td class="text-center border border-2"><?php echo "{$row['email']}";?></td>
                            <td class="text-center border border-2"><?php echo "{$row['phone']}";?></td>
                            <td class="text-center border border-2">
                              <a class="btn btn-secondary view_data" href="#" role="button">View</a>
                              <a class="btn btn-warning edit_data" href="#" role="button">Edit</a>
                              <a class="btn btn-danger delete_btn" href="#" role="button">Delete</a>
                            </td>
                        </tr>
                        <?php 
                        }
                    ?>
                  </tbody>
                  </table>
                      <?php }
                    else{
                        
                      echo '<div class="alert alert-warning text-center" role="alert">No records found</div>';
                       
                    }
                    ?>
                </tbody>
                </table>
           </div>
         </div>
        </div>
      </div>
    </div>

    <?php
        include('footer.php');
    ?>

    <script>
      // view data
      $(document).ready(function (){
          $('.view_data').click(function (a) {
            a.preventDefault();
            var user_id = $(this).closest('tr').find('.user_id').text();

                //console.log(user_id);

                $.ajax({
                type: "POST",
                url: "db.php",
                data:{
                      'view': true,
                      'user_id':user_id,
                },
                success: function (response){
                  // console.log(response);

                  $('.view_user_data').html(response);
                  $('#view_data').modal('show');
                }
              });
            });

      });
    // edit data
      $(document).ready(function (){
          $('.edit_data').click(function (a) {
            a.preventDefault();
            var user_id = $(this).closest('tr').find('.user_id').text();

                console.log(user_id);

                $.ajax({
                type: "POST",
                url: "db.php",
                data:{
                      'edit': true,
                      'user_id':user_id,
                },
                success: function (response){
                  // console.log(response);
                  $.each(response, function (Key, value){

                  // console.log(value['fname']);
                  $('#id1').val(value['id']);
                  $('#fname1').val(value['fname']);
                  $('#lname1').val(value['lname']);
                  $('#email1').val(value['email']);
                  $('#phone1').val(value['phone']);

              });
                  $('#edit_data').modal('show');

                }
                });
             });
      
    //delete

          $(document).ready(function (){
          $('.delete_btn').click(function (a) {
            a.preventDefault();

            var user_id = $(this).closest('tr').find('.user_id').text();
            // console.log(user_id);
            console.log(user_id)
            Swal.fire({
          
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                type: "POST",
                url: "db.php",
                data:{
                      'delete_btn': true,
                      'user_id':user_id,
                },
                success: function(response) {
                window.location.href = window.location.href;

                }
              });
              Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success",
              });
            }
          });
        });

      });


    });


    </script>
 </body>
</html>