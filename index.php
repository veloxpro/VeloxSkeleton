<?php
require "backend/bootstrap.php";
Velox\Framework\Registry\Registry::get('Velox.HttpRouter')->respond();
