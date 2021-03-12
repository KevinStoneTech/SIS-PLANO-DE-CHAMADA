<?php

$ap = DATA_FOLDER;
$dir = '/';

if (empty($_GET['pasta']) === false) {
   $dir = '/' . trim($_GET['pasta'], '/');
}

if (isset($_GET['deletar']) && file_exists($ap . $dir)) {
    echo '<a href="deletar.php?arquivo=', $ap . $dir,'">Quer realmente deletar o arquivo "', $ap , $dir, '"?</a><hr>';
}

if (is_dir($ap . $dir)) {
    $dh = opendir($ap . $dir);
    if ($dh) {
        echo '<ul>';

        while (($file = readdir($dh)) !== false) {
            if ($file === '.' || $file === '..') {
               continue;
            }

            $acessivel = false;
            $atual = $ap . $dir . '/' . $file;

            if (is_dir($atual)) {
                 echo '<li> <a href="navegar.php?pasta=', $dir, '/', $file, '">', $file,'</a>';
                 $acessivel = true;
            } else if (is_file($atual)) {
                 echo '<li>', $file,' <a href="editar.php?arquivo=', $dir, '/', $file, '">[Editar]</a>';
                 $acessivel = true;
            }

            if ($acessivel) {
                echo ' <a href="deletar.php?arquivo=', $dir, '/', $file, '&amp;deletar=1">[Deletar]</a> </li>';
            }
        }

        echo '</ul>';
        closedir($dh);
    }
}
?>

<hr>

<a href="navegar.php">Voltar a raiz</a>