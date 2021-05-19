<div class="producto">
    <input type="hidden" id="id" value="<?php echo $item['id'];  ?>">
    <div class="producto__imagen-container">
        <img class="producto__imagen" src="img/default.png"/>
    </div>
    <div class="producto__titulo"><?php echo $item['nombre'];  ?></div>
    <div class="producto__precio"><?php echo $item['precio'];  ?> CLP</div>
    <div class="producto__boton">
        <button class='producto__boton__add'>Agregar al carrito</button>
    </div>
</div>