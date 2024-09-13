# TPE Entrega1 López-Orsatti

## Gráfico
![gráfico_relaciones](https://github.com/user-attachments/assets/57a930b4-db0c-4588-a996-d6f4c9af8207)

## Explicación

Nuestra base de datos trata de una aerolínea donde se guarda la información de los vuelos, pilotos y aviones.

En el tabla de vuelos está almacenada la información de: id de vuelo, id del piloto, origen y destino del viaje, id del avión, cantidad de pasajeros y duración del vuelo.

En la tabla del avión está almacenada la información de: id de avión, modelo, color, capacidad y patente.

En la tabla del piloto está almacenada la información de: id del piloto, nombre, dni, fecha de nacimiento, número de licencia, email, dirección y teléfono.

La tabla principal es la de vuelo, en la cual relacionamos el id del piloto con la tabla del piloto, y el id del avión con la tabla del avión. 
