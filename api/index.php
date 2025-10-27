<?php
// Simple forwarder to public/index.php
chdir(__DIR__ . '/../'); // pindah ke root project
require __DIR__ . '/../public/index.php';
