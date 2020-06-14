<?php

require 'environment.php';

global $config;

if (ENVIRONMENT == 'development') {
    $config['dbname'] = 'db_rivieragold';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';

    $config['wp_prefix'] = 'wp_';
    $config['wp_dbname'] = 'db_vosidoceria';
    $config['wp_host'] = 'localhost';
    $config['wp_dbuser'] = 'root';
    $config['wp_dbpass'] = '';
    $config['wp_autor'] = 1;
    $config['wp_url'] = 'http://localhost/vosidoceria/?p=';
} else {
    $config['dbname'] = 'rivierag_app';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'rivierag_riv';
    $config['dbpass'] = '?}Ab6P#DG9.!';

    $config['wp_prefix'] = 'enmr_';
    $config['wp_dbname'] = 'rivierag_riv';
    $config['wp_host'] = 'localhost';
    $config['wp_dbuser'] = 'rivierag_riv';
    $config['wp_dbpass'] = '?}Ab6P#DG9.!';
    $config['wp_autor'] = 1;
    $config['wp_url'] = 'http://degbrindes.com/riviera/?post_type=property&p=';
}