<?php 

    $title = "Edit an Organization";
    include 'header_1.php';
    include "DBHelper.php";
    include "db_queries.php";
    
    echo 'Editing an Organization <br />';
    
    $oid = $_GET['id'];
    
    echo 'The OID is: ' .$oid. '<br />';
    
    $cur_qry = "SELECT * FROM swdb_organizations WHERE swdb_organizations.oid = " . $oid ."";

    echo 'Query string: '.$cur_qry. '<br />';
    
    if (db_connect()) {
        $result = db_generic_select($cur_qry);
    }
    
    $err = db_error();
    if ($err != null) {
        echo $err;
    }
    
    $name = $result[0]['name'];
    $type = $result[0]['type'];
    $about = $result[0]['about'];
    
    echo 'Name: ' .$name. '<br />';
    echo '<br />Type: ' .$type. '<br />';
    echo '<br />About: ' .$about. '<br />';


?>

<script>
    $(document).ready(function(){
        $("#edit_org_modal").modal('show');
    });
</script>

<div class="modal fade" id="edit_org_modal" role="dialog">
<div class="modal-dialog">    
      <!-- Modal content-->
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit an Organization in the UO SWDB</h4>
    </div>
    <div class="modal-body">
        <form action="OrgEdit_Committ.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" value="<?php echo $name;?>" class="form-control" id="name" name="name">
                <input type="hidden" value="<?php echo $oid; ?>" class="form-control" id="oid" name="oid"> 
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <input type="text" value="<?php echo $type;?>" class="form-control" id="type" name="type">
            </div>
            <div class="form-group">
                <label for="about">About:</label>
                <textarea type="text" rows="10" class="form-control" id="about" name="about"><?php echo $about;?>" </textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="org_cancel">Cancel</button>
      </div>
    </div>    
  </div>
</div>

<script>
    document.getElementById("org_cancel").onclick = function () {
        location.href = "Organization.php";
    }
</script>