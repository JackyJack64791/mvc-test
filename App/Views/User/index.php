<div>
    <table>
        <?php
            foreach($params as $key=>$row)
            {
                echo "<tr>";
                foreach($row as $key2=>$row2)
                {
                    echo "<td>" . $row2 . "</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</div>
