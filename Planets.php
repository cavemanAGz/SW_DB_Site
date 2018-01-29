<?php
$title = "Planets";
include 'header.php';
include "DBHelper.php";
include "db_queries.php";
?>

<div class="container">
    <div class="row col-md-12 tBorder">
        <table id="dynamicT" name="dynamicT" class="table table-striped display custab table-bordered" cellspacing="0" width="100%">            
            <thead class="tableH">
                <tr>
                    <!--<th>ID</th>-->
                    <th>Planet Name</th>
                    <th>Climate</th>
                    <th>Population</th>
                    <th class="text-center">Notes</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>            


<?php
if (db_connect()) {
        //echo "Connected!";
        $result = db_generic_select($swdb_planets_select_all);
        $arr_len = count($result);
        
        //echo "   " . $arr_len;
        for ($x = 0; $x < $arr_len; $x++) {
            echo "<tr>";
            //echo "<td>" . $result[$x]['pid'] . "</td>";
            echo "<td nowrap=\"nowrap\">" . $result[$x]['plan_name'] . "</td>";
            echo "<td nowrap=\"nowrap\">" . $result[$x]['climate'] . "</td>";
            echo "<td nowrap=\"nowrap\">" . $result[$x]['population'] . "</td>";
            echo "<td>" . $result[$x]['notes'] . "</td>";
            echo "<td  nowrap=\"nowrap\ class=\"text-center\"><a class="
                    . "\"btn btn-info btn-xs\" href=\"PlanEdit.php?id=". $result[$x]['pid'] ."\"><span class="
                    . "\"glyphicon glyphicon-edit\"></span> Edit </a>"
                    . " <a href=\"PlanDelete.php?id=" .$result[$x]['pid'] ."\" class=\"btn btn-danger btn-xs\">"
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
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add a Planet</button>

<!-- START ADD Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">    
      <!-- ADD Modal content-->
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add a Planet to the UO SWDB</h4>
          </div>
          <div class="modal-body">
          <form action="PlanInsert.php" method="post">
              <div class="form-group">
                  <label for="plan_name">Planet Name:</label>
                  <input type="text" class="form-control" id="plan_name" name="plan_name">
              </div>
              <div class="form-group">
                  <label for="climate">Climate:</label>
                  <input type="text" class="form-control" id="climate" name="climate">
              </div>
              <div class="form-group">
                  <label for="population">Population:</label>
                  <input type="text" class="form-control" id="population" name="population">
              </div>
              <div class="form-group">
                  <label for="notes">Notes:</label>
                  <textarea type="text" rows="10" class="form-control" id="notes" name="notes"></textarea>
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
        
<!-- End Add Modal -->    
        
<!-- START delete modal -->
        
<!-- END delete modal -->
        

</div>

<?php
include 'footer.php';
?>

