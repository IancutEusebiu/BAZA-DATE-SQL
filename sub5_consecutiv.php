<table border=1>
<tr><td>Nume</td><td>Prenume</td><td>Legitimatie</td></tr>
<?php
$bd=new PDO("mysql:host=localhost:3306;dbname=PBD",'root','root');
$utilizatori=$bd->query('SELECT a.nume,a.prenume,a.legitimatie from(select nume,prenume,student.legitimatie,An_studiu,Nota as nota,disciplina from student,note where Nota<5 and note.legitimatie=student.legitimatie group by An_studiu,legitimatie ) a
inner join (select legitimatie,An_studiu,Nota from note group by legitimatie,An_studiu) b on a.An_studiu+1=b.An_studiu and a.legitimatie=b.legitimatie order by legitimatie ');
foreach($utilizatori as $utilizator){
    echo '<tr><td>'.$utilizator['nume'].'</td> 
    <td>'.$utilizator['prenume'].'</td>
    <td>'.$utilizator['legitimatie'].'</td>
    
    </tr>';
    
     
    

    }



?>
</table>