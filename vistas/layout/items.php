<div class="producto">
    <input type="hidden" id="id" value="<?php echo $item['id'];  ?>">
    <div class="producto-imagen"><img src="img/default.png"/></div>
    <div class="producto-titulo"><?php echo $item['nombre'];  ?></div>
    <div class="producto-price"><?php echo $item['precio'];  ?> CLP</div>
    <div class="producto-botones">
        <button class='producto-btn-add'>Agregar al carrito</button>
    </div>
</div>