<?php include_once('layout/component/head.php'); ?>
<?php include_once('layout/component/header.php'); ?>

<main>
    <h1>MOTOR</h1>
    <div></div>
    <?php
        $response = json_decode(file_get_contents('http://localhost/rimbu-1/api/productos/api-productos.php?subcategoria_producto_id=0'), true);
        if($response['statuscode'] == 200){
            foreach($response['items'] as $item){
                include('layout/items.php');
            }
        }
        else{
            print("<h3>Error</h3>");
            echo $response;
        }
    ?>            
</main>

<?php include_once('layout/component/footer.php'); ?>