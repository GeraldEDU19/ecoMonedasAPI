-- Active: 1697643633852@@127.0.0.1@3306

-- Elimina la base de datos si existe

DROP DATABASE IF EXISTS db_proyecto;

-- Crea la base de datos

CREATE DATABASE db_proyecto;

-- Usa la base de datos

USE db_proyecto;

-- Crear la tabla Roles

CREATE TABLE
    Roles (
        ID INT AUTO_INCREMENT PRIMARY KEY,
        Nombre VARCHAR(50) NOT NULL UNIQUE
    );

CREATE TABLE
    Usuarios (
        ID INT AUTO_INCREMENT PRIMARY KEY,
        CorreoElectronico VARCHAR(255) NOT NULL UNIQUE,
        PrimerNombre VARCHAR(255) NOT NULL,
        SegundoNombre VARCHAR(255) NOT NULL,
        PrimerApellido VARCHAR(255) NOT NULL,
        SegundoApellido VARCHAR(255) NOT NULL,
        Identificacion VARCHAR(20),
        DireccionProvincia VARCHAR(50),
        DireccionCanton VARCHAR(50),
        DireccionDistrito VARCHAR(50),
        Telefono VARCHAR(20),
        Contraseña VARCHAR(255) NOT NULL,
        RolId INT,
        FOREIGN KEY (RolId) REFERENCES Roles(ID)
    );

-- Crear la tabla CentrosDeAcopio

CREATE TABLE CentrosDeAcopio (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(255) NOT NULL,
    DireccionProvincia VARCHAR(50),
    DireccionCanton VARCHAR(50),
    DireccionDistrito VARCHAR(50),
    DireccionExacta VARCHAR(255) NOT NULL,
    Telefono VARCHAR(20),
    HorarioAtencion VARCHAR(255),
    AdministradorID INT UNIQUE,
    FOREIGN KEY (AdministradorID) REFERENCES Usuarios(ID)
);

-- -- Crear la tabla Materiales

CREATE TABLE Materiales (

    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(255) NOT NULL,
    Tipo VARCHAR(255) NOT NULL,
    Descripcion TEXT,
    Imagen VARCHAR(255),
    UnidadMedida VARCHAR(50),
    Color VARCHAR(20) UNIQUE,
    Precio DECIMAL(10, 2) NOT NULL

);

-- Crear la tabla MaterialesCentroAcopio para relacionar MaterialesReciclables y CentrosDeAcopio

CREATE TABLE MaterialesCentroAcopio (

    CentroDeAcopioID INT,

    MaterialID INT,

    PRIMARY KEY (CentroDeAcopioID, MaterialID),

    FOREIGN KEY (CentroDeAcopioID) REFERENCES CentrosDeAcopio(ID),

    FOREIGN KEY (MaterialID) REFERENCES Materiales(ID)

);

-- Crear la tabla CanjesMateriales

CREATE TABLE CanjesMateriales (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    ClienteID INT,
    CentroDeAcopioID INT,
    FechaCanje DATE,
    TotalEcoMonedas DECIMAL(10, 2),
    FOREIGN KEY (ClienteID) REFERENCES Usuarios(ID),
    FOREIGN KEY (CentroDeAcopioID) REFERENCES CentrosDeAcopio(ID)
);

-- Crear la tabla DetalleCanjeMateriales para registrar los materiales en cada canje

CREATE TABLE DetalleCanjesMateriales (
    CanjeID INT,
    MaterialID INT,
    Cantidad INT,
    SubTotalEcoMonedas DECIMAL(10, 2),
    FOREIGN KEY (CanjeID) REFERENCES CanjesMateriales(ID),
    FOREIGN KEY (MaterialID) REFERENCES Materiales(ID)
);





-- -- Crear la tabla CuponesCanje

-- CREATE TABLE CuponesCanje (

--     CuponID INT AUTO_INCREMENT PRIMARY KEY,

--     Nombre VARCHAR(255) NOT NULL,

--     Descripcion TEXT,

--     Imagen VARCHAR(255),

--     Categoria VARCHAR(50),

--     FechaInicioValidez DATE,

--     FechaFinValidez DATE,

--     EcoMonedasNecesarias DECIMAL(10, 2) NOT NULL

-- );

-- -- Crear la tabla CuponesCliente para registrar los cupones adquiridos por los clientes

-- CREATE TABLE CuponesCliente (

--     ClienteID INT,

--     CuponID INT,

--     QRCode VARCHAR(255), -- Puedes utilizar un campo VARCHAR para almacenar el QRCode

--     PRIMARY KEY (ClienteID, CuponID),

--     FOREIGN KEY (ClienteID) REFERENCES Usuarios(UsuarioID),

--     FOREIGN KEY (CuponID) REFERENCES CuponesCanje(CuponID)

-- );

-- -- Crear la tabla BilleteraVirtual para el seguimiento de las eco-monedas de los clientes

-- CREATE TABLE BilleteraVirtual (

--     ClienteID INT PRIMARY KEY,

--     EcoMonedasDisponibles DECIMAL(10, 2),

--     EcoMonedasCanjeadas DECIMAL(10, 2)

-- );

-- -- Crear la tabla HistorialCuponesCanjeados para el registro de cupones canjeados por los clientes

-- CREATE TABLE HistorialCuponesCanjeados (

--     ClienteID INT,

--     CuponID INT,

--     FechaCanje DATE,

--     -- Otras columnas relevantes para el historial

--     FOREIGN KEY (ClienteID) REFERENCES Usuarios(UsuarioID),

--     FOREIGN KEY (CuponID) REFERENCES CuponesCanje(CuponID)

-- )


