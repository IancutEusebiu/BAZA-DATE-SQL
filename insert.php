<?php
try{
    $pdo = new PDO("mysql:host=localhost:3306;dbname=PBD",'root','root');
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){

    die("ERROR: Could not connect. " . $e->getMessage());
}

try{
  
    $sql = "INSERT INTO student (nume, prenume, legitimatie) VALUES (:nume, :prenume, :legitimatie)";

    $stmt = $pdo->prepare($sql);
    
    
    $stmt->bindParam(':nume', $_REQUEST['nume']);
    $stmt->bindParam(':prenume', $_REQUEST['prenume']);
    $stmt->bindParam(':legitimatie', $_REQUEST['legitimatie']);
    
    
    $stmt->execute();
    echo "Student adaugat cu succes!.";

} catch(PDOException $e){

    die("ERROR: Eroare $sql. " . $e->getMessage());
}

unset($pdo);
?>
