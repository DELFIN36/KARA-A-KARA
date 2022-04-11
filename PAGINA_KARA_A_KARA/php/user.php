<?php    
   function conectar(){
        $servidor = "148.239.60.61";
        $usuarioDB = 'ids';
        $passwordDB = "ids";
        $db = "proyectokara1";
        $connInfo = array("Database"=>$db,"UID" => $usuarioDB,"PWD"=>$passwordDB,"CharacterSet"=>"UTF-8");
        

        $conexion = sqlsrv_connect($servidor,$connInfo);

        return $conexion;
    }

    function iniciarSesion($u,$p){

        $conn = conectar();
        $a = array();
        $a[0]="bnb";
        if($conn){
    
            //$q = "SELECT * FROM Votantes WHERE Username = '$u' AND Password = '$p'";
            $q=" exec iniciasesion '$u','$p'";
            $resultados = sqlsrv_query($conn, $q);
    
            if($resultados == true){
    
                while($f = sqlsrv_fetch_array($resultados, SQLSRV_FETCH_ASSOC)){
    
                    $registros[] = $f;

    
                }
    
                $str = json_encode($registros);
     
                echo $str;
                
            }
    
        }else{
    
            //echo "no conectato";
    
        }
        $a[2] ="hola";
    
        sqlsrv_close($conn);
   

    }


    function generarSala(){
        $conn = conectar();
        if($conn){
    
            //$q = "SELECT * FROM Votantes WHERE Username = '$u' AND Password = '$p'";
            $q=" exec obtenersala ";
            $resultados = sqlsrv_query($conn, $q);
            if($resultados == true){
                while($f = sqlsrv_fetch_array($resultados, SQLSRV_FETCH_ASSOC)){
                    $registros[] = $f;
                }
                $str = json_encode($registros);
                echo $str;
            }
    
        }else{
    
            //echo "no conectato";
    
        }
        sqlsrv_close($conn);
    } //Fin GeneraSala

    if(isset($_GET["gR"]))
        generarSala();

    if(isset($_POST["login"]))
        iniciarSesion($_POST["u"],$_POST["p"]);

/*
class User extends DB{
    public function UserExists($user, $pass){

    $md5pass = md5($pass);

    $query = $this->connect()->prepare('SELECT * FROM Votantes WHERE Username = :user AND Password = :pass');
    $query->execute(['user'=>$user,'pass'=>$md5pass]);

    if ($query->rowCount()){
        return true;
    }else{
        return false;
    }
    }
    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM Votantes WHERE Username = :user');
        $query->execute(['user' => $user]);

        foreach ($query as $currentUser){
            $this->nombre = $currentUser['nombre'];
            $this->username = $currentUser['username'];
        }
    }
    public function getNomber(){
    return $this->nombre;
    }
}
*/
?>