<table border=1>
<tr><td>Nume</td><td>Prenume</td><td>An studiu</td><td>Numar legitimatie</td></tr>
<?php
$bd=new PDO("mysql:host=localhost:3306;dbname=PBD",'root','root');
$utilizatori=$bd->query('SELECT nume,prenume,MAX(An_studiu),student.legitimatie FROM student,note where student.legitimatie=note.legitimatie group by legitimatie');
foreach($utilizatori as $utilizator){
    echo '<tr><td>'.$utilizator['nume'].'</td> 
    <td>'.$utilizator['prenume'].'</td>
    <td>'.$utilizator['MAX(An_studiu)'].'</td>
    <td>'.$utilizator['legitimatie'].'</td>
    </tr>';
    
     
    

    }



?>
</table>