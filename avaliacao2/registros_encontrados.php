<?php
    require_once('header.php');
    require_once('dados_banco.php');

   $numeracao=$_POST['placa_id'];
 
    try {
        $dsn = "mysql:host=$servername;dbname=$dbname";
        $conn = new PDO($dsn, $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT data_hora FROM registro WHERE $numeracao=veiculos_id";
    }catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }
    $stmt = $conn->query($sql);
    $conn=null;

?>
 
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Portaria Fatec</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h2>
            <?php echo $_SESSION["username"]; ?>
            <br>
        </h2>
    </div>
    <p>

        <div class="form-group">
            <label>Data e Hora em que existe registro de entrada/saída</label>
            <br>
            <?php
               while ($row = $stmt->fetch()) {
                echo $row['data_hora']. "<br/>\n";
            }
            ?>
           
        </div>


    <a href="principal.php" class="btn btn-primary">Voltar</a>
    <br><br>

    </p>
</body>
</html>