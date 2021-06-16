<?php
    Class GetController{

        /* Peticiones GET sin filtro */
        public function getData($table,$orderBy,$orderMode,$startAt,$endAt)
        {                
            $response   = GetModel::getData($table,$orderBy,$orderMode,$startAt,$endAt);
            $return     = new GetController();
            $return     ->functionResponse($response,$table,"getData");
            
        }
        /* Get con filtro */
        public function getFilterData($table,$linkTo,$equalTo,$orderBy,$orderMode,$startAt,$endAt)
        {
            $response = GetModel::getFilterData($table,$linkTo,$equalTo,$orderBy,$orderMode,$startAt,$endAt);
            $return = new GetController();
            $return -> functionResponse($response,$table,"getFilterData");
        }
        /* Peticiones GET etre tablas sin filtro */
        public function getRelData($rel, $type,$orderBy,$orderMode,$startAt,$endAt){
            $response = GetModel::getRelDataAux($rel,$type,$orderBy,$orderMode, $startAt,$endAt);
            $return = new GetController();
            $return -> functionResponse($response,$rel,"getRelDataAux");
        }
        /* Peticiones GET entre tablas con filtro */
        public function getRelFilterData($rel,$type,$linkTo,$equalTo,$orderBy,$orderMode,$startAt,$endAt)
        {
            $response = GetModel::getRelFilterDataAux($rel,$type, $linkTo, $equalTo,$orderBy,$orderMode, $startAt,$endAt);
            $return = new GetController();
            $return -> functionResponse($response,$rel,"getRelFilterDataAux");
        }
        /* Peticiones GET para el buscador */
        public function getSearchData($table,$linkTo,$search,$orderBy,$orderMode,$startAt,$endAt)
        {
            $response = GetModel::getSearchData($table,$linkTo,$search,$orderBy,$orderMode, $startAt,$endAt);
            $return = new GetController();
            $return -> functionResponse($response,$table,"getSearchData");
        }
        /* Respuestas del controlador */
        public function functionResponse($response,$table,$method)
        {
            if (!empty($response))
            {
                $json = array(
                    'status'    => 200,
                    "resultado" => "success GET ".$table,
                    'method'    => $method,
                    'Cantidad'  => count($response),
                    "elementos" => $response
                );
            }
            else{
                $json = array(
                    'status'    => 404,
                    "resultado" => "Not Found GET ".$table,
                    'method'    => $method
                );
            }            
            echo json_encode($json, http_response_code($json["status"]));
            return;

        }
    }
?>