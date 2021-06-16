<?php
require_once ("config/connection.php");

class GetModel{
    /* Retorna el total de elementos dentro de la tabla $table */
    public static function getData($table, $orderBy, $orderMode ,$startAt, $endAt)
    {
        $sql = "SELECT * FROM $table";
        if($orderBy!=null && $orderMode!= null)
        {
            $sql = $sql." ORDER BY {$orderBy} {$orderMode}";
        }
        if($startAt!=null && $endAt!= null)
        {
            $sql = $sql." LIMIT {$startAt} , {$endAt}";
        }        
        $statement = Connection::connect() -> prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }    
    /* Retorna el total de elementos dentro de la tabla $table donde el atributo $linkTo sea igual a $equalTo */
    public static function getFilterData($table,$linkTo,$equalTo, $orderBy, $orderMode, $startAt, $endAt)
    {
        $sql="SELECT * FROM $table WHERE $linkTo = :$linkTo";        
        if($orderBy!=null && $orderMode!= null)
        {
            $sql = $sql." ORDER BY $orderBy $orderMode";
        }
        if($startAt!=null && $endAt!= null)
        {
            $sql = $sql." LIMIT {$startAt} , {$endAt}";
        }        
        $statement = Connection::connect() -> prepare($sql);
        $statement -> bindParam(":".$linkTo,$equalTo,PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    /* Retorna el total de elementos existentes en la relación $rel indexados por el atributo $type */
    /* Esta función está está incompleta debido a que debe ajustarse a los requisitos del proyecto, y para maqueta es reemplazada por getRelDataAux */
    public static function getRelData($rel, $type, $orderBy, $orderMode, $startAt, $endAt)
    {
        $relArray = explode(",",$rel);
        $typeArray = explode(",",$type);

        if (count($relArray)==2 && count($typeArray)==2)
        {
            $sql = 
            "SELECT * 
             FROM {$relArray[0]} INNER JOIN {$relArray[1]} 
             ON {$relArray[0]}.{$typeArray[0]} = {$relArray[1]}.{$typeArray[1]}";
        }        
        if($orderBy!=null && $orderMode!= null)
        {
            $sql = $sql." ORDER BY {$orderBy} {$orderMode}";
        }     
        if($startAt!=null && $endAt!= null)
        {
            $sql = $sql." LIMIT {$startAt} , {$endAt}";
        }        
        $statement = Connection::connect() -> prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }    
    /* Retorna el total de elementos existentes en la relación de las tablas dentro de $rel, las cuales se indexan por los atributos dentro de $type*/
    public static function getRelDataAux($rel, $type, $orderBy, $orderMode, $startAt, $endAt)
    {
        $relArray = explode(",",$rel);
        $typeArray = explode(",",$type);
        if (count($relArray) == count($typeArray) && count($relArray)%2==0)
        {
            $sql = "SELECT * FROM {$relArray[0]} ";
            for ($i=0; $i<count($relArray); $i=$i+2)
            {
                $j=$i+1;
                $sql = $sql.
                "INNER JOIN {$relArray[$j]} 
                 ON {$relArray[$i]}.{$typeArray[$i]} = {$relArray[$j]}.{$typeArray[$j]} ";
            }
        }
        if($orderBy!=null && $orderMode!= null)
        {
            $sql = $sql."ORDER BY {$orderBy} {$orderMode}";
        }
        if($startAt!=null && $endAt!= null)
        {
            $sql = $sql." LIMIT {$startAt} , {$endAt}";
        }   
        $statement = Connection::connect() -> prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);        
    }
    /* Retorna el total de elementos existentes en la relación de las tablas dentro de $rel, las cuales se indexan por los atributos dentro de $type y son iguales a $equalTo en el atributo $linkTo*/
    public static function getRelFilterDataAux($rel,$type,$linkTo, $equalTo, $orderBy, $orderMode, $startAt, $endAt)
    {
        $relArray = explode(",",$rel);
        $typeArray = explode(",",$type);
        if (count($relArray) == count($typeArray) && count($relArray)%2==0)
        {
            $sql = "SELECT * FROM {$relArray[0]} ";
            for ($i=0; $i<count($relArray); $i=$i+2)
            {
                $j=$i+1;
                $sql = $sql.
                "INNER JOIN {$relArray[$j]} 
                 ON {$relArray[$i]}.{$typeArray[$i]} = {$relArray[$j]}.{$typeArray[$j]} ";
            }
            
        }
        $sql = $sql."WHERE {$linkTo} = :$linkTo";
        if($orderBy!=null && $orderMode!= null)
        {
            $sql = $sql." ORDER BY {$orderBy} {$orderMode}";
        }
        if($startAt!=null && $endAt!= null)
        {
            $sql = $sql." LIMIT {$startAt} , {$endAt}";
        }        
        $statement = Connection::connect() -> prepare($sql);
        $statement -> bindParam(":".$linkTo,$equalTo,PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);        
    }
    /* Retorna el total de elementos existentes en una tabla que coincidan con el texto $search en el tributo $type */
    public static function getSearchData($table,$linkTo,$search)
    {
        $statement = Connection::connect()->prepare("SELECT * FROM $table WHERE $linkTo LIKE '%$search%'");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    /*  */
}
?> 