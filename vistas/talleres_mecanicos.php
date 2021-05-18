<?php include_once('layout/component/head.php'); ?>
<?php include_once('layout/component/header.php'); ?>


<body class="contenedor">
    <div class="categoria-servicios">
        <ul class="servicios__lista">
            <li class="servicios__lista__elemento">
                <input type="checkbox" name="mecanica_general" id="mecanica_general" class="servicios__checkbox"> 
                <p class="servicios__p">Mecánica general</p>
            </li>
            <li class="servicios__lista__elemento">
                <input type="checkbox" name="electricos" id="electricos" class="servicios__checkbox"> 
                <p class="servicios__p">Eléctricos</p>
            </li>
            <li class="servicios__lista__elemento">
                <input type="checkbox" name="lubricentros" id="lubricentros" class="servicios__checkbox"> 
                <p class="servicios__p">Lubricentro</p>
            </li>
            <li class="servicios__lista__elemento">
                <input type="checkbox" name="vulcanizacion" id="vulcanizacion" class="servicios__checkbox"> 
                <p class="servicios__p">Vulcanización</p>
            </li>
            <li class="servicios__lista__elemento">
                <input type="checkbox" name="alineacion_balanceo" id="alineacion_balanceo" class="servicios__checkbox"> 
                <p class="servicios__p">Alineación y balanceo</p>
            </li>
            <li class="servicios__lista__elemento">
                <input type="checkbox" name="electronicos" id="electronicos" class="servicios__checkbox"> 
                <p class="servicios__p">Electrónicos</p>
            </li>
            <li class="servicios__lista__elemento">
                <input type="checkbox" name="pintura_carroceria" id="pintura_carroceria" class="servicios__checkbox"> 
                <p class="servicios__p">Pintura y carrocería</p>
            </li>
            <li class="servicios__lista__elemento">
                <input type="checkbox" name="mecanico_diesel" id="mecanico_diesel" class="servicios__checkbox"> 
                <p class="servicios__p">Mecánico diesel</p>
            </li>
            <li class="servicios__lista__elemento">
                <input type="checkbox" name="desabolladura" id="desabolladura" class="servicios__checkbox"> 
                <p class="servicios__p">Desabolladura</p>
            </li>
            <li class="servicios__lista__elemento">
                <input type="checkbox" name="lavado" id="lavado" class="servicios__checkbox"> 
                <p class="servicios__p">Lavado</p>
            </li>
            <li class="servicios__lista__elemento">
                <input type="checkbox" name="limpieza_tapizeria" id="limpieza_tapizeria" class="servicios__checkbox"> 
                <p class="servicios__p">Limpieza y tapizería</p>
            </li>
        </ul>
    </div>
    <div class="talleres-encontrados">TALLERES ENCONTRADOS</div>
    <div class="mapa" id="map">
        <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjSRkQlqgW3mhLV_0BUNKBnsZZ3wb_xUo&callback=initMap">
        </script>
        <script src="js/map.js"></script>
    </div>
    

</body>

<?php include_once('layout/component/footer.php'); ?>