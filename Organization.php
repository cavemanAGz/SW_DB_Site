<?php
$title = "Organizations";
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
                    <th class="text-center">Name</th>
                    <th class="text-center">Type</th>
                    <th class="text-center">About</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>            


<?php
if (db_connect()) {
        //echo "Connected!";
        $result = db_generic_select($swdb_organizations_select_all);
        $arr_len = count($result);
        
        //echo "   " . $arr_len;
        for ($x = 0; $x < $arr_len; $x++) {
            echo "<tr>";
            //echo "<td>" . $result[$x]['oid'] . "</td>";
            echo "<td>" . $result[$x]['name'] . "</td>";
            echo "<td>" . $result[$x]['type'] . "</td>";
            echo "<td>" . $result[$x]['about'] . "</td>";
            echo "<td  nowrap=\"nowrap\ class=\"text-center\">"
                    . "<a class=\"btn btn-info btn-xs\" href=\"OrgEdit.php?id=".$result[$x]['oid']."\">"
                    . "<span class=\"glyphicon glyphicon-edit\">"
                    . "</span> Edit </a>"
                    . "<a href=\"OrgDelete.php?id=".$result[$x]['oid']."\" class=\"btn btn-danger btn-xs\">"
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
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Organization</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add an Organization to the UO SWDB</h4>
        </div>
        <div class="modal-body">
            <form action="OrgInsert.php" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="type">Type:</label>
                    <input type="text" class="form-control" id="type" name="type">
                </div>
                <div class="form-group">
                    <label for="about">About:</label>
                    <textarea type="text" rows="10" class="form-control" id="about" name="about"></textarea>
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
