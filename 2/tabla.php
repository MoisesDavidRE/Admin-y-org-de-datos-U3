<?php
$x = 1;
?>
<table border="1">
    <?php while ($x < 101): ?>
        <tr>
            <td>
                <?php echo $x ?>
            </td>
            <td>
                <?php
                $y = $x + $x;
                echo $y ?>
            </td>
            <td>
                <?php
                $z = $y + $x;
                echo $z ?>
            </td>
        </tr>
        <?php $x++; endwhile ?>
</table>