<?php

/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here.
 * You can see a list of the default settings in craft/app/etc/config/defaults/general.php
 */

return array(
  // All ENV
  '*' => array(
    'omitScriptNameInUrls' => true,
    'defaultImageQuality' => 100,
    'useCompressedJs' => false
  ),

  // Local ENV
  '10.50.1.100' => array(
    'devMode' => true,
    'environmentVariables' => array(
      // Ex: http://YOUR_IP/cosmic-craft/www
      'siteUrl'        => 'YOUR_SITE_URL',
      // Ex: /Users/billcolumbia/Projects/cosmic-craft/www
      'fileSystemPath' => 'YOUR_PATH'
    )
  ),

  // Staging ENV
  '107.170.212.60' => array(
    'devMode' => true,
    'environmentVariables' => array(
      // Ex: http://107.170.205.223 OR http://designbycosmic.com
      'siteUrl'        => 'YOUR_SITE_URL',
      // Ex: home/cosmic/site/www
      'fileSystemPath' => 'YOUR_PATH'
    )
  ),

  // Production ENV
  '.com' => array(
    'devMode' => false,
    'environmentVariables' => array(
      // Ex: http://107.170.205.223 OR http://designbycosmic.com
      'siteUrl'        => 'YOUR_SITE_URL',
      // Ex: home/cosmic/site/www
      'fileSystemPath' => 'YOUR_PATH'
    )
  )
);
