<?php

namespace Dashifen\LimitCalculator;

use Dashifen\WPHandler\Handlers\HandlerException;
use Dashifen\WPHandler\Handlers\Plugins\AbstractPluginHandler;

class LimitCalculator extends AbstractPluginHandler
{
  /**
   * initialize
   *
   * Uses addAction and/or addFilter to attach protected methods of this object
   * to the ecosystem of WordPress action and filter hooks.
   *
   * @return void
   * @throws HandlerException
   */
  public function initialize(): void
  {
    if (!$this->isInitialized()) {
      $this->addAction('init', 'registerBlock');
      $this->addFilter('timber/locations', 'addTwigLocation');
      $this->addAction('enqueue_block_editor_assets', 'addEditorAssets');
      $this->addAction('wp_enqueue_scripts', 'addAssets');
    }
  }
  
  /**
   * registerBlock
   *
   * Registers our limit calculator block.
   *
   * @return void
   */
  protected function registerBlock(): void
  {
    register_block_type(
      'dashifen/limit-calculator',
      [
        'render_callback' => [$this, 'renderLimitCalculator'],
        'attributes'      => [],
      ]
    );
  }
  
  /**
   * renderLimitCalculator
   *
   * Displays the content of our block by adding a custom HTML tag to the DOM
   * which triggers our Vue component.
   *
   * @return string
   */
  public function renderLimitCalculator(): string
  {
    return '<limit-calculator></limit-calculator>';
  }
  
  /**
   * addTwigLocation
   *
   * Adds the location of this plugin's twig files to the list of available
   * twigs that Timber knows about.
   *
   * @param array $locations
   *
   * @return array
   */
  protected function addTwigLocation(array $locations): array
  {
    $locations[] = $this->getPluginDir() . '/assets/twigs/';
    return $locations;
  }
  
  /**
   * addEditorAssets
   *
   * Enqueues the JS and CSS assets needed for our limit calculator block.
   *
   * @return void
   */
  protected function addEditorAssets(): void
  {
    $this->enqueue('assets/limit-calculator.min.js');
    $this->enqueue('assets/limit-calculator.css');
  }
  
  protected function addAssets(): void
  {
    $this->enqueue('assets/calculator-display.min.js');
    $this->enqueue('assets/limit-calculator.css');
  }
}
