<?php
/**
 * Plugin Name: SR5 Limit Calculator
 * Description: A Gutenberg widget block to display an SR5 Limit Calculator
 * Author URI: dashifen@dashifen.com
 * Author: David Dashifen Kees
 * Version: 2.0.0
 */

use Dashifen\LimitCalculator\LimitCalculator;
use Dashifen\WPHandler\Handlers\HandlerException;

if (!class_exists('Dashifen\LimitCalculator\LimitCalculator')) {
  require_once 'vendor/autoload.php';
}

(function() {
  try {
    $limitCalc = new LimitCalculator();
    $limitCalc->initialize();
  } catch (HandlerException $e) {
    LimitCalculator::catcher($e);
  }
})();
