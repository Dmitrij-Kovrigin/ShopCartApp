<?php

use App\App;

require __DIR__ . '/vendor/autoload.php';

App::readFromFileOutputToCli();

// Data is stored in data.txt file
// CLI comand to run an app: php -r "require 'index.php';"