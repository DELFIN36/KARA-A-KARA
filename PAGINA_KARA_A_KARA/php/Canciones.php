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
function obtenerCanciones($c,$g){
//echo "<script>alert('".$g.$c"')</script>"
    $conn = conectar();

    if($conn){

        $q = "select * from Canciones where Id = $c and idGenero=$g ";

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

}
if(isset($_POST["cancion"]  ))
    obtenerCanciones($_POST["cancion"],$_POST["genero"]);
  
if(isset($_GET["js"]))
    obtenerCanciones($_GET["c"],$_GET["g"]);


?>