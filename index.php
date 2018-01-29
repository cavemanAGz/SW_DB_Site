<?php
$title = "Home";
include 'header.php';
include 'DBHelper.php';
include 'db_queries.php';
?>
<div class="container">
<div class="row col-md-12 tBorder">    
    <table id="dynamicT" name="dynamicT" class="table table-striped display custab table-bordered" cellspacing="0" width="100%">
        <thead class="tableH">
            <tr>
                <th>Character Name</th>
                <th>Species Name</th>
                <th>Planet Name</th>
            </tr>
        </thead>
        <?php
        
         if (db_connect()) {
             
                     
            $result = db_generic_select($sql_index_char_spec_plan);             
            $arr_len = count($result);
        
            //echo "The array Length is: " . $arr_len .'<br />';
            for ($x = 0; $x < $arr_len; $x++) {
                echo "<tr>";
                echo "<td>" . $result[$x]['f_name'] ." ". $result[$x]['l_name'] . "</td>";
                echo "<td>" . $result[$x]['spec_name'] . "</td>";
                echo "<td>" . $result[$x]['plan_name'] . "</td>";
                echo "</tr>";
            }
         } else {
             //echo 'Failed!';
             //Do a toast or somthing
         }   
        
        ?>
        
        
    </table>
     <script> 
        $(document).ready(function() {
            $('#dynamicT').DataTable();
        });
    </script>
</div>   
</div>



<?php
include 'footer.php';
?>
