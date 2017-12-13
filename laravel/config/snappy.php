<?php

return array(


    'pdf' => array(
        'enabled' => true,
//        'binary'  => '/usr/local/bin/wkhtmltopdf',
        'binary'  => '"D:\wkhtmltox\wkhtmltopdf\bin\wkhtmltopdf" ',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
//        'binary'  => '/usr/local/bin/wkhtmltoimage',
        'binary'  => '"D:\wkhtmltox\wkhtmltopdf\bin\wkhtmltoimage" ',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);
