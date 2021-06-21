<?php
/**
 * Plugin Name: SR5 Limit Calculator
 * Description: A Gutenberg widget block to display an SR5 Limit Calculator
 * Author URI: dashifen@dashifen.com
 * Author: David Dashifen Kees
 * Version: 1.0.0
 *
 * @noinspection PhpIncludeInspection
 */

use Dashifen\LimitCalculator\LimitCalculator;
use Dashifen\WPHandler\Handlers\HandlerException;

$autoloader = file_exists(dirname(ABSPATH) . '/deps/vendor/autoload.php')
  ? dirname(ABSPATH) . '/deps/vendor/autoload.php'    // production location
  : 'vendor/autoload.php';                            // development location

require_once($autoloader);

(function() {
  try {
    $limitCalc = new LimitCalculator();
    $limitCalc->initialize();
  } catch (HandlerException $e) {
    LimitCalculator::catcher($e);
  }
})();
