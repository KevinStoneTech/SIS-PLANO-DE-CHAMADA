<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function conectar($database) {
    define('DB_DRIVER', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PWD', 'chupacabra69');
    define('DB_DATABASE', $database);
    try {
        $pdo = new PDO(DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_DATABASE, DB_USER, DB_PWD);

        if ($pdo) {
            //echo("Conexão realizada com sucesso!");
            return $pdo;
        } else {
            session_destroy();
            $msgerro = base64_encode('Erro na tentativa de acesso ao servidor!');
            header('Location: signin.php?token=' . $msgerro);
        }
    } catch (PDOException $exc) {
        session_destroy();
        $msgerro = base64_encode($exc->getMessage());
        header('Location: signin.php?token=' . $msgerro);
        //echo "Problemas na conexão!";
        //echo $exc->getMessage();
    }
}

function conectar2($database2) {
    define('DB_DRIVER2', 'mysql');
    define('DB_HOST2', 'localhost');
    define('DB_USER2', 'root');
    define('DB_PWD2', 'chupacabra69');
    define('DB_DATABASE2', $database2);
    try {
        $pdo2 = new PDO(DB_DRIVER2 . ':host=' . DB_HOST2 . ';dbname=' . DB_DATABASE2, DB_USER2, DB_PWD2);

        if ($pdo2) {
            //echo("Conexão realizada com sucesso!");
            return $pdo2;
        } else {
            session_destroy();
            $msgerro = base64_encode('Erro na tentativa de acesso ao servidor!');
            header('Location: signin.php?token=' . $msgerro);
        }
    } catch (PDOException $exc) {
        session_destroy();
        $msgerro = base64_encode($exc->getMessage());
        header('Location: signin.php?token=' . $msgerro);
        //echo "Problemas na conexão!";
        //echo $exc->getMessage();
    }
}

function date_converter($_date = null) {
    $format = '/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/';
    if ($_date != null && preg_match($format, $_date, $partes)) {
        return $partes[3] . '/' . $partes[2] . '/' . $partes[1];
    }
    return false;
}

function calculaTempo($hora_inicial, $hora_final) {
    $i = 1;
    $tempo_total;

    $tempos = array($hora_final, $hora_inicial);

    foreach ($tempos as $tempo) {
        $segundos = 0;

        list($h, $m, $s) = explode(':', $tempo);
        $segundos += $h * 3600;
        $segundos += $m * 60;
        $segundos += $s;
        $tempo_total[$i] = $segundos;
        $i++;
    }
    $segundos = $tempo_total[1] - $tempo_total[2];

    $horas = floor($segundos / 3600);
    $segundos -= $horas * 3600;
    $minutos = str_pad((floor($segundos / 60)), 2, '0', STR_PAD_LEFT);
    $segundos -= $minutos * 60;
    $segundos = str_pad($segundos, 2, '0', STR_PAD_LEFT);

    return "$horas:$minutos:$segundos";
}

?>
