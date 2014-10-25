<?php
function _dump($mixed) {
    echo '<pre style="
        background-color: #feffe1;
        border: 1px solid #a11317;
        padding: 5px;
        margin: 1px;
        font-size: 11px;
        box-shadow: 2px 2px 7px #180203;
    ">';
    var_dump($mixed);
    echo '</pre>';
}

function _callStack() {
    $stacktrace = debug_backtrace();
    echo '<pre style="
        background-color: #feffe1;
        border: 1px solid #a11317;
        padding: 5px;
        margin: 1px;
        font-size: 11px;
        box-shadow: 2px 2px 7px #180203;
    ">';
    $i = 1;
    foreach($stacktrace as $node) {
        print "$i. ".basename($node['file']) .":" .$node['function'] ."(" .$node['line'].")\n";
        $i++;
    }
    //echo '</pre>';
}

chdir(__DIR__);

require 'lib/Velox/Framework/Kernel/Kernel.php';

use Velox\Framework\Kernel\Kernel;

session_start();
Kernel::init();
Kernel::registerComponent('Velox\Framework');
Kernel::registerComponent('Velox\Security');
Kernel::registerComponent('Demo\App');
Kernel::registerComponent('Demo\Account');
Kernel::registerComponent('Demo\Admin');
Kernel::launch();