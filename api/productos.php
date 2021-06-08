<?php
include_once '../config/database.php';

class Productos extends Database{
    
    function __construct(){
        parent::__construct();
    }

    public function get($id_producto){
        $query = $this->connect()->prepare(
            'SELECT * FROM producto WHERE id_producto = :id_producto LIMIT 0,12');
        $query->execute(['id_producto' => $id_producto]);

        $row = $query->fetch();

        return [
            'id_producto'=> $row['id_producto'],
            'description'=> $row['description'],
            'marca'    => $row['marca'],
            'title'    => $row['title'],
            'price'    => $row['price'],
            'stock'    => $row['stock'],
            'categoria_id' => $row['categoria_id'],
            'url_img'  => $row['url_img'] ];
    }

    public function getLenghtCategoria($categoria_id){
        $query = $this->connect()->prepare('SELECT * FROM producto WHERE categoria_id = :cat');
        $query->execute(['cat' => $categoria_id]);
        
        $cantid_productoad_tuplas = $query->rowCount();
        echo $cantid_productoad_tuplas;

        return (ceil ($cantid_productoad_tuplas/12));

    }

    public function getItemsByCategoria($categoria_id){
        $query = $this->connect()->prepare('SELECT * FROM producto WHERE categoria_id = :cat LIMIT 0,12');
        $query->execute(['cat' => $categoria_id]);
        $items = [];
        
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $item = [
                'id_producto'       => $row['id_producto'],
                'description'=> $row['description'],
                'marca'    => $row['marca'],
                'title'    => $row['title'],
                'price'    => $row['price'],
                'stock'    => $row['stock'],
                'categoria_id' => $row['categoria_id'],
                'url_img'  => $row['url_img']
                    ];
            array_push($items, $item);
        }
        return $items;

    }
    
    public function getLenghtSubcategoria($subcategoria_id){
        $query = $this->connect()->prepare('SELECT * FROM producto WHERE subcategoria_id = :cat');
        $query->execute(['cat' => $subcategoria_id]);
        
        $cantid_productoad_tuplas = $query->rowCount();
        echo $cantid_productoad_tuplas;

        return (ceil ($cantid_productoad_tuplas/12));

    }

    public function getItemsBySubcategoria($subcategoria_id){
        $query = $this->connect()->prepare('SELECT * FROM producto WHERE subcategoria_id = :cat LIMIT 0,12');
        $query->execute(['cat' => $subcategoria_id]);
        $items = [];
        
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $item = [
                'id_producto'       => $row['id_producto'],
                'description'=> $row['description'],
                'marca'    => $row['marca'],
                'title'    => $row['title'],
                'price'    => $row['price'],
                'stock'    => $row['stock'],
                'subcategoria_id' => $row['subcategoria_id'],
                'url_img'  => $row['url_img']
                    ];
            array_push($items, $item);
        }
        return $items;

    }
    
    public function getLenghtMarca($marca){
        $query = $this->connect()->prepare('SELECT * FROM producto WHERE marca = :mar');
        $query->execute(['mar' => $marca]);
        
        $cantid_productoad_tuplas = $query->rowCount();
        return ($cantid_productoad_tuplas/12);
    }
    
    public function getItemsByMarca($marca){
        
        $query = $this->connect()->prepare('SELECT * FROM producto WHERE marca = :marc LIMIT 0,12');
        $query->execute(['marc' => $marca]);
        
        $items = [];
        
        while($row = $query->fetch(PDO::FETCH_ASSOC)){

            $item = [
                'id_producto'       => $row['id_producto'],
                'description'=> $row['description'],
                'marca'    => $row['marca'],
                'title'    => $row['title'],
                'price'    => $row['price'],
                'stock'    => $row['stock'],
                'categoria_id' => $row['categoria_id'],
                'url_img'  => $row['url_img']
                    ];
            array_push($items, $item);
        }
        return $items;
    }
    
}

?>