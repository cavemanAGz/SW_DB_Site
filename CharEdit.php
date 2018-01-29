<?php
$title = "Edit Character";
include "header_1.php";
include "DBHelper.php";
include "db_queries.php";

//echo 'You are editing a planet<br>';

$cid = $_GET['id'];

$cur_qry = "SELECT * FROM swdb_characters WHERE swdb_characters.cid = " . $cid ."";

if (db_connect()) {
    $result = db_generic_select($cur_qry);
}

$err = db_error();
if ($err != null) {
    echo $err;
}
    
$f_name = $result[0]['f_name'];
$l_name = $result[0]['l_name'];
$call_sign = $result[0]['call_sign'];
$title = $result[0]['title'];
$gender = $result[0]['Gender'];
$iconic = $result[0]['iconic'];
$Planets_pid = $result[0]['Planets_pid'];


?>

    <script>
        $(document).ready(function(){
            $("#edit_char_modal").modal('show');
        });
    </script>

<div class="modal fade" id="edit_char_modal" role="dialog">
  <div class="modal-dialog">    
      <!-- ADD Modal content-->
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit a Character in the UO SWDB</h4>
          </div>
          <div class="modal-body">
              <form action="CharEdit_Commit.php" method="post">
              <div class="form-group">
                  <label for="f_name">First Name:</label>
                  <input type="text" value="<?php echo $f_name ;?>" class="form-control" id="f_name" name="f_name">
                  <input type="hidden" value="<?php echo $cid; ?>" class="form-control" id="cid" name="cid"> 
              </div>
              <div class="form-group">
                  <label for="l_name">Last Name:</label>
                  <input type="text" value="<?php echo $l_name ;?>" class="form-control" id="l_name" name="l_name">                  
              </div>
              <div class="form-group">
                  <label for="callsign">Call sign:</label>
                  <input type="text" value="<?php echo $call_sign ;?>" class="form-control" id="callsign"name="callsign">
              </div>                  
              <div class="form-group">
                  <label for="title">Title:</label>
                  <input type="text" value="<?php echo $title ;?>" class="form-control" id="title" name="title">
              </div>
              <div class="form-group">
                  <label for="gender">Gender:</label>
                  <label class="radio-inline"><input type="radio" name="gender" value="male" checked>Male</label>
                  <label class="radio-inline"><input type="radio" name="gender" value="female">Female</label>
              </div>
              <div class="form-group">
                  <label class="checkbox-inline"><input type="checkbox" name="iconic" id="iconic" value="TRUE"> Iconic</label>
              </div>           
                  
              <div class="form-group">
                    <label class="planet_select">Select Home Planet:</label>                    
                        <?php 
                           $get_planets_for_dd = db_query($sql_select_planet_names);
                           echo '<select name="planetselect" class="form-control" id="planet_select">';
                           foreach($get_planets_for_dd as $qry) {
                               echo '<option value="' . $qry['pid'] . '" name="' .$qry['pid'] . '">' . $qry['plan_name'] . '</option>';
                           }
                           echo '</select>';
                        ?>
                    </select>
                </div>
              <button type="submit" name="submit" class="btn btn-default">Submit</button>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="character_cancel">Cancel</button>
        </div>
      </div>      
    </div>
  </div>  
</div>

<script>
    document.getElementById("character_cancel").onclick = function () {
        location.href = "Characters.php";
    }
</script>

