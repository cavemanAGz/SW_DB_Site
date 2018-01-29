<?php
$title = "Characters";
include 'header.php';
include "DBHelper.php";
include "db_queries.php";
?>

<div class="container">
    <div class="row col-md-12 tBorder"> 
        <table id="dynamicT" name="dynamicT" class="table table-striped display custab table-bordered" cellspacing="0" width="100%">            
            <thead class="tableH">
                <tr>
                    <!--<th class="text-center">ID</th>-->
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Call Sign</th>
                    <th>Title</th>
                    <th>Gender</th>
                    <th>Iconic</th>
                    <th class="text-center">Homeworld</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>            


<?php
if (db_connect()) {
        //echo "Connected!";
        //$result = db_generic_select($bsg_db_select_people);
        $result = db_generic_select($swdb_char_selec_all);
        $arr_len = count($result);
        
        
        
        //echo "   " . $arr_len;
        for ($x = 0; $x < $arr_len; $x++) {
            
            $p_qry = "SELECT p.plan_name FROM swdb_planets p WHERE p.pid = ". $result[$x]['Planets_pid'] ."";
            $plan_qry = db_generic_select($p_qry);
            
            if($result[$x]['iconic'] == 0) {
                $icon = "<span class=\"glyphicon glyphicon-ok\" style=\"color:#5ef93b\"></span>";
            } else {
                $icon = "<span class=\"glyphicon glyphicon-remove\" style=\"color:#ea1e1e\"></span>";
            }
            echo "<tr>";
            //echo "<td class=\"text-center\">" . $result[$x]['cid'] . "</td>";
            echo "<td>" . $result[$x]['f_name'] . "</td>";
            echo "<td>" . $result[$x]['l_name'] . "</td>";
            echo "<td>" . $result[$x]['call_sign'] . "</td>";
            echo "<td>" . $result[$x]['title'] . "</td>";
            echo "<td>" . $result[$x]['Gender'] . "</td>";
            echo "<td class=\"text-center\">" . $icon . "</td>";
            echo "<td class=\"text-center\">" . $plan_qry[0]['plan_name'] . "</td>";
            echo "<td  nowrap=\"nowrap\ class=\"text-center\"><a class="
                    . "\"btn btn-info btn-xs\" href=\"CharEdit.php?id=". $result[$x]['cid'] ."\"><span class="
                    . "\"glyphicon glyphicon-edit\"></span> Edit </a>"
                    . " <a href=\"CharDelete.php?id=" .$result[$x]['cid'] ."\" class=\"btn btn-danger btn-xs\">"
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
<!-- START MODAL -->
<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add a Character</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add a character to the UO SWDB</h4>
        </div>
        <div class="modal-body">
            <form action="CharInsert.php" method="post">
                <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input type="text" class="form-control" id="fname" name="fname">
                </div>
                <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input type="text" class="form-control" id="lname" name="lname">
                </div>
                <div class="form-group">
                    <label for="callsign">Call sign:</label>
                    <input type="text" class="form-control" id="callsign"name="callsign">
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title"name="title">
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
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
        
<!-- END MODAL -->

</div>



<?php
include 'footer.php';
?>
