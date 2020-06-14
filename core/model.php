<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model
 *
 * @author AVITORINO
 */
class Model {
    
    protected $db;
    protected $wpdb;
    protected $wpconfig;

    public function __construct() {
        global $config;

        $this->db = new pDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
        $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $this->wpdb = new pDO("mysql:dbname=".$config['wp_dbname'].";host=".$config['wp_host'], $config['wp_dbuser'], $config['wp_dbpass']);
        $this->wpdb->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $this->wpconfig = [
        	"wp_dbname" => $config['wp_dbname'],
        	"wp_host" => $config['wp_host'],
        	"wp_dbuser" => $config['wp_dbuser'],
        	"wp_dbpass" => $config['wp_dbpass'],
        	"wp_prefix" => $config['wp_prefix'],
        	"wp_autor" => $config['wp_autor'],
        	"wp_url" => $config['wp_url']
        ];
    }
}
