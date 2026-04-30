  GNU nano 2.3.1            File: pull.php                              

<?php

// Ejecuta la actualización del tema cuando el webhook recibe payload.
if (!empty($_POST['payload'])) {
    $themeDir = __DIR__ . '/wp-content/themes/AGM_EHUNTING';
    $command = sprintf(
        'cd %s && /usr/bin/git reset --hard && /usr/bin/git pull origin master 2>&1',
        escapeshellarg($themeDir)
    );

    try {
        exec($command, $output, $statusCode);
        http_response_code($statusCode === 0 ? 200 : 500);
        var_dump($output);
    } catch (Exception $e) {
        http_response_code(500);
        echo 'Excepcion capturada: ', $e->getMessage(), "\n";
    }
}
