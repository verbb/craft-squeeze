<?php
namespace verbb\squeeze;

use verbb\squeeze\base\PluginTrait;

use Craft;
use craft\base\Plugin;

class Squeeze extends Plugin
{
    // Properties
    // =========================================================================

    public string $schemaVersion = '1.0.0';


    // Traits
    // =========================================================================

    use PluginTrait;


    // Public Methods
    // =========================================================================

    public function init(): void
    {
        parent::init();

        self::$plugin = $this;
    }
}
