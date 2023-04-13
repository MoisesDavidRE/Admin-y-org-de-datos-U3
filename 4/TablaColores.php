
<?php
$csvFile = 'CSV/Libro1.csv';
$csvData = file_get_contents($csvFile);
$rows = str_getcsv($csvData, "\n");
$data = array();
foreach ($rows as $row) {
    $data[] = str_getcsv($row, ",");
}
echo '<table border="1">';
foreach ($data as $row) {
    $fondo = '';
    echo '<tr>';
    foreach ($row as $col_num => $contenido) {
        if ($col_num == count($row) - 1) {
            if ($contenido < 8) {
                $fondo = 'background-color: yellow;';
            } else if ($contenido >= 8 && $contenido < 9) {
                $fondo = 'background-color: cyan;';
            } else if ($contenido >= 9) {
                $fondo = 'background-color: green;';
            }
        }
        echo '<td style="'.$fondo.'">' . htmlspecialchars($contenido) . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
?>