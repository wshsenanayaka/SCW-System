<!DOCTYPE html>
<html lang="en">
<?php 
    include('../include/check.php'); 
    include('../include/head.php'); 
?>

<!-- Custom styles for this page -->
<link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin <sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">


      <?php include('../include/nav.php');  ?>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include('../include/nav-1.php');  ?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">User Tables</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" style="float: left;">DataTables</h6>
              <button type="button" class="btn btn-primary btn-sm" style="float: right;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_Adduser">Add User</button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>NIC</th>
                      <th>Branch</th>
                      <th>Role</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 

                        $query = "SELECT * FROM user";
                        
                        $result = mysqli_query($conn ,$query);
                        if(mysqli_num_rows($result) > 0){

                          while($row = mysqli_fetch_array($result))
                          {
                            echo '
                            <tr>
                            <td>'.$row["user_name"].'</td>
                            <td>'.$row["nic"].'</td>
                            <td>'.$row["branch"].'</td>
                            <td>'.$row["userRole"].'</td>
                            <td><button type="button" class="btn btn-info btn-sm" onclick="editForm('.$row["id"].')">Edit</button></td>
                            <td><button type="button" class="btn btn-danger btn-sm" onclick="confirmation(event,'.$row["id"].')">Delete</button></td>
                            </tr>
                            ';
                          }
                        }
                     ?>
              
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include('../include/modal_logout.php');  ?>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>


<!-- Modal -->
<div id="myModal_Adduser" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <!-- <h4 class="modal-title">Modal Header</h4> -->
      </div>
      <div class="modal-body">
        <center><p><span style="font-weight: 700;color: blue;">Add User</span></p></center>
        <form>
            <div class="form-group">
                <label for="nic">NIC</label>
                <input type="text" class="form-control" id="nic"  placeholder="Enter NIC">
            </div>
            <div class="form-group">
                <label for="contactNo">Contact No</label>
                <input type="text" class="form-control" id="contactNo"  placeholder="Enter Contact Number">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username"  placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Branch</label>
                <select class="form-control" id="branch">
                    <option value="">Select</option>
                    <?php

                        $queryBranch = "SELECT * FROM branch";
                        $resultBranch = mysqli_query($conn ,$queryBranch);
                        while($rowBranch = mysqli_fetch_array($resultBranch)){

                          echo '<option value="'.$rowBranch['name'].'">'.$rowBranch['name'].'</option>';
                        }
                    ?>
                    
                    <!-- <option value="Bothalegama">Bothalegama</option>
                    <option value="Egaloya">Egaloya</option> -->
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">User Role</label>
                <select class="form-control" id="userRole">
                    <option value="">Select</option>
                    <?php

                        $queryRole = "SELECT * FROM role";
                        $resultRole = mysqli_query($conn ,$queryRole);
                        while($rowRole = mysqli_fetch_array($resultRole)){

                          echo '<option value="'.$rowRole['name'].'">'.$rowRole['name'].'</option>';
                        }
                      ?>
                </select>
            </div>
            <button type="button" onclick="myFormAdd()" id="addUserbtn" name="addUserbtn" class="btn btn-primary btn-sm">Submit</button>
        </form>
      </div>
      <div class="modal-footer" style="height: 40px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->


<div id="show_pro_edit">

</div>


<script>

  function editForm(id){

    $.ajax({
             url:"../controller/user.php",
             method:"POST",
             data:{"edit_id":id},
             success:function(data){
               $('#show_pro_edit').html(data);
               $('#myModal_Edituser').modal('show');
             }
       });
   }
  
  function confirmation(e,id) {
        var answer = confirm("Are you sure you want to permanently delete this record?")
      if (!answer){
        e.preventDefault();
        return false;
      }else{
        myFunDelete(id)
      }
    }
 
  function myFunDelete(id){

    $.ajax({
          url:"../controller/user.php",
          method:"POST",
          data:{removeID:id},
          success:function(data){

            alert(data);
            location.reload();
          }
    });

  }

  function myFormAdd(){

    var nic =document.getElementById('nic').value;
    var contactNo =document.getElementById('contactNo').value;
    var username =document.getElementById('username').value;
    var password =document.getElementById('password').value;
    var branch =document.getElementById('branch').value;
    var userRole =document.getElementById('userRole').value;
    var addUserbtn =document.getElementById('addUserbtn').name;

    $.ajax({
          url:"../controller/user.php",
          method:"POST",
          data:{nic:nic,contactNo:contactNo,username:username,password:password,branch:branch,userRole:userRole,addUserbtn:addUserbtn},
          success:function(data){
           
            $('#myModal_Adduser').modal('hide');
            alert(data);
            location.reload();
          }
     });
   }



   function myFormUpadte(id){

    var enic =document.getElementById('enic').value;
    var econtactNo =document.getElementById('econtactNo').value;
    var eusername =document.getElementById('eusername').value;
    
    var ebranch =document.getElementById('ebranch').value;
    var euserRole =document.getElementById('euserRole').value;
    var updateUserbtn =document.getElementById('updateUserbtn').name;

    $.ajax({
          url:"../controller/user.php",
          method:"POST",
          data:{enic:enic,econtactNo:econtactNo,eusername:eusername,ebranch:ebranch,euserRole:euserRole,updateUserbtn:updateUserbtn,eid:id},
          success:function(data){
           
            $('#myModal_Edituser').modal('hide');
            alert(data);
            location.reload();
          }
     });

     
   }

</script>

