<?php
$title = "Species";
include 'header.php';
include "DBHelper.php";
include "db_queries.php";
?>

<div class="container">
    <div class="row col-md-12 tBorder">
        <table id="dynamicT" name="dynamicT" class="table table-striped display custab table-bordered" cellspacing="0" width="100%">            
            <thead class="tableH">
                <tr>
                    <th class="text-center" nowrap="nowrap">Species Name</th>
                    <th class="text-center">Species Description</th>
                    <th class="text-center">Homeworld</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>            


<?php
if (db_connect()) {
        //echo "Connected!";
        $result = db_generic_select($swdb_species_select_all);
        $arr_len = count($result);
               
        //echo "   " . $arr_len;
        for ($x = 0; $x < $arr_len; $x++) {
            
            $p_qry = "SELECT p.plan_name FROM swdb_planets p WHERE p.pid = ". $result[$x]['swdb_planets_pid'] ."";
            $plan_qry = db_generic_select($p_qry);
            
            echo "<tr>";
            //echo "<td class=\"text-center\">" . $result[$x]['sid'] . "</td>";
            echo "<td class=\"text-center\"  nowrap=\"nowrap\">" . $result[$x]['spec_name'] . "</td>";
            echo "<td>" . $result[$x]['spec_desc'] . "</td>";
            echo "<td class=\"text-center\">" . $plan_qry[0]['plan_name'] . "</td>";
            echo "<td class=\"text-center\" nowrap=\"nowrap\">"
                    . "<a class=\"btn btn-info btn-xs\" href=\"SpecEdit.php?id=". $result[$x]['sid'] ."\">"
                    . "<span class=\"glyphicon glyphicon-edit\">"
                    . "</span> Edit </a>"
                    . " <a href=\"SpecDelete.php?id=". $result[$x]['sid'] ."\" class=\"btn btn-danger btn-xs\">"
                    . "<span class=\"glyphicon glyphicon-remove\">"
                    . "</span> Delete </a></td>";
            echo "</tr>";
        }      
    } else {
        echo "FAILED!";
    }

?>
        </table>      
        <script> 
            $(document).ready(function() {
                $('#dynamicT').DataTable();
            });
        </script>      
        </div>
<!-- START INSERT MODAL -->
<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#add_spec">Add a Species</button>

  <!-- Modal -->
  <div class="modal fade" id="add_spec" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add a species to the UO SWDB</h4>
        </div>
        <div class="modal-body">
            <form action="SpecInsert.php" method="post">
                <div class="form-group">
                    <label for="spec_name">Species Name:</label>
                    <input type="text" class="form-control" id="spec_name" name="spec_name">
                </div>
                <div class="form-group">
                    <label for="spec_dec">Species Description:</label>
                    <textarea type="text" rows="10" class="form-control" id="spec_desc" name="spec_desc"></textarea>
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
  

<!-- END INSERT MODAL -->
    </div>


<?php
include 'footer.php';
?>