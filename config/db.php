<?php

return [
//  'class' => 'yii\db\Connection',
//  'dsn' => 'mysql:host=localhost;dbname=dbarmada',
//  'username' => 'root',
//  'password' => '',
//  'charset' => 'utf8',

    'class' => 'yii\db\Connection',
    //  'dsn' => 'sqlsrv:Server=localhost;Database=B2BPortal',
    'dsn' => 'sqlsrv:Server=192.168.2.27\msdevelopment;Database=B2BPortal',
    'username' => 'sa',
    'password' => 'P4ssw0rd!',
    //   'password' => 'st123',
    'charset' => 'utf8',
//    'enableProfiling' => true,
//   'enableParamLogging' => true,
];


//return [
//    'class' => 'yii\db\Connection',
//    'dsn' => 'sqlsrv:Server=localhost;Database=newstanli', // MS SQL Server, sqlsrv driver
//    //'dsn' => 'dblib:host=localhost;dbname=mydatabase', // MS SQL Server, dblib driver
//    //'dsn' => 'mssql:host=localhost;dbname=mydatabase', // MS SQL Server, mssql driver
//    //'dsn' => 'oci:dbname=//localhost:1521/mydatabase', // Oracle
//    'username' => 'sa',
//    'password' => 'st123',
//    'charset' => 'utf8',
//];

