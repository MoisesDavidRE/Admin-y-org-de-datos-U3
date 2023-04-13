<?php
$x = 1;
?>
<font face="arial">
    <table border="1">
        <style>
            tr td {
                border-color: GREEN  ;
                padding:5;
            }
        </style>
        <?php while ($x < 11): ?>
            <?php $y = 1 ?>
            <tr>
                <td rowspan="11">
                    <?php echo $x ?>
                    <?php while ($y < 11): ?>
                <tr>
                    <td>
                        <?php echo $x . "x" . $y ?>
                    </td>
                    <td>
                        <?php echo $x * $y ?>
                    </td>
                </tr>
                <?php $y++; endwhile ?>
            </td>
            </tr>
            <?php $x++; endwhile ?>
    </table>
</font>