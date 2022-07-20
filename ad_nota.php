<?php
try{
    $pdo = new PDO("mysql:host=localhost:3306;dbname=PBD",'root','root');
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){

    die("ERROR: Could not connect. " . $e->getMessage());
}

try{
  
    $sql = "INSERT INTO note (legitimatie, disciplina, an_studiu,Nr_prezentare,data,nota) VALUES (:legitimatie, :disciplina, :an_studiu,:prezentare,:data,:nota)";

    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':legitimatie', $_REQUEST['legitimatie']);
    $stmt->bindParam(':disciplina', $_REQUEST['disciplina']);
    $stmt->bindParam(':an_studiu', $_REQUEST['an_studiu']);
    $stmt->bindParam(':prezentare', $_REQUEST['prezentare']);
    $stmt->bindParam(':data', $_REQUEST['data']);
    $stmt->bindParam(':nota', $_REQUEST['nota']);
    
    
    $stmt->execute();
    echo "Nota adaugata cu succes!.";

} catch(PDOException $e){

    die("ERROR: Eroare $sql. " . $e->getMessage());
}

unset($pdo);
?>