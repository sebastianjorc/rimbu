<?php include_once('layout/component/head.php'); ?>
<?php include_once('layout/component/header.php'); ?>


    <main>
        <h1>ACCESORIOS</h1>
        <?php
            $response = json_decode(file_get_contents('http://localhost/rimbu-1/api/productos/api-productos.php?subcategoria_producto_id=1'), true);
            if($response['statuscode'] == 200){
                foreach($response['items'] as $item){
                    include('layout/items.php');
                }
            }else{
                ini_set('display_errors', 1);
            }
        ?>            
    </main>

<?php include_once('layout/component/footer.php'); ?>