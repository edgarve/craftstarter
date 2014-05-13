<?php

/**
 * Database Configuration
 *
 * All of your system's database configuration settings go in here.
 * You can see a list of the default settings in craft/app/etc/config/defaults/db.php
 */

// ------------------------------------------- //
//
// IMPORTANT!
//
// Update the local config variables below
// to relect your local environment.
//
//
// ------------------------------------------- //

return array(
  // All ENV
  '*' => array(
    'tablePrefix' => 'craft'
  ),

  // Local ENV
  'cosmic.dev' => array(
    'server'   => 'localhost',
    'user'     => 'root',
    'password' => 'root',
    'database' => 'craft_started'
  ),

  // Staging ENV
  'SERVER_IP OR STRING OF DOMAIN TO MATCH' => array(
    // Check 1Pass for these defaults on Digital Ocean instances
    'server'   => 'localhost',
    'user'     => 'root',
    'password' => 'MYSQL_PASS',
    'database' => 'DM_NAME'
  ),

  // Production ENV
  '.com' => array(
    'server'   => 'MYSQL_SERVER',
    'user'     => 'MYSQL_USER',
    'password' => 'MYSQL_PASS',
    'database' => 'DB_NAME'
  )

);
