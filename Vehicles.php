<?php
$title = "Vehicles";
include 'header.php';
include "DBHelper.php";
include "db_queries.php";
?>

<div class="container">
    <div class="row col-md-12 tBorder">
        <table id="dynamicT" name="dynamicT" class="table table-striped display custab table-bordered" cellspacing="0" width="100%">            
            <thead class="tableH">
                <tr>
                    <!--<th class="text-center" nowrap="nowrap">ID</th>-->
                    <th class="text-center" nowrap="nowrap">Vehicle Name</th>
                    <th class="text-center" nowrap="nowrap" >Vehicle Type</th>
                    <th class="text-center" nowrap="nowrap">About</th>
                    <th class="text-center" nowrap="nowrap">Iconic</th>
                    <th class="text-center">Produced At</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>            


<?php
if (db_connect()) {
        //echo "Connected!";
        $result = db_generic_select($swdb_vehcles_select_all);
        $arr_len = count($result);
        
        //echo "   " . $arr_len;
        for ($x = 0; $x < $arr_len; $x++) {
            
            $p_qry = "SELECT p.plan_name FROM swdb_planets p WHERE p.pid = ". $result[$x]['Planets_pid'];
            $plan_qry = db_generic_select($p_qry);
            
            if($result[$x]['iconic'] == 0) {
                $icon = "<span class=\"glyphicon glyphicon-ok\" style=\"color:#5ef93b\"></span>";
            } else {
                $icon = "<span class=\"glyphicon glyphicon-remove\" style=\"color:#ea1e1e\"></span>";
            }
            
            echo "<tr>";
            //echo "<td>" . $result[$x]['vid'] . "</td>";
            echo "<td>" . $result[$x]['vehic_name'] . "</td>";
            echo "<td>" . $result[$x]['type'] . "</td>";
            echo "<td>" . $result[$x]['about'] . "</td>";
            echo "<td class=\"text-center\">" . $icon . "</td>";
            echo "<td class=\"text-center\">" . $plan_qry[0]['plan_name'] . "</td>";
            echo "<td class=\"text-center\" nowrap=\"nowrap\">"
            . "<a class=\"btn btn-info btn-xs\" href=\"VehicEdit.php?id=".$result[$x]['vid']."\">"
                    . "<span class=\"glyphicon glyphicon-edit\">"
                    . "</span> Edit </a>"
                    . " <a href=\"VehicDelete.php?id=". $result[$x]['vid']."\" class=\"btn btn-danger btn-xs\">"
                    . "<span class=\"glyphicon glyphicon-remove\">"
                    . "</span> Delete </a></td>";
            echo "</tr>";
        }      
    } else {
        //echo "FAILED!";
    }

?>
        </table>
        <script> 
            $(document).ready(function() {
                $('#dynamicT').DataTable();
            });
        </script>        
        </div>
<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#my_vheic_insert">Add Vehicle</button>
    
 <!-- Modal -->
  <div class="modal fade" id="my_vheic_insert" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add a vehicle to the UO SWDB</h4>
        </div>
        <div class="modal-body">
            <form action="VehicInsert.php" method="post">
                <div class="form-group">
                    <label for="vehic_name">Vehicle Name:</label>
                    <input type="text" class="form-control" id="vehic_name" name="vehic_name">
                </div>
                <div class="form-group">
                    <label for="type">Vehicle Type:</label>
                    <input type="text" class="form-control" id="type" name="type">
                </div>
                <div class="form-group">
                    <label for="about">About:</label>
                    <textarea rows="10" type="text" class="form-control" id="about" name="about"></textarea>
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
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>
  

  
</div>        

</div>

<?php
include 'footer.php';
?>