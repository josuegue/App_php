<?php
    require 'vendor/autoload.php';
    use Aws\S3\S3Client;
    use Aws\S3\Exception\S3Exception;

    if(isset($_FILES['file']) && isset($_POST["carnet"])){
        subir_s3($_FILES['file'], $_POST["carnet"]);

    }

    function subir_s3($file, $carnet)
    {
        $parametros = [
            'region' => 'us-east-2',
            'version' => '2006-03-01',
            'credentials' => [
                'key' => 'AKIAYZWZRCRYLNWEK4T3',
                'secret' => '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'
            ]

        ];
            $time = time();
            $tiempo = date("d-m-Y", $time);
            $array = explode("-",$tiempo);

            
            $dia = $array[0];
            $mes = $array[1];
            $anio = $array[2];
            $ubicacionSubc = "progra3/$anio/$mes/$dia/$carnet/";

            $file_name = $file['name'];
            $file_path = $file['tmp_name'];
            try{
                $s3client = new S3Client($parametros);
                $resultado = $s3client->putObject([
                'Bucket' => 'cargar-archivo-php',
                //con esta asiganion al key especifico a que lugar en especifico quiero el file
                'Key' => $ubicacionSubc . basename($file_name),
                'SourceFile' => $file_path
                ]);
                echo "<pre>" .print_r("Se ha insertado el objeto con fecha $tiempo", true). "</pre>";

            }catch(S3Exception $ex){
                echo $ex->getMessage()."\n";
            }



    }

?>