-- Active: 1697643633852@@127.0.0.1@3306@db_proyecto

USE db_proyecto;
/* Inserts para las pruebas */



/**************************************/
/*ROLES*/

/* Insertar el rol "Administrador" */

INSERT INTO Roles (Nombre) VALUES ('Administrador');
INSERT INTO Roles (Nombre) VALUES ('Cliente');



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
        Contrasenna,
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
    Contrasenna,
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
    Contrasenna,
    RolId
)
VALUES (
    'nuevoadmin1@example.com',
    'Carlos',
    'Alberto',
    'Soto',
    'Fernández',
    '555666777',
    'Provincia8',
    'Canton8',
    'Distrito8',
    '210-212-2324',
    'nuevopassword1',
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
    Contrasenna,
    RolId
)
VALUES (
    'nuevoadmin2@example.com',
    'Laura',
    'Patricia',
    'Rodríguez',
    'González',
    '890123456',
    'Provincia9',
    'Canton9',
    'Distrito9',
    '432-434-4546',
    'nuevopassword2',
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
    Contrasenna,
    RolId
)
VALUES (
    'nuevoadmin3@example.com',
    'María',
    'Isabel',
    'Hernández',
    'López',
    '654987321',
    'Provincia10',
    'Canton10',
    'Distrito10',
    '576-578-5960',
    'nuevopassword3',
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
    Contrasenna,
    RolId
)
VALUES (
    'nuevoadmin4@example.com',
    'Roberto',
    'Miguel',
    'Sánchez',
    'Pérez',
    '321456789',
    'Provincia11',
    'Canton11',
    'Distrito11',
    '608-610-6262',
    'nuevopassword4',
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
    Contrasenna,
    RolId
)
VALUES (
    'nuevoadmin5@example.com',
    'Alejandra',
    'Beatriz',
    'Gómez',
    'Santos',
    '987654321',
    'Provincia12',
    'Canton12',
    'Distrito12',
    '632-634-6566',
    'nuevopassword5',
    1
);

-- Insertar cinco clientes simulados
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
    Contrasenna,
    RolId
)
VALUES (
    'cliente1@example.com',
    'María',
    'Isabel',
    'González',
    'López',
    '123456789',
    'San José',
    'Escazú',
    'San Rafael',
    '222-333-4444',
    'pass123',
    2 -- ID del rol 'Cliente'
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
    Contrasenna,
    RolId
)
VALUES (
    'cliente2@example.com',
    'Juan',
    'Carlos',
    'Hernández',
    'Gómez',
    '987654321',
    'Alajuela',
    'Grecia',
    'San Isidro',
    '555-666-7777',
    'pass456',
    2 -- ID del rol 'Cliente'
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
    Contrasenna,
    RolId
)
VALUES (
    'cliente3@example.com',
    'Laura',
    'Fernanda',
    'Martínez',
    'Jiménez',
    '456789123',
    'Heredia',
    'Heredia',
    'San Francisco',
    '888-999-1010',
    'pass789',
    2 -- ID del rol 'Cliente'
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
    Contrasenna,
    RolId
)
VALUES (
    'cliente4@example.com',
    'Elena',
    'María',
    'Díaz',
    'Pérez',
    '987123654',
    'Guanacaste',
    'Liberia',
    'Cañas Dulces',
    '111-222-3333',
    'pass101',
    2 -- ID del rol 'Cliente'
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
    Contrasenna,
    RolId
)
VALUES (
    'cliente5@example.com',
    'Javier',
    'Alejandro',
    'Ramírez',
    'Mora',
    '369258147',
    'Puntarenas',
    'Puntarenas',
    'El Roble',
    '444-555-6666',
    'pass202',
    2 -- ID del rol 'Cliente'
);

-- Insertar un usuario administrador
INSERT INTO Usuarios (CorreoElectronico, PrimerNombre, SegundoNombre, PrimerApellido, SegundoApellido, Identificacion, DireccionProvincia, DireccionCanton, DireccionDistrito, Telefono, Contrasenna, RolId)
VALUES ('admin@example2.com', 'Floriberto', '', 'Jimenez', '', '123456789', 'Provincia', 'Canton', 'Distrito', '1234567890', 'contrasena123', (SELECT ID FROM Roles WHERE Nombre = 'Administrador'));


INSERT INTO Usuarios (CorreoElectronico, PrimerNombre, SegundoNombre, PrimerApellido, SegundoApellido, Identificacion, DireccionProvincia, DireccionCanton, DireccionDistrito, Telefono, Contrasenna, RolId)
VALUES ('admin@example3.com', 'Angel', '', 'Prado', '', '123456789', 'Provincia', 'Canton', 'Distrito', '1234567890', 'contrasena123', (SELECT ID FROM Roles WHERE Nombre = 'Administrador'));



-- Insertar un usuario no administrador
INSERT INTO Usuarios (CorreoElectronico, PrimerNombre, SegundoNombre, PrimerApellido, SegundoApellido, Identificacion, DireccionProvincia, DireccionCanton, DireccionDistrito, Telefono, Contrasenna, RolId)
VALUES ('usuario1@example.com', 'Usuario', '', 'Uno', '', '987654321', 'Provincia', 'Canton', 'Distrito', '9876543210', 'contrasena456', (SELECT ID FROM Roles WHERE Nombre = 'OtroRol'));


/**************************************/
/*CENTROS DE ACOPIO*/


INSERT INTO CentrosDeAcopio (Nombre, DireccionProvincia, DireccionCanton, DireccionDistrito, DireccionExacta, Telefono, HorarioAtencion, AdministradorID)
VALUES ('Centro de Acopio 1', 'Provincia1', 'Canton1', 'Distrito1', 'Dirección 1', '123-456-7890', 'Horario1', 1);

INSERT INTO CentrosDeAcopio (Nombre, DireccionProvincia, DireccionCanton, DireccionDistrito, DireccionExacta, Telefono, HorarioAtencion, AdministradorID)
VALUES ('Centro de Acopio 2', 'Provincia2', 'Canton2', 'Distrito2', 'Dirección 2', '987-654-3210', 'Horario2', 2);

INSERT INTO CentrosDeAcopio (Nombre, DireccionProvincia, DireccionCanton, DireccionDistrito, DireccionExacta, Telefono, HorarioAtencion, AdministradorID)
VALUES ('Centro de Acopio 3', 'Provincia3', 'Canton3', 'Distrito3', 'Dirección 3', '111-222-3333', 'Horario3', 3);

INSERT INTO CentrosDeAcopio (Nombre, DireccionProvincia, DireccionCanton, DireccionDistrito, DireccionExacta, Telefono, HorarioAtencion, AdministradorID)
VALUES ('Centro de Acopio 4', 'Provincia4', 'Canton4', 'Distrito4', 'Dirección 4', '444-555-6666', 'Horario4', 4);

INSERT INTO CentrosDeAcopio (Nombre, DireccionProvincia, DireccionCanton, DireccionDistrito, DireccionExacta, Telefono, HorarioAtencion, AdministradorID)
VALUES ('Centro de Acopio 5', 'Provincia5', 'Canton5', 'Distrito5', 'Dirección 5', '777-888-9999', 'Horario5', 5);

INSERT INTO CentrosDeAcopio (Nombre, DireccionProvincia, DireccionCanton, DireccionDistrito, DireccionExacta, Telefono, HorarioAtencion, AdministradorID)
VALUES ('Centro de Acopio 6', 'Provincia6', 'Canton6', 'Distrito6', 'Dirección 6', '101-112-1314', 'Horario6', 6);

INSERT INTO CentrosDeAcopio (Nombre, DireccionProvincia, DireccionCanton, DireccionDistrito, DireccionExacta, Telefono, HorarioAtencion, AdministradorID)
VALUES ('Centro de Acopio 7', 'Provincia7', 'Canton7', 'Distrito7', 'Dirección 7', '151-617-1819', 'Horario7', 7);


/**************************************/
/*Materiales*/

INSERT INTO Materiales (Nombre, Tipo, Descripcion, Imagen, UnidadMedida, Color, Precio)
VALUES ('Papel', 'Materiales Básicos', 'Material compuesto por fibras vegetales generalmente derivadas de la celulosa de la madera.', 'Materiales_1.png', 'KG', '#C1BEF0', 5.99);

INSERT INTO Materiales (Nombre, Tipo, Descripcion, Imagen, UnidadMedida, Color, Precio)
VALUES ('Cartón', 'Materiales Básicos', 'Material similar al papel, pero más grueso y resistente, comúnmente utilizado en envases y embalajes.', 'Materiales_2.png', 'KG', '#FC7A00', 7.50);

INSERT INTO Materiales (Nombre, Tipo, Descripcion, Imagen, UnidadMedida, Color, Precio)
VALUES ('Plástico', 'Materiales Básicos', 'Material polimérico derivado del petróleo o de fuentes renovables, ampliamente utilizado en envases.', 'Materiales_3.png', 'KG', '#BEDAF0', 3.25);

INSERT INTO Materiales (Nombre, Tipo, Descripcion, Imagen, UnidadMedida, Color, Precio)
VALUES ('Chatarra', 'Desarmables y Metales', 'Residuos metálicos diversos provenientes de objetos desechados, listos para el reciclaje.', 'Materiales_4.png', 'KG', '#95FC00', 4.75);

INSERT INTO Materiales (Nombre, Tipo, Descripcion, Imagen, UnidadMedida, Color, Precio)
VALUES ('Aparatos eléctricos y electrónicos', 'Desarmables y Metales', 'Dispositivos electrónicos en desuso que contienen valiosos materiales metálicos y componentes para reciclar.', 'Materiales_5.png', 'Unidad', '#F9FC00 ', 12.00);

/**************************************/
/*MaterialesCentroDeAcopio*/


INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES (1, 1);
INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES (1, 2);
INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES (1, 3);

-- Asociar materiales al Centro de Acopio 2
INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES (2, 4);
INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES (2, 5);

-- Asociar materiales al Centro de Acopio 3
INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES (3, 1);
INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES (3, 2);
INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES (3, 3);

-- Asociar materiales al Centro de Acopio 4
INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES (4, 4);
INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES (4, 5);

-- Asociar materiales al Centro de Acopio 5
INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES (5, 1);
INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES (5, 3);
INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES (5, 5);

-- Asociar materiales al Centro de Acopio 6
INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES (6, 2);
INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES (6, 4);

-- Asociar materiales al Centro de Acopio 7
INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES (7, 3);
INSERT INTO MaterialesCentroAcopio (CentroDeAcopioID, MaterialID) VALUES (7, 5);






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


-- Canjes y Detalles de Canjes para el Cliente 3
-- Canje 1 para el Cliente 3





INSERT INTO CanjesMateriales (ClienteID, CentroDeAcopioID, FechaCanje, TotalEcoMonedas) 
VALUES (3, 3, '2023-10-23', 18.25);

INSERT INTO CanjesMateriales (ClienteID, CentroDeAcopioID, FechaCanje, TotalEcoMonedas) 
VALUES (3, 4, '2023-10-25', 22.60);

INSERT INTO CanjesMateriales (ClienteID, CentroDeAcopioID, FechaCanje, TotalEcoMonedas) 
VALUES (3, 5, '2023-10-27', 14.75);

INSERT INTO CanjesMateriales (ClienteID, CentroDeAcopioID, FechaCanje, TotalEcoMonedas) 
VALUES (4, 4, '2023-10-23', 19.50);


INSERT INTO CanjesMateriales (ClienteID, CentroDeAcopioID, FechaCanje, TotalEcoMonedas) 
VALUES (4, 5, '2023-10-26', 26.00);

INSERT INTO CanjesMateriales (ClienteID, CentroDeAcopioID, FechaCanje, TotalEcoMonedas) 
VALUES (5, 5, '2023-10-28', 35.75);

INSERT INTO CanjesMateriales (ClienteID, CentroDeAcopioID, FechaCanje, TotalEcoMonedas) 
VALUES (5, 1, '2023-10-29', 29.00);

INSERT INTO CanjesMateriales (ClienteID, CentroDeAcopioID, FechaCanje, TotalEcoMonedas) 
VALUES (4, 3, '2023-10-30', 31.25);

INSERT INTO CanjesMateriales (ClienteID, CentroDeAcopioID, FechaCanje, TotalEcoMonedas) 
VALUES (5, 2, '2023-11-01', 22.50);



-- Detalles del Canje 1
INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (7, 1, 3, 9.75);

INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (7, 2, 5, 8.50);


-- Canje 2 para el Cliente 3


-- Detalles del Canje 2
INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (8, 3, 6, 19.50);

INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (8, 4, 4, 3.10);

-- Canje 3 para el Cliente 3


-- Detalles del Canje 3
INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (9, 1, 2, 6.50);

INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (9, 5, 7, 8.25);

-- Canjes y Detalles de Canjes para el Cliente 4
-- Canje 1 para el Cliente 4


-- Detalles del Canje 1
INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (10, 2, 4, 6.00);

INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (10, 3, 6, 13.50);

-- Canje 2 para el Cliente 4

-- Detalles del Canje 2
INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (11, 3, 10, 32.50);

INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (11, 4, 5, 10.50);

-- Canje 3 para el Cliente 4


-- Detalles del Canje 3
INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (12, 2, 7, 20.00);

INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (12, 1, 5, 11.25);

-- Canjes y Detalles de Canjes para el Cliente 5
-- Canje 1 para el Cliente 5


-- Detalles del Canje 1
INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (13, 4, 6, 18.00);

INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (13, 5, 10, 17.75);

-- Canje 2 para el Cliente 5


-- Detalles del Canje 2
INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (14, 1, 7, 21.50);

INSERT INTO DetalleCanjesMateriales (CanjeID, MaterialID, Cantidad, SubTotalEcoMonedas)
VALUES (14, 2, 4, 7.50);

-- Canje 3 para el Cliente 5


-- Detalles del Canje 3



Select * from usuarios
