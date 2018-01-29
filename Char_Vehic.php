<?php
    $title = "Characters Vehicle Ownership";
    include 'header.php';
    include "DBHelper.php";
    include "db_queries.php";
?>

<div class="container">
    <div class="row col-md-12 tBorder">
        <table id="dynamicT" name="dynamicT" class="table table-striped display custab table-bordered" cellspacing="0" width="100%">            
            <thead class="tableH">
                <tr>
                    <th class="text-center">Character Name</th>
                    <th class="text-center">Vehicle Name</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            
<?php
if (db_connect()) {
        //Get all characters for Selection
        $char_res = db_generic_select($swdb_char_selec_all);
        
        //Get all Organizations for Selection
        $vehic_res = db_generic_select($swdb_vehcles_select_all);
        
        //Get all the relations btween Vehicles and chars
        $result = db_generic_select($swdb_char_vehic_select_all);
        $arr_len = count($result);
        
        //echo "   " . $arr_len;
        for ($x = 0; $x < $arr_len; $x++) {
            //Get the correct org name
            $vhic = "SELECT v.vehic_name FROM swdb_vehicles v WHERE v.vid = " . $result[$x]['swdb_vehicles_vid'] . "";
            //echo 'Vhic Qry: ' . $vhic . '<br />';
            
            //Get the correct character first and last name
            $character = "SELECT c.f_name, c.l_name FROM swdb_characters c WHERE c.cid = " . $result[$x]['swdb_characters_cid'] . "";
            //echo 'Character Qry: ' . $character . '<br />';
            
            $vehic_name = db_generic_select($vhic); 
            //echo 'Vehiclie info: ' . $vehic_name[0]['vehic_name'];
            
            $char_name = db_generic_select($character);
            
            
            echo "<tr  class=\"text-center\">";
            echo "<td class=\"text-center\">" . $vehic_name[0]['vehic_name'] . "</td>";
            echo "<td class=\"text-center\">" . $char_name[0]['f_name'] ." ". $char_name[0]['l_name'] ."</td>";
            echo "<td  nowrap=\"nowrap\ class=\"text-center\"><a href=\"Char_VehicDelete.php?id=" .$result[$x]['swdb_vehicles_vid']."&id1=".$result[$x]['swdb_characters_cid']."\" class=\"btn btn-danger btn-xs\">"
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
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#vehic_owner_insert">Add Vehicle Ownership</button>

  <!-- Modal -->
  <div class="modal fade" id="vehic_owner_insert" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add a Character to an Organization in the UO SWDB</h4>
        </div>
        <div class="modal-body">
            <form action="Char_VhicInsert.php" method="post">
                <div class="form-group">
                    <label class="vehicselect">Select an Organization:</label>                    
                        <?php 
                           $get_vhic_name = db_query($sql_select_vehic_name);
                           echo '<select name="vehicselect" class="form-control" id="vehicselect">';
                           foreach($get_vhic_name as $qry) {
                               echo '<option value="' . $qry['vid'] . '" name="' .$qry['vid'] . '">' . $qry['vehic_name'] . '</option>';
                           }
                           echo '</select>';
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="charselect">Select a Character:</label>                    
                        <?php 
                           $get_char_name = db_query($sql_select_cahr_name);
                           echo '<select name="charselect" class="form-control" id="charselect">';
                           foreach($get_char_name as $qry) {
                               echo '<option value="' . $qry['cid'] . '" name="' .$qry['cid'] . '">' . $qry['f_name'] . " " . $qry['l_name'] .'</option>';
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