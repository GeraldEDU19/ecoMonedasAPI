-- Active: 1697643633852@@127.0.0.1@3306@db_proyecto

USE db_proyecto;
/* Inserts para las pruebas */



/**************************************/
/*ROLES*/

/* Insertar el rol "Administrador" */

INSERT INTO Roles (Nombre) VALUES ('Administrador');



/**************************************/
/*USUARIOS*/
INSERT INTO
    Usuarios (
        CorreoElectronico,
        PrimerNombre,
        SegundoNombre,
        PrimerApellido,
        SegundoApellido,
        Identificacion,
        DireccionProvincia,
        DireccionCanton,
        DireccionDistrito,
        Telefono,
        Contraseña,
        RolId
    )
VALUES (
        'admin@example.com',
        'Gerald',
        'Eduardo',
        'Chaves',
        'Gómez',
        '123456789',
        'Provincia1',
        'Canton1',
        'Distrito1',
        '123-456-7890',
        'password123',
        1
    );

    INSERT INTO Usuarios (
    CorreoElectronico,
    PrimerNombre,
    SegundoNombre,
    PrimerApellido,
    SegundoApellido,
    Identificacion,
    DireccionProvincia,
    DireccionCanton,
    DireccionDistrito,
    Telefono,
    Contraseña,
    RolId
)
VALUES (
    'anderson@example.com',
    'Anderson',
    'Jesús',
    'Delgado',
    'Fuentes',
    '987654321',
    'Provincia2',
    'Canton2',
    'Distrito2',
    '987-654-3210',
    'password456',
    1
);


/**************************************/
/*CENTROS DE ACOPIO*/

-- Insertar el primer centro de acopio para el usuario con ID 1
INSERT INTO CentrosDeAcopio (Nombre, DireccionProvincia, DireccionCanton, DireccionDistrito, DireccionExacta, Telefono, HorarioAtencion, AdministradorID)
VALUES ('Centro de Acopio 1', 'Provincia1', 'Canton1', 'Distrito1', 'Dirección 1', '123-456-7890', 'Horario1', 1);

-- Insertar el segundo centro de acopio para el usuario con ID 2
INSERT INTO CentrosDeAcopio (Nombre, DireccionProvincia, DireccionCanton, DireccionDistrito, DireccionExacta, Telefono, HorarioAtencion, AdministradorID)
VALUES ('Centro de Acopio 2', 'Provincia2', 'Canton2', 'Distrito2', 'Dirección 2', '987-654-3210', 'Horario2', 2);



/**************************************/
/*Materiales*/

INSERT INTO Materiales (Nombre, Tipo, Descripcion, Imagen, UnidadMedida, Color, Precio)
VALUES ('Papel', 'Materiales Básicos', 'Material compuesto por fibras vegetales generalmente derivadas de la celulosa de la madera.', 'papel.png', 'KG', '#C1BEF0', 5.99);

INSERT INTO Materiales (Nombre, Tipo, Descripcion, Imagen, UnidadMedida, Color, Precio)
VALUES ('Cartón', 'Materiales Básicos', 'Material similar al papel, pero más grueso y resistente, comúnmente utilizado en envases y embalajes.', 'carton.png', 'KG', '#FC7A00', 7.50);

INSERT INTO Materiales (Nombre, Tipo, Descripcion, Imagen, UnidadMedida, Color, Precio)
VALUES ('Plástico', 'Materiales Básicos', 'Material polimérico derivado del petróleo o de fuentes renovables, ampliamente utilizado en envases.', 'plastico.png', 'KG', '#BEDAF0', 3.25);

INSERT INTO Materiales (Nombre, Tipo, Descripcion, Imagen, UnidadMedida, Color, Precio)
VALUES ('Chatarra', 'Desarmables y Metales', 'Residuos metálicos diversos provenientes de objetos desechados, listos para el reciclaje.', 'chatarra.png', 'KG', '#95FC00', 4.75);

INSERT INTO Materiales (Nombre, Tipo, Descripcion, Imagen, UnidadMedida, Color, Precio)
VALUES ('Aparatos eléctricos y electrónicos', 'Desarmables y Metales', 'Dispositivos electrónicos en desuso que contienen valiosos materiales metálicos y componentes para reciclar.', 'aparatoselectronicos.png', 'Unidad', '#F9FC00 ', 12.00);






/**************************************/
/*MaterialesCentroDeAcopio*/


INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES (1, 1);
INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES (1, 2);
INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES (1, 3);

-- Asociar materiales al Centro de Acopio 2
INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES (2, 4);
INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES (2, 5);






/**************************************/
/*Canjes de Materiales*/

INSERT INTO CanjesMateriales (ClienteID, CentroDeAcopioID, FechaCanje, TotalEcoMonedas) 
VALUES (1, 1, '2023-10-15', 30.50);

INSERT INTO CanjesMateriales (ClienteID, CentroDeAcopioID, FechaCanje, TotalEcoMonedas) 
VALUES (2, 2, '2023-10-16', 45.25);

INSERT INTO CanjesMateriales (ClienteID, CentroDeAcopioID, FechaCanje, TotalEcoMonedas) 
VALUES (1, 2, '2023-10-18', 27.75);

INSERT INTO CanjesMateriales (ClienteID, CentroDeAcopioID, FechaCanje, TotalEcoMonedas) 
VALUES (2, 1, '2023-10-19', 33.60);

INSERT INTO CanjesMateriales (ClienteID, CentroDeAcopioID, FechaCanje, TotalEcoMonedas) 
VALUES (2,2, '2023-10-20', 50.00);

-- Inserts para DetalleCanjesMateriales
INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (1, 1, 5, 15.50);

INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (1, 2, 10, 10.00);

INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (1, 3, 3, 5.00);

INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (2, 4, 8, 20.00);

INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (2, 5, 5, 25.25);

INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (3, 1, 4, 12.00);

INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (3, 2, 7, 14.00);

INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (4, 3, 5, 8.75);

INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (4, 4, 10, 24.50);

INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (1, 1, 15, 30.50);
