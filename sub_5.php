<table border=1>
<tr><td>Nume</td><td>Prenume</td><td>Legitimatie</td><td>An studiu</td></tr>
<?php
$bd=new PDO("mysql:host=localhost:3306;dbname=PBD",'root','root');
$utilizatori=$bd->query('SELECT nume, prenume, COUNT(nume) AS id FROM tabela1 WHERE Nota<5 GROUP BY nume, prenume HAVING COUNT(*) > 1');
foreach($utilizatori as $utilizator){
    echo '<tr><td>'.$utilizator['nume'].'</td> 
    <td>'.$utilizator['prenume'].'</td>
    <td>'.$utilizator['Legitimatie'].'</td>
    <td>'.$utilizator['An_studiu'].'</td>
    </tr>';
    
     
    

    }



?>
</table>