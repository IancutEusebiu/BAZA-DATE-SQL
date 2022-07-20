<table border=1>
<tr><td>Nume</td><td>Prenume</td><td>Legitimarie</td><td>An studiu</td><td>Disciplina</td><td>Nota</td></tr>
<?php

$bd=new PDO("mysql:host=localhost:3306;dbname=PBD",'root','root');

$utilizatori=$bd->query('SELECT nume,prenume,student.legitimatie,An_studiu,disciplina,Nota FROM student,note WHERE Nota>=5 and student.legitimatie=note.legitimatie GROUP BY legitimatie,nota ORDER BY nume,prenume,An_studiu,disciplina ');
foreach($utilizatori as $utilizator){
    echo '<tr><td>'.$utilizator['nume'].'</td> 
    <td>'.$utilizator['prenume'].'</td>
    <td>'.$utilizator['legitimatie'].'</td>
    <td>'.$utilizator['An_studiu'].'</td>
    <td>'.$utilizator['disciplina'].'</td>
    <td>'.$utilizator['Nota'].'</td>
    </tr>';
    
     
    

    }



?>
</table>