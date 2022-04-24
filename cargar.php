<?php
    require 'vendor/autoload.php';
    use Aws\S3\S3Client;
    use Aws\S3\Exception\S3Exception;

    if(isset($_FILES['file'])){
        subir_s3($_FILES['file']);

    }

    function subir_s3($file)
    {
        $parametros = [
            'region' => 'us-east-2',
            'version' => '2006-03-01',
            'credentials' => [
                'key' => 'AKIAYZWZRCRYLNWEK4T3',
                'secret' => '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'
            ]

        ];

            $file_name = $file['name'];
            $file_path = $file['tmp_name'];
            try{
                $s3client = new S3Client($parametros);
                $resultado = $s3client->putObject([
                'Bucket' => 'cargar-archivo-php',
                //con esta asiganion al key especifico a que lugar en especifico quiero el file
                'Key' => 'progra3/2022/04/22/0905/' . basename($file_name),
                'SourceFile' => $file_path
                ]);
                echo "<pre>" .print_r("Se ha insertado el objeto", true). "</pre>";

            }catch(S3Exception $ex){
                echo $ex->getMessage()."\n";
            }



    }

?>