<table border=1>
<tr><td>Nume</td><td>Prenume</td><td>Disciplina</td><td>Nota</td></tr>
<?php
$bd=new PDO("mysql:host=localhost:3306;dbname=PBD",'root','root');
$utilizatori=$bd->query('SELECT DISTINCT nume,prenume,disciplina,Nota FROM student,note where Nota<5 and student.legitimatie=note.legitimatie');
foreach($utilizatori as $utilizator){
    echo '<tr><td>'.$utilizator['nume'].'</td> 
    <td>'.$utilizator['prenume'].'</td>
    <td>'.$utilizator['disciplina'].'</td>
    <td>'.$utilizator['Nota'].'</td>
    </tr>';
    
     
    

    }



?>
</table>
