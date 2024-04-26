<?php
session_start();

echo"<table border = 1>";
echo    "<tr>
            <td>Cookie Name:</td>
            <td>Cookie Value</td>
        </tr>";
foreach ($_COOKIE as $key => $value) {
    if($key != 'PHPSESSID'){
        echo "  <tr>
                    <td>$key:</td>
                    <td>$value</td>
                </tr>   
        ";
    }
    
}
echo"</table>";
?>
