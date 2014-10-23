<?php
require "backend/app/bootstrap.php";
use Velox\Framework\Registry\Registry;
Registry::get('Velox.HttpRouter')->respond();
