<?php
$output = $modx->resource->_output;
$output= preg_replace('|\s+|', ' ', $output);
$modx->resource->_output = $output;
return;
