
<?php
$domain = $_SERVER['HTTP_HOST'];
$routesArray = $_SERVER['REQUEST_URI'];
$routesArray = explode("/", $routesArray);
$routesArray = array_filter($routesArray);

/* Cuando no se hace ninguna petición a la API */
if (count($routesArray)<=2)  
{
    $json = array(
        'status'=>404,
        "result"=>"Not found"
    );
    echo json_encode($json,http_response_code(404));
    return;
}
else
{   /* Peticiones GET */
    if (count($routesArray)>=3 &&
        isset($_SERVER["REQUEST_METHOD"]) &&
        $_SERVER["REQUEST_METHOD"]=="GET")
    {
        /* Entre tablas relacionadas CON FILTRO */
        if (isset($_GET["rel"]) && 
            isset($_GET["type"]) &&
            isset($_GET["linkTo"]) && 
            isset($_GET["equalTo"]) &&
            explode("?",$routesArray[3])[0]=="relations")
        {
            if (isset($_GET["orderBy"]) && 
                isset($_GET["orderMode"]) )
            {
                $orderBy    = $_GET["orderBy"];
                $orderMode  = $_GET["orderMode"];

            }
            else
            {
                $orderBy    = null;
                $orderMode  = null;
            }
            /* Límites para paginación*/
            if (isset($_GET["startAt"]) && 
                isset($_GET["endAt"]) )
            {
                $startAt    = $_GET["startAt"];
                $endAt  = $_GET["endAt"];
            }
            else
            {
                $startAt= null;
                $endAt  = null;
            }
            $routesArray= explode("?", $routesArray[3]);
            $response   = new GetController();
            $response->getRelFilterData($_GET["rel"],
                                        $_GET["type"],
                                        $_GET["linkTo"],
                                        $_GET["equalTo"],
                                        $orderBy,
                                        $orderMode,
                                        $startAt,
                                    $endAt);

        }
        /* Entre tablas relacionadas SIN FILTRO */
        else if (isset($_GET["rel"]) && 
                isset($_GET["type"]) &&
                explode("?",$routesArray[3])[0]=="relations")
        {
            if (isset($_GET["orderBy"]) && 
                isset($_GET["orderMode"]) )
            {
                $orderBy    = $_GET["orderBy"];
                $orderMode  = $_GET["orderMode"];

            }
            else
            {
                $orderBy    = null;
                $orderMode  = null;
            }
            /* Límites para paginación*/
            if (isset($_GET["startAt"]) && 
                isset($_GET["endAt"]) )
            {
                $startAt    = $_GET["startAt"];
                $endAt  = $_GET["endAt"];
            }
            else
            {
                $startAt= null;
                $endAt  = null;
            }
            $routesArray= explode("?", $routesArray[3]);
            $response   = new GetController();
            $response -> getRelData($_GET["rel"],
                                    $_GET["type"],
                                        $orderBy,
                                        $orderMode,
                                        $startAt,
                                    $endAt);

        }
        /* Una tabla CON BÚSQUEDA DE COINSIDENCIA (like)*/
        else if (isset($_GET["linkTo"]) && 
                 isset($_GET["search"]) )
        {
            if (isset($_GET["orderBy"]) && 
                isset($_GET["orderMode"]) )
            {
                $orderBy    = $_GET["orderBy"];
                $orderMode  = $_GET["orderMode"];

            }
            else
            {
                $orderBy    = null;
                $orderMode  = null;
            }
            /* Límites para paginación*/
            if (isset($_GET["startAt"]) && 
                isset($_GET["endAt"]) )
            {
                $startAt    = $_GET["startAt"];
                $endAt  = $_GET["endAt"];
            }
            else
            {
                $startAt= null;
                $endAt  = null;
            }
            $routesArray = explode("?", $routesArray[3]);
            $response = new GetController();
            $response -> getSearchData( $routesArray[0],
                                        $_GET["linkTo"],
                                        $_GET["search"],
                                        $orderBy,
                                        $orderMode,
                                        $startAt,
                                    $endAt);

        }
        /* Una tabla CON FILTRO */
        else if (isset($_GET["linkTo"]) && 
                 isset($_GET["equalTo"]) )
        {
            if (isset($_GET["orderBy"]) && 
                isset($_GET["orderMode"]) )
            {
                $orderBy    = $_GET["orderBy"];
                $orderMode  = $_GET["orderMode"];

            }
            else
            {
                $orderBy    = null;
                $orderMode  = null;
            }
            /* Límites para paginación*/
            if (isset($_GET["startAt"]) && 
                isset($_GET["endAt"]) )
            {
                $startAt    = $_GET["startAt"];
                $endAt  = $_GET["endAt"];
            }
            else
            {
                $startAt= null;
                $endAt  = null;
            }
            $routesArray = explode("?", $routesArray[3]);
            $response = new GetController();
            $response -> getFilterData( $routesArray[0],
                                        $_GET["linkTo"],
                                        $_GET["equalTo"],
                                        $orderBy,
                                        $orderMode,
                                        $startAt,
                                        $endAt);
        }
        /* Una tabla SIN FILTRO */
        else             
        {   /* Preguntamos si viene con una variable de ordenamiento */
            if (isset($_GET["orderBy"]) && 
                isset($_GET["orderMode"]) )
            {
                $orderBy    = $_GET["orderBy"];
                $orderMode  = $_GET["orderMode"];

            }
            else
            {
                $orderBy    = null;
                $orderMode  = null;
            }
            /* Límites para paginación*/
            if (isset($_GET["startAt"]) && 
                isset($_GET["endAt"]) )
            {
                $startAt    = $_GET["startAt"];
                $endAt  = $_GET["endAt"];
            }
            else
            {
                $startAt= null;
                $endAt  = null;
            }

            $routesArray = explode("?", $routesArray[3]);
            $response = new GetController();
            $response -> getData($routesArray[0],
                                 $orderBy,
                                 $orderMode,
                                 $startAt,
                                 $endAt);
        }

    }
    /* PETICIÓN POST */
    else if(count($routesArray)>=3 &&
            isset($_SERVER["REQUEST_METHOD"]) &&
            $_SERVER["REQUEST_METHOD"]=="POST")
    {
        $json = array(
            'status'=>200,
            "result"=>"success POST"
        );
    }
    /* PETICIÓN PUT */
    else if(count($routesArray)>=3 &&
            isset($_SERVER["REQUEST_METHOD"]) &&
            $_SERVER["REQUEST_METHOD"]=="PUT")
    {
        $json = array(
            'status'=>200,
            "result"=>"success PUT"
        );
    }
    /* PETICIÓN DELETE */
    else if(count($routesArray)>=3 &&
            isset($_SERVER["REQUEST_METHOD"]) &&
            $_SERVER["REQUEST_METHOD"]=="DELETE")
    {
        $json = array(
            'status'=>200,
            "result"=>"success DELETE"
        );
    }
    /*
    print_r($domain);
    echo '<pre>';
    print_r($routesArray[3]);
    echo '</pre>';
    echo json_encode($json);
    */
    return;
}

?>