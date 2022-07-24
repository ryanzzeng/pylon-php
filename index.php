<?php

use App\Tasks\PrintFilmsTask;

require __DIR__ . '/vendor/autoload.php';

(new PrintFilmsTask())->run();