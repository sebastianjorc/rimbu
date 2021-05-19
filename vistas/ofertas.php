<?php include_once('layout/component/head.php'); ?>
<?php include_once('layout/component/header.php'); ?>
<h1>PRUEBA DE OFERTAS</h1>
<div class="contenedor-items-oferta">
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
</div>

<?php include_once('layout/component/footer.php'); ?>