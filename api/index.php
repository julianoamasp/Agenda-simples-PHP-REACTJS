<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
header('Access-Control-Allow-Headers: token, Content-Type, X-Requested-With');
header('Access-Control-Max-Age: 1728000');
header('Content-Length: 0');
header('Content-Type: text/plain');
//parse_str(file_get_contents('php://input'), $_POST);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Contatos";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$gets = explode("/", $_SERVER['REQUEST_URI']);
$tipo = $gets[2];
switch ($tipo) {
    case 'api':
        $baseDados = $gets[3];
        switch ($baseDados) {
            case 'contatos':
                $metodo = $_SERVER['REQUEST_METHOD'];
                switch ($metodo) {
                    case 'GET':
                        //$corpo = file_get_contents("php://input");
                        //$corpoArr = json_decode($corpo, true);
                        $sql = "SELECT * FROM contatos";
                        $result = $conn->query($sql);
                        
                        $contatos = array();
                        if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                              array_push($contatos,array("id"=>$row["id"],"nome"=>$row["nome"],"telefone"=>$row["telefone"],"endereco"=>$row["endereco"],"email"=>$row["email"]));
                          }
                        }
                        $conn->close();
                        echo json_encode($contatos);
                        break;
                    case 'POST':
                        $corpo = file_get_contents("php://input");
                        $corpoArr = json_decode($corpo, true);
     
                        $sql = "INSERT INTO contatos VALUES (NULL, '".$corpoArr['nome']."', '".$corpoArr['telefone']."', '".$corpoArr['endereco']."', '".$corpoArr['email']."');";
                        
                        if ($conn->query($sql) === TRUE) {
                            echo json_encode(["cod"=>200]);
                        } else {
                            echo json_encode(["cod"=>500]);
                        }
                        $conn->close();
                        break;
                    case 'PUT':
                        $corpo = file_get_contents("php://input");
                        $corpoArr = json_decode($corpo, true);

                        $sql = "UPDATE contatos SET nome = '".$corpoArr['nome']."', telefone = '".$corpoArr['telefone']."', endereco = '".$corpoArr['endereco']."', email = '".$corpoArr['email']."' WHERE id = ".$corpoArr['identificador'].";";
                        
                        if ($conn->query($sql) === TRUE) {
                            echo json_encode(["cod"=>200]);
                        } else {
                            echo json_encode(["cod"=>500]);
                        }
                        break;
                    case 'DELETE':
                        $corpo = file_get_contents("php://input");
                        $corpoArr = json_decode($corpo, true);

                        $sql = "DELETE FROM contatos WHERE id = ".$corpoArr['id'];

                        if ($conn->query($sql) === TRUE) {
                        echo json_encode(["cod"=>200]);
                        } else {
                            echo json_encode(["cod"=>500]);
                        }
                        $conn->close();
                        break;
                }

                break;
        }
        break;
}
