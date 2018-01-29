
<?php
$title = "Edit Planets";
include "header_1.php";
include "DBHelper.php";
include "db_queries.php";

//echo 'You are editing a planet<br>';

$pid = $_GET['id'];
//echo 'PID is: ' . $pid . '<br>';

$cur_qry = "SELECT * FROM swdb_planets WHERE swdb_planets.pid = " . $pid ."";

if (db_connect()) {
    $result = db_generic_select($cur_qry);
}

$err = db_error();
if ($err != null) {
    echo $err;
}
    
$plan_name = $result[0]['plan_name'];
$climate = $result[0]['climate'];
$population = $result[0]['population'];
$notes = $result[0]['notes'];
$orig_name = $plan_name;

?>

    <script>
        $(document).ready(function(){
            $("#edit_plan_modal").modal('show');
        });
    </script>

<div class="modal fade" id="edit_plan_modal" role="dialog">
  <div class="modal-dialog">    
      <!-- ADD Modal content-->
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit a Planet in the UO SWDB</h4>
          </div>
          <div class="modal-body">
          <form action="PlanEdit_Commit.php" method="post">
              <div class="form-group">
                  <label for="plan_name">Planet Name:</label>
                  <input type="text" value="<?php echo $plan_name ;?>" class="form-control" id="plan_name" name="plan_name">
                  <input type="hidden" value="<?php echo $pid; ?>" class="form-control" id="pid" name="pid"> 
                  <input type="hidden" value="<?php echo $orig_name; ?>" class="form-control" id="orig_name" name="orig_name"> 
              </div>
              <div class="form-group">
                  <label for="climate">Climate:</label>
                  <input type="text" value="<?php echo $climate; ?>" class="form-control" id="climate" name="climate">
              </div>
              <div class="form-group">
                  <label for="population">Population:</label>
                  <input type="text" value="<?php echo $population ;?>" class="form-control" id="population" name="population">
              </div>
              <div class="form-group">
                  <label for="notes">Notes:</label>
                  <textarea type="text" rows="10" class="form-control" id="notes" name="notes"><?php echo $notes; ?></textarea>
              </div>
              
              <button type="submit" name="submit" class="btn btn-default">Submit</button>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="planet_cancel">Cancel</button>
        </div>
      </div>      
    </div>
  </div>  
</div>

<script>
    document.getElementById("planet_cancel").onclick = function () {
        location.href = "Planets.php";
    }
</script>