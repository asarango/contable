<?php

return [
      'class' => 'yii\db\Connection',
            'dsn' => 'pgsql:host=localhost;port=5433;dbname=histo',
            //'dsn' => 'pgsql:host=186.4.195.24;port=5432;dbname=academico',
//            'username' => 'histo',
            'username' => 'base',
            'password' => 'asarango5000',
//            'password' => 'histo',
            'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
