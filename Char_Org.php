<?php
    $title = "Characters Membership in an Organization";
    include 'header.php';
    include "DBHelper.php";
    include "db_queries.php";
?>

<div class="container">
    <div class="row col-md-12 tBorder">
        <table id="dynamicT" name="dynamicT" class="table table-striped display custab table-bordered" cellspacing="0" width="100%">            
            <thead class="tableH">
                <tr>
                    <th class="text-center">Organization</th>
                    <th class="text-center">Character</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
<?php
if (db_connect()) {
        //Get all characters for Selection
        $char_res = db_generic_select($swdb_char_selec_all);                
        $char_count = count($char_res);
        
        //Get all Organizations for Selection
        $org_res = db_generic_select($swdb_organizations_select_all);
        $org_count = count($org_res);
        
        //Get all the relations btween orgs and chars
        $result = db_generic_select($swdb_char_org_select_all);
        $arr_len = count($result);
        
        //echo "   " . $arr_len;
        for ($x = 0; $x < $arr_len; $x++) {
            //Get the correct org name
            $org = "SELECT o.name FROM swdb_organizations o WHERE o.oid = " . $result[$x]['swdb_organizations_oid'] . "";
            //echo 'Organization ID: ' . $org . '<br />';
            
            //Get the correct character first and last name
            $character = "SELECT c.f_name, c.l_name FROM swdb_characters c WHERE c.cid = " . $result[$x]['swdb_characters_cid'] . "";
            //echo 'Organization ID: ' . $character . '<br />';
            $org_name = db_generic_select($org);
            
            $char_name = db_generic_select($character);
            
            echo "<tr  class=\"text-center\">";
            echo "<td class=\"text-center\">" . $org_name[0]['name'] . "</td>";
            echo "<td class=\"text-center\">" . $char_name[0]['f_name'] ." ". $char_name[0]['l_name'] ."</td>";
            echo "<td  nowrap=\"nowrap\ class=\"text-center\"><a href=\"Char_OrgDelete.php?id=" .$result[$x]['swdb_organizations_oid']."&id1=".$result[$x]['swdb_characters_cid']."\" class=\"btn btn-danger btn-xs\">"
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
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#char_membership_insert">Add an Organizational Conflict</button>

  <!-- Modal -->
  <div class="modal fade" id="char_membership_insert" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add a Character to an Organization in the UO SWDB</h4>
        </div>
        <div class="modal-body">
            <form action="Char_OrgInsert.php" method="post">
                <div class="form-group">
                    <label class="orgselect">Select an Organization:</label>                    
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