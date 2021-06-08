<?php

include_once 'productos.php';
header("Content-Type: text/html;charset=utf-8");

if(isset($_GET['categoria'])){
    $categoria = $_GET['categoria'];
    
    if($categoria == ''){
        echo json_encode(['statuscode' => 400, 
                            'response' => 'No existe la categor&iacute;a']);    
    }else{
        $productos = new Productos();
        $items = $productos->getItemsByCategoria($categoria);
        echo json_encode(['statuscode' => 200, 
                        'items' => $items]);
    }
}

else if(isset($_GET['lenghtCategoria'])){
    $categoria = $_GET['lenghtCategoria'];
    
    if($categoria == ''){
        echo json_encode(['statuscode' => 400, 
                            'response' => 'No existe la categor&iacute;a']);    
    }else{
        $productos = new Productos();
        $paginations = $productos->getLenghtCategoria($categoria);
        echo json_encode(['statuscode' => 200, 
                        'paginations' => $paginations]);
    }
}

if(isset($_GET['subcategoria'])){
    $subcategoria = $_GET['subcategoria'];
    
    if($subcategoria == ''){
        echo json_encode(['statuscode' => 400, 
                            'response' => 'No existe la subcategor&iacute;a']);    
    }else{
        $productos = new Productos();
        $items = $productos->getItemsBySubcategoria($subcategoria);
        echo json_encode(['statuscode' => 200, 
                        'items' => $items]);
    }
}

else if(isset($_GET['lenghtSubcategoria'])){
    $subcategoria = $_GET['lenghtSubcategoria'];
    
    if($subcategoria == ''){
        echo json_encode(['statuscode' => 400, 
                            'response' => 'No existe la subcategor&iacute;a']);    
    }else{
        $productos = new Productos();
        $paginations = $productos->getLenghtCategoria($subcategoria);
        echo json_encode(['statuscode' => 200, 
                        'paginations' => $paginations]);
    }
}

else if(isset($_GET['marca'])){
    $marca = $_GET['marca'];
    
    if($marca == ''){
        echo json_encode(['statuscode' => 400, 
                            'response' => 'No existe la marca']);    
    }else{
        $productos = new Productos();
        $items = $productos->getItemsByMarca($marca);
        echo json_encode(['statuscode' => 200, 
                        'items' => $items]);
    }
}

else if(isset($_GET['lenghtMarca'])){
    $marca = $_GET['lenghtMarca'];
    
    if($marca == ''){
        echo json_encode(['statuscode' => 400, 
                            'response' => 'No existe la marca']);
    }else{
        $productos = new Productos();
        $paginations = ceil($productos->getLenghtMarca($marca));
        echo json_encode(['statuscode' => 200, 
                        'paginations' => $paginations]);
    }
}

else if(isset($_GET['get-item'])){
    $id = $_GET['get-item'];

    if($id == ''){
        echo json_encode(['statuscode' => 400, 
                            'response' => 'No hay valor para id']);    
    }else{
        $productos = new Productos();
        $item = $productos->get($id);
        echo json_encode(['statuscode' => 200, 
                        'item' => $item]);
    }
}

else{
    echo json_encode(['statuscode' => 404, 
                        'response' => 'No se puede procesar la solicitud']);
}

?>