<?php
// get_template.php

$filePath = __DIR__ . '/DTR.xlsx';

if (file_exists($filePath)) {
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: inline; filename="DTR.xlsx"');
    readfile($filePath);
    exit;
} else {
    http_response_code(404);
    echo "Template not found.";
}
?>
