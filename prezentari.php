<table border=1>
<tr><td>Nume</td><td>Prenume</td><td>Legitimatie</td><td>Nr prezentari</td></tr>
<?php

$bd=new PDO("mysql:host=localhost:3306;dbname=PBD",'root','root');

    $utilizatori=$bd->query('SELECT student.nume,student.prenume,a.legitimatie,total
                                  FROM (select legitimatie,sum(Nr_prezentare) as total from note group by legitimatie ) a 
                                          INNER JOIN student 
                                                  ON a.legitimatie = student.legitimatie group by a.legitimatie ORDER BY total DESC LIMIT 1') ;
  


foreach($utilizatori as $utilizator){
     
    echo '<tr><td>'.$utilizator['nume'].'</td> 
    <td>'.$utilizator['prenume'].'</td>
    <td>'.$utilizator['legitimatie'].'</td>
    <td>'.$utilizator['total'].'</td>
    
    </tr>';
    
    }


?>
</table>
<form action="#" method="post">
    <h4>Introduceti nr legitimatie pt a afisa rata de promovabilitate a studentului:</h4>
    <input type="text" name="inputText"/>
        <button type="submit" name="rata" class="btn btn-primary">Calculeaza</button>
</form>
<?php
if(isset($_POST['rata'])){ //check if form was submitted
    $leg = $_POST['inputText']; //get input text
    $q = "SELECT rata_student($leg)";
    $rata =$bd->query($q);
    $result = $rata->fetch(PDO::FETCH_ASSOC);
    echo "Rata de promovabilitate: "; foreach($result as $r){echo $r ;  };echo "%";  
   
  }    


 

?>