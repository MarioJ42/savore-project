
<?php
    $host="localhost";
    $db="savore1";
    $dbuser="root";
    $dbpass="";

    $options=[
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    ];
    
    $dbh = new PDO("mysql:host=$host;dbname=$db", $dbuser, $dbpass, $options);
    return $dbh;
?>
