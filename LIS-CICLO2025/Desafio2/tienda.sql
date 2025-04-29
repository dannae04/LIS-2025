DROP DATABASE IF EXISTS mi_tienda;
CREATE DATABASE mi_tienda;
USE mi_tienda;

-- ======================================
-- Tablas para la aplicación
-- ======================================

-- Tabla: Categorias
CREATE TABLE categoria(
    categoria_id VARCHAR(10) NOT NULL PRIMARY KEY,
    nombre_categoria VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Tabla: Productos
CREATE TABLE productos (
    codigo_productos VARCHAR(10) NOT NULL UNIQUE PRIMARY KEY,
    -- Se valida que el código cumpla con el formato PROD##### usando una restricción CHECK (disponible en MySQL 8.0+)
    CHECK (codigo_productos REGEXP '^PROD[0-9]{5}$'),
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    imagen VARCHAR(255),
    categoria_id VARCHAR(10) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    existencias INT UNSIGNED NOT NULL DEFAULT 0,
    CONSTRAINT fk_productos_categoria FOREIGN KEY (categoria_id)
    REFERENCES categoria(categoria_id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Tabla: Usuarios
CREATE TABLE usuarios (
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    rol ENUM('administrador', 'empleado') NOT NULL,
    estado TINYINT(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Tabla: Clientes
CREATE TABLE clientes (
    codigo_cliente INT NOT NULL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    telefono VARCHAR(20),
    estado TINYINT(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Tabla: Ventas 
CREATE TABLE ventas (
    codigo_ventas VARCHAR(10) NOT NULL PRIMARY KEY,
    codigo_cliente INT NOT NULL,
    fecha DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10,2) NOT NULL,
    CONSTRAINT fk_ventas_cliente FOREIGN KEY (codigo_cliente)
    REFERENCES clientes(codigo_cliente) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Tabla: Detalle de Venta
CREATE TABLE detalle_venta (
    codigo_detalle VARCHAR(10) NOT NULL PRIMARY KEY,
    codigo_ventas VARCHAR(10) NOT NULL, 
    codigo_productos VARCHAR(10) NOT NULL,
    cantidad INT NOT NULL,
    nombre_producto VARCHAR(100) NOT NULL,
    descripcion_producto TEXT NOT NULL, 
    precio_unitario DECIMAL(10,2) NOT NULL,
    CONSTRAINT fk_detalle_venta_venta FOREIGN KEY (codigo_ventas)
    REFERENCES ventas(codigo_ventas) ON DELETE CASCADE,
    CONSTRAINT fk_detalle_venta_producto FOREIGN KEY (codigo_productos)
    REFERENCES productos(codigo_productos) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




