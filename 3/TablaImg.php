<?php
$csvFile = 'csv/descripciones.csv';
$csvData = file_get_contents($csvFile);
$rows = str_getcsv($csvData, "\n");
$data = array();
echo '<table>';
$X = 0;
foreach ($rows as $row) {
    $data[] = str_getcsv($row, ",");
}
foreach ($data as $row) {
    $dir = '';
    $descripcion = '';
    foreach ($row as $col_num => $contenido) {
        if ($col_num == count($row) - 2) {
            $dir = $contenido;
        } else if ($col_num == count($row) - 1) {
            $descripcion = $contenido;
        }
    }
    if ($X == 0) {
        echo '<tr>';
    }
    echo '<td>' . '<img src="../imagenes/' . $dir . '"' . ' alt="Descripcion" height=300 width=200><br>' . $descripcion . '</td>';
    $X++;
    if ($X == 4) {
        echo '</tr>';
        $X = 0;
    }
}
echo '</table>';
?>