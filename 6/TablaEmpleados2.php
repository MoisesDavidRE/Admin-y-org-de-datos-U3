<?php
$csvFile = 'Tabla_Sueldos.csv';
$csvData = file_get_contents($csvFile);
$rows = str_getcsv($csvData, "\n");
$data = array();
$g = 0;
foreach ($rows as $row) {
    $data[] = str_getcsv($row, ",");
}
echo '<table>';
foreach ($data as $row_num => $row) {
    if ($row_num == 0) {
        echo '<tr>';
        foreach ($row as $col_num => $contenido) {
            echo '<th>' . htmlspecialchars($contenido) . '</th>';
        }
        echo '</tr>';
    } else {
        echo '<tr>';
        foreach ($row as $col_num => $contenido) {
            echo '<td>' . htmlspecialchars($contenido) . '</td>';
        }
        $SD = floatval($row[count($row) - 3]);
        $DT = floatval($row[count($row) - 2]);
        $sueldo = floatval($row[count($row) - 1]);
        $salarioSemanal = $SD * $DT;
        $sueldoExtra = $sueldo - $salarioSemanal;
        $salarioHoraExtra = 2 * ($SD / 8);
        $noHrsExtra = $sueldoExtra / $salarioHoraExtra;

        echo '<td>' . $salarioSemanal . '</td>';
        echo '<td>' . $sueldoExtra . '</td>';
        echo '<td>' . number_format($noHrsExtra, 2) . '</td>';
        $array = array();

        if ($noHrsExtra <= 8) {
            for ($i = 0; $i < 5; $i++) {
                echo '<td>' . '0' . '</td>';
            }
            echo '<td>' . number_format($noHrsExtra, 2) . '</td>';
        } else {
            $dias = array(0, 0, 0, 0, 0, 0);
            $dias[5] = 8;
            $restantes = $noHrsExtra - 8;
            $i = 0;
            while ($restantes > 0) {
                if ($i == 5) {
                    $i = 0;
                }
                if ($restantes > 2) {
                    $dias[$i] += 1;
                    $restantes -= 1;
                } else {
                    $dias[$i] += $restantes;
                    $restantes = 0;
                }
                $i++;
            }
            for ($i = 0; $i < 6; $i++) {
                echo '<td>' . number_format($dias[$i], 2) . '</td>';
            }
        }
        echo '</tr>';
    }
}
echo '</table>';
?>