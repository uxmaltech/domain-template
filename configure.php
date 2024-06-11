#!/usr/bin/env php
<?php

// Solicitar al usuario que ingrese el nuevo nombre del paquete
echo 'Ingrese el nombre del paquete: ';
$packageName = trim(fgets(STDIN));

// Verificar que el usuario ingresó un nombre
if (empty($packageName)) {
    echo "El nombre del paquete no puede estar vacío.\n";
    exit(1);
}

function toSnakeCase($string)
{
    $string = preg_replace('/(?<!^)([A-Z])/', ' $1', $string);
    $string = str_replace(['-', '_'], ' ', $string);
    $string = strtolower($string);
    $string = str_replace(' ', '_', $string);

    return $string;
}

function toPascalCase($string)
{
    $string = preg_replace('/(?<!^)([A-Z])/', ' $1', $string);
    $string = str_replace(['-', '_'], ' ', $string);
    $string = ucwords($string);
    $string = str_replace(' ', '', $string);

    return $string;
}

// Convertir el nombre del paquete a PascalCase y kebab-case
$packageNamePascal = toPascalCase($packageName);
$packageNameSnake = toSnakeCase($packageName);

// Lista de archivos donde se realizará la búsqueda y el reemplazo
$filesToSearch = [
    'composer.json',
    'database/factories/ExampleFactory.php',
    'database/seeders/DatabaseSeeder.php',
    'routes/web.php',
    'src/ServiceProvider.php',
    'src/Http/Controllers/ExampleController.php',
    'src/Models/Example.php',
    'tests/TestCase.php',
    'tests/Feature/ArchTest.php',
    'tests/Unit/ExampleTest.php',
];

// Función para buscar y reemplazar en archivos
function replaceInFile($filePath, $search, $replace)
{
    $content = file_get_contents($filePath);
    $updatedContent = str_replace($search, $replace, $content);
    file_put_contents($filePath, $updatedContent);
}

// Buscar y reemplazar '{{ packageName }}' en los archivos especificados
foreach ($filesToSearch as $file) {
    if (file_exists($file)) {
        replaceInFile($file, '{{ packageName }}', $packageNamePascal);
        echo "Reemplazo realizado en $file\n";
    } else {
        echo "El archivo $file no existe\n";
    }
}

// Renombrar el archivo de migración
$newMigrationFile = 'database/migrations/'.date('Y_m_d_His').'_create_'.$packageNameSnake.'_table.php';
rename('database/migrations/create_examples_table.php', $newMigrationFile);
echo "Archivo de migración renombrado a $newMigrationFile\n";

rename('src/Domains/PackageTemplate', 'src/Domains/'.$packageNamePascal);

echo "Ejecutando instalación de los paquetes de composer...\n";
exec('composer install && rm ./configure.php');

echo "Configuración completada.\n";
