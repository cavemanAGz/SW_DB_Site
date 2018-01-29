<?php
    $title = "Characters";
    include 'header.php';
    include "DBHelper.php";
    include "db_queries.php";
?>

<div class="container">
    <div class="row col-md-12 tBorder">
        <table id="dynamicT" name="dynamicT" class="table table-striped display custab table-bordered" cellspacing="0" width="100%"">            
            <thead class="tableH">
                <tr>
                    <th class="text-center">Belligerent 1</th>
                    <th class="text-center">Belligerent 2</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>

<?php
if (db_connect()) {
        //echo "Connected!";
        //$result = db_generic_select($bsg_db_select_people);
        $result = db_generic_select($swdb_adversaries_select_all);
        $arr_len = count($result);
        
        //echo "   " . $arr_len;
        for ($x = 0; $x < $arr_len; $x++) {
            $qry_n1 = "SELECT o.name FROM swdb_organizations o WHERE o.oid = " . $result[$x]['swdb_organizations_oid'] . "";
            $qry_n2 = "SELECT o.name FROM swdb_organizations o WHERE o.oid = " . $result[$x]['swdb_organizations_oid1'] . "";
            $b1_name = db_generic_select($qry_n1);
            $b2_name = db_generic_select($qry_n2);
            echo "<tr  class=\"text-center\">";
            echo "<td class=\"text-center\">" . $b1_name[0]['name'] . "</td>";
            echo "<td class=\"text-center\">" . $b2_name[0]['name'] . "</td>";
            echo "<td  nowrap=\"nowrap\ class=\"text-center\"><a href=\"AdverDelete.php?id=" .$result[$x]['swdb_organizations_oid']."&id1=".$result[$x]['swdb_organizations_oid1']."\" class=\"btn btn-danger btn-xs\">"
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
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#confilct_insert_modal">Add an Organizational Conflict</button>

  <!-- Modal -->
  <div class="modal fade" id="confilct_insert_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add an Organizational Conflict to the UO SWDB</h4>
        </div>
        <div class="modal-body">
            <form action="AdversaryInsert.php" method="post">
                <div class="form-group">
                    <label class="orgselect">Select Belligerent 1:</label>                    
                        <?php 
                           $get_org_name = db_query($sql_select_org_name);
                           echo '<select name="orgselect" class="form-control" id="orgselect">';
                           foreach($get_org_name as $qry) {
                               echo '<option value="' . $qry['oid'] . '" name="' .$qry['oid'] . '">' . $qry['name'] . '</option>';
                           }
                           echo '</select>';
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="orgselect1">Select Belligerent 2:</label>                    
                        <?php 
                           $get_org_name1 = db_query($sql_select_org_name);
                           echo '<select name="orgselect1" class="form-control" id="orgselect1">';
                           foreach($get_org_name1 as $qry) {
                               echo '<option value="' . $qry['oid'] . '" name="' .$qry['oid'] . '">' . $qry['name'] . '</option>';
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