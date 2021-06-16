-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema rimbu-mvc
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema rimbu-mvc
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `rimbu-mvc` DEFAULT CHARACTER SET utf8 ;
USE `rimbu-mvc` ;

-- -----------------------------------------------------
-- Table `rimbu-mvc`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `img_perfil_usuario` VARCHAR(255) NULL,
  `nombre_usuario` VARCHAR(255) NOT NULL DEFAULT 'nombre_usuario',
  `apellido_usuario` VARCHAR(255) NOT NULL DEFAULT 'apellido_usuario',
  `username_usuario` VARCHAR(255) NOT NULL,
  `password_usuario` VARCHAR(255) NOT NULL DEFAULT '',
  `email_usuario` VARCHAR(255) NOT NULL,
  `telefono_usuario` VARCHAR(255) NOT NULL DEFAULT '+56988888888',
  `token_usuario` VARCHAR(255) NULL,
  `method_usuario` VARCHAR(255) NULL,
  `deseos_usuario` INT NULL,
  `fecha_creacion_usuario` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion_usuario` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`),
  UNIQUE INDEX `username_usuario_UNIQUE` (`username_usuario` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`estado_producto_servicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`estado_producto_servicio` (
  `id_estado_producto_servicio` INT NOT NULL AUTO_INCREMENT,
  `nombre_estado_producto_servicio` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_estado_producto_servicio`, `nombre_estado_producto_servicio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`tienda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`tienda` (
  `id_tienda` INT NOT NULL AUTO_INCREMENT,
  `nombre_tienda` VARCHAR(255) NOT NULL,
  `url_tienda` VARCHAR(255) NOT NULL,
  `logo_tienda` VARCHAR(255) NULL DEFAULT 'logo_tienda_default.jpg',
  `cover_tienda` VARCHAR(255) NULL DEFAULT NULL,
  `abstract_tienda` VARCHAR(255) NOT NULL DEFAULT 'Abstract de tienda',
  `descripcion_tienda` VARCHAR(255) NOT NULL DEFAULT 'Descripción de tienda',
  `email_tienda` VARCHAR(255) NOT NULL,
  `telefono_tienda` VARCHAR(255) NOT NULL DEFAULT '+56988888888',
  `cantidad_productos_tienda` INT NOT NULL DEFAULT 0,
  `social_tienda` VARCHAR(255) NULL DEFAULT NULL,
  `fecha_creacion_tienda` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion_tienda` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_id_tienda` INT NOT NULL,
  PRIMARY KEY (`id_tienda`),
  INDEX `fk_tienda_usuario1_idx` (`usuario_id_tienda` ASC),
  UNIQUE INDEX `url_tienda_UNIQUE` (`url_tienda` ASC),
  CONSTRAINT `fk_tienda_usuario1`
    FOREIGN KEY (`usuario_id_tienda`)
    REFERENCES `rimbu-mvc`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`producto` (
  `id_producto` INT NOT NULL AUTO_INCREMENT,
  `valoracion_producto` INT NOT NULL DEFAULT 0,
  `estado_producto_servicio_id_producto` INT NOT NULL DEFAULT 1,
  `tienda_id_producto` INT NOT NULL DEFAULT 0,
  `titulo_lista_producto` VARCHAR(255) NULL DEFAULT NULL,
  `nombre_producto` VARCHAR(255) NOT NULL DEFAULT 'Producto sin nombre',
  `url_producto` VARCHAR(255) NOT NULL,
  `img_producto` VARCHAR(255) NOT NULL DEFAULT 'img_subcategoria_producto_default.jpg',
  `costo_producto` DECIMAL(10,2) NOT NULL DEFAULT 0,
  `precio_producto` DECIMAL(10,2) NOT NULL DEFAULT 0,
  `existencia_producto` INT NOT NULL DEFAULT 0,
  `oferta_producto` DECIMAL(9,2) NULL DEFAULT NULL,
  `descripcion_producto` VARCHAR(255) NOT NULL DEFAULT 'Producto sin descripción',
  `reumen_producto` VARCHAR(255) NOT NULL DEFAULT 'Producto sin resumen',
  `detalles_producto` VARCHAR(255) NOT NULL DEFAULT 'Producto sin detalles',
  `especificaciones_producto` VARCHAR(255) NOT NULL DEFAULT 'Producto sin especificaciones',
  `galeria_producto` VARCHAR(255) NULL DEFAULT NULL,
  `video_producto` VARCHAR(255) NULL DEFAULT NULL,
  `top_banner_producto` VARCHAR(255) NULL DEFAULT NULL,
  `default_banner_producto` VARCHAR(255) NULL DEFAULT NULL,
  `horizontal_slider_producto` VARCHAR(255) NULL DEFAULT NULL,
  `vertical_slider_producto` VARCHAR(255) NULL DEFAULT NULL,
  `reviews_producto` VARCHAR(255) NULL DEFAULT NULL,
  `tags_producto` VARCHAR(255) NULL DEFAULT NULL,
  `codigo_producto` VARCHAR(255) NULL DEFAULT NULL,
  `marca_producto` VARCHAR(255) NULL DEFAULT NULL,
  `ventas_producto` INT NOT NULL DEFAULT 0,
  `vistas_producto` INT NOT NULL DEFAULT 0,
  `fecha_creacion_producto` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion_producto` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_producto`),
  INDEX `codigo` (`codigo_producto` ASC),
  INDEX `fk_producto_estado_producto_servicio1_idx` (`estado_producto_servicio_id_producto` ASC),
  INDEX `fk_producto_tienda1_idx` (`tienda_id_producto` ASC),
  CONSTRAINT `fk_producto_estado_producto_servicio1`
    FOREIGN KEY (`estado_producto_servicio_id_producto`)
    REFERENCES `rimbu-mvc`.`estado_producto_servicio` (`id_estado_producto_servicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_tienda1`
    FOREIGN KEY (`tienda_id_producto`)
    REFERENCES `rimbu-mvc`.`tienda` (`id_tienda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`rol` (
  `id_rol` INT NOT NULL AUTO_INCREMENT,
  `nombre_rol` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_rol`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`modulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`modulo` (
  `id_modulo` INT NOT NULL AUTO_INCREMENT,
  `nombre_modulo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_modulo`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre_modulo` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`operacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`operacion` (
  `id_operacion` INT NOT NULL AUTO_INCREMENT,
  `nombre_operacion` VARCHAR(255) NOT NULL,
  `modulo_id_operacion` INT NOT NULL,
  PRIMARY KEY (`id_operacion`),
  INDEX `fk_operacion_modulo1_idx` (`modulo_id_operacion` ASC),
  CONSTRAINT `fk_operacion_modulo1`
    FOREIGN KEY (`modulo_id_operacion`)
    REFERENCES `rimbu-mvc`.`modulo` (`id_modulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`perfil` (
  `id_perfil` INT NOT NULL AUTO_INCREMENT,
  `rol_id_perfil` INT NOT NULL,
  `operacion_id_perfil` INT NOT NULL,
  PRIMARY KEY (`id_perfil`),
  INDEX `fk_perfil_rol1_idx` (`rol_id_perfil` ASC),
  INDEX `fk_perfil_operacion1_idx` (`operacion_id_perfil` ASC),
  CONSTRAINT `fk_perfil_rol1`
    FOREIGN KEY (`rol_id_perfil`)
    REFERENCES `rimbu-mvc`.`rol` (`id_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_perfil_operacion1`
    FOREIGN KEY (`operacion_id_perfil`)
    REFERENCES `rimbu-mvc`.`operacion` (`id_operacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`metodo_pago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`metodo_pago` (
  `id_metodo_pago` INT NOT NULL AUTO_INCREMENT,
  `nombre_metodo_pago` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_metodo_pago`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`orden_venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`orden_venta` (
  `id_orden_venta` INT NOT NULL AUTO_INCREMENT,
  `precio_total_orden_venta` DECIMAL(9,2) NOT NULL DEFAULT 0,
  `proceso_orden_venta` VARCHAR(255) NOT NULL DEFAULT 'Proceso de la orden',
  `fecha_creacion_orden_venta` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion_orden_venta` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_id_orden_venta` INT NOT NULL,
  PRIMARY KEY (`id_orden_venta`),
  INDEX `fk_orden_venta_usuario1_idx` (`usuario_id_usuario` ASC),
  CONSTRAINT `fk_orden_venta_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `rimbu-mvc`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`orden_estado_producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`orden_estado_producto` (
  `id_orden_estado_producto` INT NOT NULL AUTO_INCREMENT,
  `nombre_orden_estado_producto` VARCHAR(255) NOT NULL,
  `ubicacion_orden_estado_producto` VARCHAR(255) NULL DEFAULT 'Ubicación de la orden',
  `descripcion_orden_estado_producto` VARCHAR(200) NOT NULL DEFAULT 'Descripción del estado de orden',
  PRIMARY KEY (`id_orden_estado_producto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`orden_detalle_producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`orden_detalle_producto` (
  `id_orden_detalle_producto` INT NOT NULL AUTO_INCREMENT,
  `cantidad_orden_detalle_producto` INT NOT NULL DEFAULT 1,
  `precio_orden_detalle_producto` DECIMAL(10,2) NOT NULL DEFAULT 0,
  `orden_id_orden_detalle_producto` INT NOT NULL,
  `producto_id_orden_detalle_producto` INT NOT NULL,
  `tienda_id_tienda` INT NOT NULL,
  `orden_estado_producto_id_orden_estado_producto` INT NOT NULL,
  PRIMARY KEY (`id_orden_detalle_producto`),
  INDEX `fk_orden_detalle_orden1_idx` (`orden_id_orden_detalle_producto` ASC),
  INDEX `fk_orden_detalle_producto_producto1_idx` (`producto_id_orden_detalle_producto` ASC),
  INDEX `fk_orden_detalle_producto_tienda1_idx` (`tienda_id_tienda` ASC),
  INDEX `fk_orden_detalle_producto_orden_estado_producto1_idx` (`orden_estado_producto_id_orden_estado_producto` ASC),
  CONSTRAINT `fk_orden_detalle_orden1`
    FOREIGN KEY (`orden_id_orden_detalle_producto`)
    REFERENCES `rimbu-mvc`.`orden_venta` (`id_orden_venta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orden_detalle_producto_producto1`
    FOREIGN KEY (`producto_id_orden_detalle_producto`)
    REFERENCES `rimbu-mvc`.`producto` (`id_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orden_detalle_producto_tienda1`
    FOREIGN KEY (`tienda_id_tienda`)
    REFERENCES `rimbu-mvc`.`tienda` (`id_tienda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orden_detalle_producto_orden_estado_producto1`
    FOREIGN KEY (`orden_estado_producto_id_orden_estado_producto`)
    REFERENCES `rimbu-mvc`.`orden_estado_producto` (`id_orden_estado_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`categoria_producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`categoria_producto` (
  `id_categoria_producto` INT NOT NULL AUTO_INCREMENT,
  `nombre_categoria_producto` VARCHAR(255) NOT NULL,
  `titulo_lista_categoria_producto` VARCHAR(255) NULL DEFAULT NULL,
  `url_categoria_producto` VARCHAR(255) NOT NULL,
  `img_categoria_producto` VARCHAR(255) NOT NULL DEFAULT 'img_categoria_producto_default.jpg',
  `icon_categoria_producto` VARCHAR(255) NULL DEFAULT NULL,
  `vistas_categoria_producto` INT NOT NULL DEFAULT 0,
  `fecha_creacion_categoria_producto` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion_categoria_producto` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_categoria_producto`),
  UNIQUE INDEX `url_categoria_producto_UNIQUE` (`url_categoria_producto` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`taller_mecanico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`taller_mecanico` (
  `id_taller_mecanico` INT NOT NULL AUTO_INCREMENT,
  `nombre_taller_mecanico` VARCHAR(255) NOT NULL,
  `url_taller_mecanico` VARCHAR(255) NOT NULL,
  `logo_taller_mecanico` VARCHAR(255) NULL DEFAULT 'logo_taller_mecanico_default.jpg',
  `cover_taller_mecanico` VARCHAR(255) NULL DEFAULT NULL,
  `abstract_taller_mecanico` VARCHAR(255) NULL DEFAULT 'Taller mecánico sin abstract',
  `descripcion_taller_mecanico` VARCHAR(255) NULL DEFAULT 'Taller mecánico sin descripccion',
  `email_taller_mecanico` VARCHAR(255) NOT NULL,
  `telefono_taller_mecanico` VARCHAR(255) NULL DEFAULT '+56988888888',
  `social_taller_mecanico` VARCHAR(255) NULL DEFAULT NULL,
  `usuario_id_taller_mecanico` INT NOT NULL,
  PRIMARY KEY (`id_taller_mecanico`),
  INDEX `fk_taller_mecanico_usuario1_idx` (`usuario_id_taller_mecanico` ASC),
  UNIQUE INDEX `url_taller_mecanico_UNIQUE` (`url_taller_mecanico` ASC),
  CONSTRAINT `fk_taller_mecanico_usuario1`
    FOREIGN KEY (`usuario_id_taller_mecanico`)
    REFERENCES `rimbu-mvc`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`servicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`servicio` (
  `id_servicio` INT NOT NULL AUTO_INCREMENT,
  `valoracion_servicio` INT NOT NULL DEFAULT 0,
  `estado_producto_servicio_id_servicio` INT NOT NULL DEFAULT 1,
  `taller_mecanico_id_servicio` INT NOT NULL DEFAULT 0,
  `titulo_lista_servicio` VARCHAR(255) NULL DEFAULT NULL,
  `nombre_servicio` VARCHAR(255) NOT NULL DEFAULT 'Servicio sin titulo',
  `url_servicio` VARCHAR(255) NULL DEFAULT NULL,
  `img_servicio` VARCHAR(255) NOT NULL DEFAULT 'img_servicio_default.jpg',
  `precio_servicio` DECIMAL(10,2) NOT NULL DEFAULT 0,
  `oferta_servicio` DECIMAL(9,2) NULL DEFAULT NULL,
  `descripcion_servicio` VARCHAR(255) NOT NULL DEFAULT 'Servicio sin descripción',
  `reumen_servicio` VARCHAR(255) NOT NULL DEFAULT 'Producto sin resumen',
  `detalles_servicio` VARCHAR(255) NOT NULL DEFAULT 'Servicio sin detalles',
  `especificaciones_servicio` VARCHAR(255) NOT NULL DEFAULT 'Servicio sin especificaciones',
  `galeria_servicio` VARCHAR(255) NULL DEFAULT NULL,
  `video_servicio` VARCHAR(255) NULL DEFAULT NULL,
  `top_banner_servicio` VARCHAR(255) NULL DEFAULT NULL,
  `default_banner_servicio` VARCHAR(255) NULL DEFAULT NULL,
  `horizontal_slider_servicio` VARCHAR(255) NULL DEFAULT NULL,
  `vertical_slider_servicio` VARCHAR(255) NULL DEFAULT NULL,
  `reviews_servicio` VARCHAR(255) NULL DEFAULT NULL,
  `tags_servicio` VARCHAR(255) NULL DEFAULT NULL,
  `codigo_servicio` VARCHAR(255) NULL DEFAULT NULL,
  `ventas_servicio` INT NOT NULL DEFAULT 0,
  `vistas_servicio` INT NOT NULL DEFAULT 0,
  `fecha_creacion_servicio` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion_servicio` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_servicio`),
  INDEX `fk_servicio_taller_mecanico1_idx` (`taller_mecanico_id_servicio` ASC),
  INDEX `fk_servicio_estado_producto_servicio1_idx` (`estado_producto_servicio_id_servicio` ASC),
  CONSTRAINT `fk_servicio_taller_mecanico1`
    FOREIGN KEY (`taller_mecanico_id_servicio`)
    REFERENCES `rimbu-mvc`.`taller_mecanico` (`id_taller_mecanico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicio_estado_producto_servicio1`
    FOREIGN KEY (`estado_producto_servicio_id_servicio`)
    REFERENCES `rimbu-mvc`.`estado_producto_servicio` (`id_estado_producto_servicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`region`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`region` (
  `numeracion_region` SMALLINT(2) NOT NULL,
  `nombre_region` VARCHAR(255) NOT NULL,
  `abreviacion_region` CHAR(3) NOT NULL,
  `capital_region` VARCHAR(255) NULL DEFAULT NULL,
  `fecha_creacion_region` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion_region` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`numeracion_region`),
  UNIQUE INDEX `abreviacion_region_UNIQUE` (`abreviacion_region` ASC),
  UNIQUE INDEX `nombre_region_UNIQUE` (`nombre_region` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`comuna`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`comuna` (
  `id_comuna` INT NOT NULL AUTO_INCREMENT,
  `nombre_comuna` VARCHAR(255) NOT NULL,
  `fecha_creacion_comuna` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion_comuna` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `region_numeracion_comuna` SMALLINT(2) NOT NULL,
  PRIMARY KEY (`id_comuna`, `nombre_comuna`, `region_numeracion_comuna`),
  INDEX `fk_comuna_region1_idx` (`region_numeracion_comuna` ASC),
  CONSTRAINT `fk_comuna_region1`
    FOREIGN KEY (`region_numeracion_comuna`)
    REFERENCES `rimbu-mvc`.`region` (`numeracion_region`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`direccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`direccion` (
  `id_direccion` INT NOT NULL AUTO_INCREMENT,
  `x_direccion` VARCHAR(255) NULL,
  `y_direccion` VARCHAR(255) NULL,
  `calle_direccion` VARCHAR(255) NULL,
  `region_direccion` VARCHAR(255) NULL,
  `ciudad_direccion` VARCHAR(255) NULL,
  `numeracion_1_direccion` VARCHAR(255) NULL,
  `numeracion_2_direccion` VARCHAR(255) NULL,
  `descripcion_direccion` VARCHAR(255) NULL,
  `usuario_id_usuario` INT NOT NULL,
  `comuna_id_direccion` INT NOT NULL,
  `comuna_nombre_direccion` VARCHAR(255) NOT NULL,
  `region_numeracion_direccion` SMALLINT(2) NOT NULL,
  PRIMARY KEY (`id_direccion`, `comuna_id_direccion`, `comuna_nombre_direccion`, `region_numeracion_direccion`),
  INDEX `fk_direccion_usuario1_idx` (`usuario_id_usuario` ASC),
  INDEX `fk_direccion_comuna1_idx` (`comuna_id_direccion` ASC, `comuna_nombre_direccion` ASC, `region_numeracion_direccion` ASC),
  CONSTRAINT `fk_direccion_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `rimbu-mvc`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_comuna1`
    FOREIGN KEY (`comuna_id_direccion` , `comuna_nombre_direccion` , `region_numeracion_direccion`)
    REFERENCES `rimbu-mvc`.`comuna` (`id_comuna` , `nombre_comuna` , `region_numeracion_comuna`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`subcategoria_producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`subcategoria_producto` (
  `id_subcategoria_producto` INT NOT NULL AUTO_INCREMENT,
  `titulo_lista_subcategoria_producto` VARCHAR(255) NULL DEFAULT NULL,
  `nombre_subcategoria_producto` VARCHAR(255) NOT NULL,
  `url_subcategoria_producto` VARCHAR(255) NOT NULL,
  `img_subcategoria_producto` VARCHAR(255) NOT NULL DEFAULT 'img_subcategoria_producto_default.jpg',
  `vistas_subcategoria_producto` INT NOT NULL DEFAULT 0,
  `fecha_creacion_subcategoria_producto` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion_subcategoria_producto` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_subcategoria_producto`),
  UNIQUE INDEX `url_subcategoria_producto_UNIQUE` (`url_subcategoria_producto` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`categoria_servicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`categoria_servicio` (
  `id_categoria_servicio` INT NOT NULL AUTO_INCREMENT,
  `nombre_categoria_servicio` VARCHAR(255) NOT NULL,
  `titulo_lista_categoria_servicio` VARCHAR(255) NULL DEFAULT NULL,
  `url_categoria_servicio` VARCHAR(255) NOT NULL,
  `img_categoria_servicio` VARCHAR(255) NOT NULL DEFAULT 'img_categoria_servicio_default.jpg',
  `icon_categoria_servicio` VARCHAR(255) NULL DEFAULT NULL,
  `vistas_categoria_servicio` INT NOT NULL DEFAULT 0,
  `fecha_creacion_categoria_servicio` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion_categoria_servicio` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_categoria_servicio`),
  UNIQUE INDEX `url_categoria_servicio_UNIQUE` (`url_categoria_servicio` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`subcategoria_servicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`subcategoria_servicio` (
  `id_subcategoria_servicio` INT NOT NULL AUTO_INCREMENT,
  `titulo_lista_subcategoria_servicio` VARCHAR(255) NULL DEFAULT NULL,
  `nombre_subcategoria_servicio` VARCHAR(255) NOT NULL,
  `url_subcategoria_servicio` VARCHAR(255) NOT NULL,
  `img_subcategoria_servicio` VARCHAR(255) NOT NULL DEFAULT 'img_subcategoria_servicio_default.jpg',
  `vistas_subcategoria_servicio` INT NOT NULL DEFAULT 0,
  `fecha_creacion_subcategoria_servicio` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion_subcategoria_servicio` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_subcategoria_servicio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`orden_estado_servicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`orden_estado_servicio` (
  `id_orden_estado_producto` INT NOT NULL AUTO_INCREMENT,
  `nombre_orden_estado_producto` VARCHAR(255) NOT NULL,
  `ubicacion_orden_estado_producto` VARCHAR(255) NULL DEFAULT 'Ubicación de la orden',
  `descripcion_orden_estado_producto` VARCHAR(200) NOT NULL DEFAULT 'Descripción del estado de orden',
  PRIMARY KEY (`id_orden_estado_producto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`orden_detalle_servicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`orden_detalle_servicio` (
  `id_orden_detalle_servicio` INT NOT NULL AUTO_INCREMENT,
  `precio_orden_detalle_servicio` DECIMAL(10,2) NULL DEFAULT 0,
  `servicio_id_orden_detalle_servicio` INT NOT NULL,
  `orden_estado_servicio_id_orden_detalle_servicio` INT NOT NULL,
  `orden_venta_id_orden_detalle_servicio` INT NOT NULL,
  `taller_mecanico_id_orden_detalle_servicio` INT NOT NULL,
  PRIMARY KEY (`id_orden_detalle_servicio`),
  INDEX `fk_orden_detalle_servicio_servicio1_idx` (`servicio_id_orden_detalle_servicio` ASC),
  INDEX `fk_orden_detalle_servicio_orden_estado_servicio1_idx` (`orden_estado_servicio_id_orden_detalle_servicio` ASC),
  INDEX `fk_orden_detalle_servicio_orden_venta1_idx` (`orden_venta_id_orden_detalle_servicio` ASC),
  INDEX `fk_orden_detalle_servicio_taller_mecanico1_idx` (`taller_mecanico_id_orden_detalle_servicio` ASC),
  CONSTRAINT `fk_orden_detalle_servicio_servicio1`
    FOREIGN KEY (`servicio_id_orden_detalle_servicio`)
    REFERENCES `rimbu-mvc`.`servicio` (`id_servicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orden_detalle_servicio_orden_estado_servicio1`
    FOREIGN KEY (`orden_estado_servicio_id_orden_detalle_servicio`)
    REFERENCES `rimbu-mvc`.`orden_estado_servicio` (`id_orden_estado_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orden_detalle_servicio_orden_venta1`
    FOREIGN KEY (`orden_venta_id_orden_detalle_servicio`)
    REFERENCES `rimbu-mvc`.`orden_venta` (`id_orden_venta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orden_detalle_servicio_taller_mecanico1`
    FOREIGN KEY (`taller_mecanico_id_orden_detalle_servicio`)
    REFERENCES `rimbu-mvc`.`taller_mecanico` (`id_taller_mecanico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`venta` (
  `id_venta` INT NOT NULL,
  `precio_unitario_venta` DECIMAL(9,2) NOT NULL DEFAULT 0,
  `comision_venta_venta` DECIMAL(9,2) NOT NULL DEFAULT 0,
  `codigo_pago_venta` VARCHAR(255) NOT NULL DEFAULT '',
  `estado_venta_venta` VARCHAR(255) NOT NULL DEFAULT 'en proceso',
  `fecha_creacion_venta` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion_venta` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `orden_id_venta` INT NOT NULL,
  `metodo_pago_id_venta` INT NOT NULL,
  PRIMARY KEY (`id_venta`),
  INDEX `fk_ventas_orden1_idx` (`orden_id_venta` ASC),
  INDEX `fk_ventas_metodo_pago1_idx` (`metodo_pago_id_venta` ASC),
  CONSTRAINT `fk_ventas_orden1`
    FOREIGN KEY (`orden_id_venta`)
    REFERENCES `rimbu-mvc`.`orden_venta` (`id_orden_venta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_metodo_pago1`
    FOREIGN KEY (`metodo_pago_id_venta`)
    REFERENCES `rimbu-mvc`.`metodo_pago` (`id_metodo_pago`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`categoria_producto_has_subcategoria_producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`categoria_producto_has_subcategoria_producto` (
  `id_categoria_producto` INT NOT NULL,
  `id_subcategoria_producto` INT NOT NULL,
  PRIMARY KEY (`id_categoria_producto`, `id_subcategoria_producto`),
  INDEX `fk_categoria_producto_has_subcategoria_producto_subcategori_idx` (`id_subcategoria_producto` ASC),
  INDEX `fk_categoria_producto_has_subcategoria_producto_categoria_p_idx` (`id_categoria_producto` ASC),
  CONSTRAINT `fk_categoria_producto_has_subcategoria_producto_categoria_pro1`
    FOREIGN KEY (`id_categoria_producto`)
    REFERENCES `rimbu-mvc`.`categoria_producto` (`id_categoria_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_categoria_producto_has_subcategoria_producto_subcategoria_1`
    FOREIGN KEY (`id_subcategoria_producto`)
    REFERENCES `rimbu-mvc`.`subcategoria_producto` (`id_subcategoria_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`producto_has_subcategoria_producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`producto_has_subcategoria_producto` (
  `producto_id` INT NOT NULL,
  `subcategoria_producto_id` INT NOT NULL,
  PRIMARY KEY (`producto_id`, `subcategoria_producto_id`),
  INDEX `fk_producto_has_subcategoria_producto_subcategoria_producto_idx` (`subcategoria_producto_id` ASC),
  INDEX `fk_producto_has_subcategoria_producto_producto1_idx` (`producto_id` ASC),
  CONSTRAINT `fk_producto_has_subcategoria_producto_producto1`
    FOREIGN KEY (`producto_id`)
    REFERENCES `rimbu-mvc`.`producto` (`id_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_has_subcategoria_producto_subcategoria_producto1`
    FOREIGN KEY (`subcategoria_producto_id`)
    REFERENCES `rimbu-mvc`.`subcategoria_producto` (`id_subcategoria_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`categoria_servicio_has_subcategoria_servicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`categoria_servicio_has_subcategoria_servicio` (
  `categoria_servicio_id` INT NOT NULL,
  `subcategoria_servicio_id` INT NOT NULL,
  PRIMARY KEY (`categoria_servicio_id`, `subcategoria_servicio_id`),
  INDEX `fk_categoria_servicio_has_subcategoria_servicio_subcategori_idx` (`subcategoria_servicio_id` ASC),
  INDEX `fk_categoria_servicio_has_subcategoria_servicio_categoria_s_idx` (`categoria_servicio_id` ASC),
  CONSTRAINT `fk_categoria_servicio_has_subcategoria_servicio_categoria_ser1`
    FOREIGN KEY (`categoria_servicio_id`)
    REFERENCES `rimbu-mvc`.`categoria_servicio` (`id_categoria_servicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_categoria_servicio_has_subcategoria_servicio_subcategoria_1`
    FOREIGN KEY (`subcategoria_servicio_id`)
    REFERENCES `rimbu-mvc`.`subcategoria_servicio` (`id_subcategoria_servicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`servicio_has_subcategoria_servicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`servicio_has_subcategoria_servicio` (
  `servicio_id` INT NOT NULL,
  `subcategoria_servicio_id` INT NOT NULL,
  PRIMARY KEY (`servicio_id`, `subcategoria_servicio_id`),
  INDEX `fk_servicio_has_subcategoria_servicio_subcategoria_servicio_idx` (`subcategoria_servicio_id` ASC),
  INDEX `fk_servicio_has_subcategoria_servicio_servicio1_idx` (`servicio_id` ASC),
  CONSTRAINT `fk_servicio_has_subcategoria_servicio_servicio1`
    FOREIGN KEY (`servicio_id`)
    REFERENCES `rimbu-mvc`.`servicio` (`id_servicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicio_has_subcategoria_servicio_subcategoria_servicio1`
    FOREIGN KEY (`subcategoria_servicio_id`)
    REFERENCES `rimbu-mvc`.`subcategoria_servicio` (`id_subcategoria_servicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`vehiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`vehiculo` (
  `id_vehiculo` INT NOT NULL AUTO_INCREMENT,
  `data_vehiculo` VARCHAR(255) NULL DEFAULT NULL,
  `usuario_id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_vehiculo`),
  INDEX `fk_vehiculo_usuario1_idx` (`usuario_id_usuario` ASC),
  CONSTRAINT `fk_vehiculo_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `rimbu-mvc`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`match`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`match` (
  `subcategoria_producto_id_match` INT NOT NULL,
  `subcategoria_servicio_id_match` INT NOT NULL,
  `vehiculo_id_match_producto_subcategoria_servicio` INT NOT NULL,
  PRIMARY KEY (`subcategoria_producto_id_match`, `subcategoria_servicio_id_match`),
  INDEX `fk_subcategoria_producto_has_subcategoria_servicio_subcateg_idx` (`subcategoria_servicio_id_match` ASC),
  INDEX `fk_subcategoria_producto_has_subcategoria_servicio_subcateg_idx1` (`subcategoria_producto_id_match` ASC),
  INDEX `fk_match_vehicu_idx` (`vehiculo_id_match_producto_subcategoria_servicio` ASC),
  CONSTRAINT `fk_subcategoria_producto_has_subcategoria_servicio_subcategor1`
    FOREIGN KEY (`subcategoria_producto_id_match`)
    REFERENCES `rimbu-mvc`.`subcategoria_producto` (`id_subcategoria_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_subcategoria_producto_has_subcategoria_servicio_subcategor2`
    FOREIGN KEY (`subcategoria_servicio_id_match`)
    REFERENCES `rimbu-mvc`.`subcategoria_servicio` (`id_subcategoria_servicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_match_vehiculo1`
    FOREIGN KEY (`vehiculo_id_match_producto_subcategoria_servicio`)
    REFERENCES `rimbu-mvc`.`vehiculo` (`id_vehiculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rimbu-mvc`.`usuario_has_rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rimbu-mvc`.`usuario_has_rol` (
  `usuario_id_usuario` INT NOT NULL,
  `rol_id_rol` INT NOT NULL,
  PRIMARY KEY (`usuario_id_usuario`, `rol_id_rol`),
  INDEX `fk_usuario_has_rol_rol1_idx` (`rol_id_rol` ASC),
  INDEX `fk_usuario_has_rol_usuario1_idx` (`usuario_id_usuario` ASC),
  CONSTRAINT `fk_usuario_has_rol_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `rimbu-mvc`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_rol_rol1`
    FOREIGN KEY (`rol_id_rol`)
    REFERENCES `rimbu-mvc`.`rol` (`id_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
