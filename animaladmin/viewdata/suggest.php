<?php

session_start();

include("function/config.php");

if(!isset($_SESSION['username'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>
<?php
$admin_session = $_SESSION['username'];
$query = "SELECT * from users where username = '$admin_session'";

$direct = mysqli_query($conn,$query);

$rows = mysqli_fetch_array($direct);

$adminID = $rows['userid'];

$aprofiles = $rows['aprofiles'];

$firstname = $rows['firstname'];

$lastname = $rows['lastname'];

$aemail = $rows['aemail'];

$acontact = $rows['acontact'];

$branch = $rows['branch'];

?>
<?php
$username = $_SESSION['username'];
$parameter = "SELECT * from users where username = '$username'";
$condi = mysqli_query($conn,$parameter);

$ros = mysqli_fetch_array($condi);

$userlvl = $ros['user_level'];

?>

<?php 

if ($userlvl  != 'Admin'){

include("include/headers.php");

}
else{

include("include/header_admin.php");

}

?>
<!-- page content -->
<div class="right_col" role="main">
<div class="">
<div class="page-title">
<div class="title_left">

</div>
<?php
error_reporting(0);
define('INCLUDE_CHECK',1);
include("function/functions.php");
?>
<div class="title_right">
<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

</div>
</div>
</div>
<br>
<button type="button" style="float: right; background: #6cb76e; color: white; border-color: #6cb76e;" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Add Contribute</button><br>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content" style="width: 500px; margin-left: 200px;">

<div class="modal-header">
<form action="" method="post" enctype="multipart/form-data">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
<h4 class="modal-title" id="myModalLabel">Add Contribute</h4>
</div>

<div class="modal-body">
<h4></h4>
<input type="hidden" name="adminID" value="<?php echo $adminID; ?>">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="field-1" class="control-label"><b>Member:</b></label>
<select class="form-control" name="userid">
<?php
$query = mysqli_query($conn,"SELECT * from users");
while ($rows = mysqli_fetch_array($query)) {

?>
<option value="<?php echo $rows['userid']; ?>"><?php echo $rows['firstname']; ?> <?php echo $rows['lastname']; ?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="field-1" class="control-label"><b>Tithes:</b></label>
<div><b style="font-size:2vw; width:10% !important; float:left;" >₱</b> <input style="width:90% !important; float:left;" type="number" name="tithes" required class="form-control" id="field-3" placeholder=""></div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="field-1" class="control-label"><b>Offering:</b></label>
<div><b style="font-size:2vw; width:10% !important; float:left;" >₱</b> <input style="width:90% !important; float:left;" type="number" name="offering" required class="form-control" id="field-3" placeholder=""></div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="field-1" class="control-label"><b>Operation:</b></label>
<div><b style="font-size:2vw; width:10% !important; float:left;" >₱</b> <input style="width:90% !important; float:left;" type="number" name="operation" required class="form-control" id="field-3" placeholder=""></div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="field-1" class="control-label"><b>Ministry:</b></label>
<div><b style="font-size:2vw; width:10% !important; float:left;" >₱</b> <input style="width:90% !important; float:left;" type="number" name="ministry" required class="form-control" id="field-3" placeholder=""></div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="field-1" class="control-label"><b>Pledge:</b></label>
<div><b style="font-size:2vw; width:10% !important; float:left;" >₱</b> <input style="width:90% !important; float:left;" type="number" name="pledge" required class="form-control" id="field-3" placeholder=""></div>
</div>
</div>
</div>
</div>
<div class="modal-footer">

<input type="submit" class="btn btn-primary" name="adds" style="background: #6cb76e; color: white; border-color: #6cb76e;" value="Add">

</div>

</div>

</div>
</form>
</div>
<br>
<br>
<div class="clearfix"></div>

<div class="row">

<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2>View of Contribution<small style="color: #6cb76e;">bcc inc.</small></h2>
<ul class="nav navbar-right panel_toolbox">
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
<ul class="dropdown-menu" role="menu">
<li><a href="#">Settings 1</a>
</li>
<li><a href="#">Settings 2</a>
</li>
</ul>
</li>
<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
<p class="text-muted font-13 m-b-30">

</p>

<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
<thead>
<tr>
<th>Members</th>
<th>Tithes</th>
<th>Offering</th>
<th>Operation</th>
<th>Ministry</th>
<th>Pledge</th>
<th>Date</th>
<th>Action</th>

</tr>
</thead>
<tbody>
<?php

$username = $_SESSION['username'];                   
$query = mysqli_query($conn,"SELECT * from users inner join contribution on users.userid = contribution.userid where username = '$username'");

while ($row = mysqli_fetch_array($query)) {

?>
<tr>
<td><b><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></b></td>
<td><?php echo $row['tithes']; ?></td>
<td><?php echo $row['offering']; ?></td>
<td><?php echo $row['operation']; ?></td>
<td><?php echo $row['ministry']; ?></td>
<td><?php echo $row['pledge']; ?></td>
<td><?php echo $row['date_created']; ?></td>
<td><center><button type="button" style="background: #e93434; border-color: #e93434; color: white;" onClick="deleteme(<?php echo $row['postID']; ?>)" class="btn-sm waves-effect btn-defaultts" name="Delete"><i class="fa fa-trash-o"> Delete</button></i> <a type="button" style="text-align: center; color: white; background: #6cb76e;" href="updatesjobde.php?updatesjobde=<?php echo $row['postID']; ?>" class="btn-sm waves-effect btn-defaultts" name="upade"><i class="fa fa-pencil"> Edit</i></a></center></td>

</tr>

<?php
}
?>

</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- /page content -->

<!-- footer content -->
    <footer>
          <div class="pull-right">
          <p>Online Animal Welfare © <script>document.write(new Date().getFullYear())</script>. All Rights Reserved</p>
          </div>
          <div class="clearfix"></div>
        </footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- iCheck -->
<script src="../vendors/iCheck/icheck.min.js"></script>
<!-- Datatables -->
<script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="../vendors/jszip/dist/jszip.min.js"></script>
<script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>

</body>
</html>

<?php

if (isset($_POST['adds'])) {

$userid = mysqli_real_escape_string($conn, $_POST['userid']);

$tithes = mysqli_real_escape_string($conn,$_POST['tithes']);

$offering = mysqli_real_escape_string($conn,$_POST['offering']);

$operation = mysqli_real_escape_string($conn, $_POST['operation']);

$ministry = mysqli_real_escape_string($conn, $_POST['ministry']);

$pledge = mysqli_real_escape_string($conn, $_POST['pledge']);


$querys = "INSERT into contribution(cont_id,userid,tithes,offering, operation,ministry,pledge) VALUES('".md5(uniqid(rand(), true))."','$userid','$tithes','$offering','$operation','$ministry','$pledge')";

$processs = mysqli_query($conn, $querys);

if ($processs) {
echo "<script>alert('Successfully')</script>";
echo "<script>window.open('suggest.php','_self')</script>";
}else{
echo "<script>alert('Something went wrong')</script>";
}

}

?>
<?php  } ?>