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
