<?php
/**
 * MODX BUILD ENVIRONMENT GUI v1
 * For better developer experience while contributing on MODX packages
 * Made for MODX RSC by Ditry Kasatkin (aka @dimasites) dimasites@yandex.com and friends
**/

if (!isset($_REQUEST['getpackage']) && empty($_REQUEST['getpackage'])) {

    $current_dir = dirname(__FILE__,2);//go to ./_build/ dir

    $scanned_directory = array_diff(scandir($current_dir), array('..', '.'));
    echo "<html><body style='background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);font-size: 20px; font-family: sans-serif, serif;'>";
    echo "<h1>MODX build environment GUI</h1>";
    echo "<b>Available packages for build:</b> (with versions from build.config.php if exists)<br/><br/>";
    //echo "<b>Данные о версии берутся из файла конфигурации пакета</b> (build.config.php)<br/><br/>";
    foreach ($scanned_directory as $packagename) {
        if (is_dir($current_dir.'/'.$packagename)) {
            if ($packagename == 'env') continue;
            $config = file_get_contents($current_dir.'/'.$packagename.'/'."build.config.php");
            /*parse version*/
            $version_preg = "#PKG_VERSION['\",=\s]*([0-9\.]+)#";
            $release_preg = "#PKG_RELEASE['\",=\s]*([a-z0-9\.]+)['\"]#";
            $version = '';
            $matches = [];
            if (preg_match($version_preg, $config, $matches)) {
                $version .= $matches[1];
            }
            if (preg_match($release_preg, $config, $matches)) {
                $version .= '-'.$matches[1];
            }
            echo "<b>• {$packagename}</b>&nbsp;<a target='_blank' style='text-decoration: none;' href='/_build/{$packagename}/build.transport.php'>[build package]</a> (".$version.")<br/><br/>";
        }
    }
    echo "</body>";

}else{
// Define paths
    if (isset($_SERVER['MODX_BASE_PATH'])) {
        define('MODX_BASE_PATH', $_SERVER['MODX_BASE_PATH']);
    } elseif (file_exists(dirname(__FILE__, 3) . '/core')) {
        define('MODX_BASE_PATH', dirname(__FILE__, 3) . '/');
    } else {
        exit('Sorry, cant define paths');
    }

    define('MODX_CORE_PATH', MODX_BASE_PATH . 'core/');

    echo $file = MODX_CORE_PATH.'packages/'.$_REQUEST['getpackage'].'.transport.zip';
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }
}
