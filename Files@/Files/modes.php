<?php
    $f = fopen("modes.txt", "x");
    fwrite($f, "X mode\n");
    fclose($f);

    $f = fopen("modes.txt", "a");
    fwrite($f, "A mode\n");
    fclose($f);

    $f = fopen("modes.txt", "a+");
    fwrite($f, "A+ mode\n");
    rewind($f);
    echo fread($f, filesize("modes.txt"));
    fclose($f);

    $f = fopen("modes.txt", "r");
    echo fread($f, filesize("modes.txt"));
    fclose($f);

    $f = fopen("modes.txt", "r+");
    fwrite($f, "R+");
    rewind($f);
    echo fread($f, filesize("modes.txt"));
    fclose($f);

    $f = fopen("modes.txt", "w");
    fwrite($f, "W mode\n");
    fclose($f);

    $f = fopen("modes.txt", "w+");
    fwrite($f, "W+ mode\n");
    rewind($f);
    echo fread($f, filesize("modes.txt"));
    fclose($f);
?>
