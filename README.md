### Uso del template
1. Clonamos usando el botón del repositorio.
2. Clonamos haciendo:
```sh
git clone git@github.com:uxmaltech/domain-template.git
```

- Corremos el archivo de configuración: (revisamos que tenga los permisos)
```sh
./configure.php
```
En caso de que no tenga los permisos de ejecución:
```sh
chmod +x configure.php
```

- Nos va a pedir el nombre ingresamos uno teniendo en cuenta las convenciones PSR.

```sh
Ingrese el nombre del paquete: HolaMundo
```

Espere que termine la instalación y corra los tests para validar:
```sh
composer test
```
