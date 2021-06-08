INSERT INTO `rol` (`id`, `nombre`)
VALUES  ('0', 'admin'), 
        ('1', 'proveedor'), 
        ('2', 'mecánico'), 
        ('3', 'cliente'), 
        ('4', 'repartidor');

INSERT INTO `categoria_servicio` (`id`, `nombre`, `img`, `url`, `icon`, `titulo_lista`, `vistas`, `fecha_creacion`, `fecha_modificacion`) 
VALUES  ('0', 'Otros servicios', 'otros-servicios.jpg', 'otros-servicios', 'otros-servicios', NULL, '0', current_timestamp(), current_timestamp()),
        ('1', 'Mecánica general', 'mecanica-general.jpg', 'mecanica-general', 'mecanica-general', NULL, '0', current_timestamp(), current_timestamp()),
        ('2', 'Eéctricos', 'electricos.jpg', 'electricos', 'electricos', NULL, '0', current_timestamp(), current_timestamp()),
        ('3', 'Lucricentros', 'lubricentros.jpg', 'lubricentros', 'lubricentros', NULL, '0', current_timestamp(), current_timestamp()),
        ('4', 'Frenos', 'frenos.jpg', 'frenos', 'frenos', NULL, '0', current_timestamp(), current_timestamp()),
        ('5', 'Vulcanización', 'vulcanizacion.jpg', 'vulcanizacion', 'vulcanizacion', NULL, '0', current_timestamp(), current_timestamp()),
        ('6', 'Alineación y balanceo', 'alimentacion-balanceo.jpg', 'alimentacion-balanceo', 'alimentacion-balanceo', NULL, '0', current_timestamp(), current_timestamp()),
        ('7', 'Electrónicos', 'electronicos.jpg', 'electronicos', 'electronicos', NULL, '0', current_timestamp(), current_timestamp()),
        ('8', 'Pintura y carrocería', 'pintura-carroceria.jpg', 'pintura-carroceria', 'pintura-carroceria', NULL, '0', current_timestamp(), current_timestamp()),
        ('9', 'Mecánico Diesel', 'mecanico-diesel.jpg', 'mecanico-diesel', 'mecanico-diesel', NULL, '0', current_timestamp(), current_timestamp()),
        ('10', 'Desabolladura', 'desabolladura.jpg', 'desabolladura', 'desabolladura', NULL, '0', current_timestamp(), current_timestamp()),
        ('11', 'Lavado', 'lavado.jpg', 'lavado', 'lavado', NULL, '0', current_timestamp(), current_timestamp()),
        ('12', 'Limpieza y tapicería', 'limpieza-tapizeria.jpg', 'limpieza-tapizeria', 'limpieza-tapizeria', NULL, '0', current_timestamp(), current_timestamp());

INSERT INTO `categoria_producto` (`id`, `nombre`, `img`, `url`, `icon`, `titulo_lista`, `vistas`, `fecha_creacion`, `fecha_modificacion`)
VALUES  ('0', 'Otros productos', 'otros-productos.jpg', 'otros-productos', NULL, NULL, '0', current_timestamp(), current_timestamp()),
        ('1', 'Motor', 'motor.jpg', 'motor', NULL, NULL, '0', current_timestamp(), current_timestamp()),
        ('2', 'Freno', 'freno.jpg', 'freno', NULL, NULL, '0', current_timestamp(), current_timestamp()),
        ('3', 'Distribución', 'distribucion.jpg', 'distribucion', NULL, NULL, '0', current_timestamp(), current_timestamp()),
        ('4', 'Filtro', 'filtro.jpg', 'filtro', NULL, NULL, '0', current_timestamp(), current_timestamp()),
        ('5', 'Aceite', 'aceite.jpg', 'aceite', NULL, NULL, '0', current_timestamp(), current_timestamp()),
        ('6', 'Sistema de escape', 'sistema-escape.jpg', 'sistema-escape', NULL, NULL, '0', current_timestamp(), current_timestamp()),
        ('7', 'Carrocería', 'carroceria.jpg', 'carroceria', NULL, NULL, '0', current_timestamp(), current_timestamp()),
        ('8', 'Suspensión', 'suspension.jpg', 'suspension', NULL, NULL, '0', current_timestamp(), current_timestamp()),
        ('9', 'Accesorios', 'accesorios.jpg', 'accesorios', NULL, NULL, '0', current_timestamp(), current_timestamp()),
        ('10', 'Refrigeración', 'refrigeracion.jpg', 'refrigeracion', NULL, NULL, '0', current_timestamp(), current_timestamp()),
        ('11', 'Sensores', 'sensores.jpg', 'sensores', NULL, NULL, '0', current_timestamp(), current_timestamp());