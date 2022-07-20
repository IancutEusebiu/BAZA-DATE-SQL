<?php 
$bd=new PDO("mysql:host=localhost:3306;dbname=PBD",'root','root');

if(isset($_POST['rata'])){ //check if form was submitted
  $disciplina = $_POST['inputText']; //get input text
  $q = "SELECT rata('$disciplina')";
  $rata =$bd->query($q);
  $result = $rata->fetch(PDO::FETCH_ASSOC);
  
}    
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container">
<div class="row">
    <div class="col">
        <h3 align="center">Tabela student:</h3>
        <table class="table table-dark table-striped" align="center" border=1>
        <tr><td>Nume</td><td>Prenume</td><td>Legitimatie</td><td>Media generala</td><td>Media pe anul 1</td><td>Media pe anul 2</td><td>Media pe anul 3</td></tr>
        <?php
        
        $utilizatori=$bd->query('SELECT * FROM student ORDER BY legitimatie');
        foreach($utilizatori as $utilizator){
            echo '<tr><td>'.$utilizator['nume'].'</td> 
            <td>'.$utilizator['prenume'].'</td>
            <td>'.$utilizator['legitimatie'].'</td>
            <td>'.$utilizator['Media_generala'].'</td>
            <td>'.$utilizator['Media_anul1'].'</td>
            <td>'.$utilizator['Media_anul2'].'</td>
            <td>'.$utilizator['Media_anul3'].'</td>
            </tr>';
            
            
            

            }



        ?>
        </table>
    </div>
    <div class="col">
        <h3 align="center">Tabela note:</h3>
        <table class="table table-dark table-striped" align="center" border=1>
        <tr><td>Legitimatie</td><td>Disciplina</td><td>An studiu</td><td>Nr prezentare</td><td>Data</td><td>Nota</td></tr>
        <?php
        $bd=new PDO("mysql:host=localhost:3306;dbname=PBD",'root','root');
        $utilizatori=$bd->query('SELECT * FROM note ORDER BY legitimatie,An_studiu');
        foreach($utilizatori as $utilizator){
            echo '<tr><td>'.$utilizator['legitimatie'].'</td> 
            <td>'.$utilizator['disciplina'].'</td>
            <td>'.$utilizator['An_studiu'].'</td>
            <td>'.$utilizator['Nr_prezentare'].'</td>
            <td>'.$utilizator['data'].'</td>
            <td>'.$utilizator['Nota'].'</td>
            
            </tr>';
            
            
            

            }



        ?>
        </table>
        </div>
</div>
</div>

<div class="container">
    <div class="row">
        <div class="col">
        <form action="nepromovat.php" method="post">
        <button type="submit" class="btn btn-primary">Discipline nepromovate</button>
        </form>
        </div>

        <div class="col">
        <form action="raport.php" method="post">
        <button type="submit" class="btn btn-primary">Raport</button>
        </form>
        </div>

        <div class="col">
        <form action="raport_detaliat.php" method="post">
        <button type="submit" class="btn btn-primary">Raport detaliat</button>
        </form>
        </div>

        <div class="col">
        <form action="prezentari.php" method="post">
        <button type="submit" class="btn btn-primary">Cele mai multe prezentari</button>
        </form>
        </div>

        <div class="col">
        <form action="sub5_consecutiv.php" method="post">
        <button type="submit" class="btn btn-primary">Note sub 5 consecutiv</button>
        </form>
        </div>
        
    </div>
    <div class="row">
    <div class="col">
        
        <form action="#" method="post">
        
            
            <h4>Introduceti disciplina:</h4>
        <input type="text" name="inputText"/>
        <button type="submit" name="rata" class="btn btn-primary">Calculeaza promovabilitatea</button>
        <?php 
           if(isset($_POST['rata'])){
            echo "Rata de promovabilitate la materia $disciplina este: ";
            foreach($result as $r){
                echo $r ;
            }
            echo "%"; 
        }
            ?>
        </form>
    </div>

    </div><br>
    <div class="row">
    <div class="col">
        <h4>Date student:</h4>
    <form action="insert.php" method="post">
    <p>
        <label for="nume">Nume:</label>
        <input type="text" name="nume" id="nume">
    </p>
    <p>
        <label for="prenume">Prenume:</label>
        <input type="text" name="prenume" id="prenume">
    </p>
    <p>
        <label for="legitimatie">Legitimatie:</label>
        <input type="text" name="legitimatie" id="legitimatie">
    </p>
    <input type="submit" value="Adauga">
</form>
    </div>
    <div class="col">
        <h4>Adauga nota:</h4>
        <form action="ad_nota.php" method="post">
    <p>
        <label for="legitimatie">Legitimatie:</label>
        <input type="text" name="legitimatie" id="legitimatie">
    </p>
    <p>
        <label for="disciplina">Disciplina:</label>
        <input type="text" name="disciplina" id="disciplina">
    </p>
    <p>
        <label for="an_studiu">An Studiu:</label>
        <input type="text" name="an_studiu" id="an_studiu">
    </p>
    <p>
        <label for="prezentare">Nr prezentare :</label>
        <input type="text" name="prezentare" id="prezentare">
    </p>
    <p>
        <label for="data">Data:</label>
        <input type="text" name="data" id="data">
    </p>
    <p>
        <label for="nota">Nota:</label>
        <input type="text" name="nota" id="nota">
    </p>
    <input type="submit" value="Adauga">
</form>
    </div>
    </div>
    
</div>