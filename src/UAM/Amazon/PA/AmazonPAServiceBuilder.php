<?php 

namespace UAM\Amazon\PA;

use Guzzle\Service\Builder\ServiceBuilder;
use Guzzle\Service\Builder\ServiceBuilderLoader;

class AmazonPAServiceBuilder extends ServiceBuilderLoader
{
    /**
     * @var string Current version of the Product Advertising API SDK
     */
    const VERSION = "2011-08-01";

    /**
     * Create a new service locator for the Amazon Product Advertising API SDK
     *
     * You can configure the service locator is four different ways:
     *
     * 1. Use the default configuration file shipped with the SDK that wires
     *   class names with service short names and specify global parameters to
     *   add to every definition (e.g. key, secret, credentials, etc)
     *
     * 2. Use a custom configuration file that extends the default config and
     *   supplies credentials for each service.
     *
     * 3. Use a custom config file that wires services to custom short names for
     *    services.
     *
     * @param array|string|\SimpleXMLElement $config           An instantiated SimpleXMLElement containing configuration
     *                                                         data, the full path to an .xml or .js|.json file, or when
     *                                                         using the default configuration file, an associative
     *                                                         array of data to use as global parameters to pass to each
     *                                                         service as it is instantiated.
     * @param array                          $globalParameters Array of global parameters to pass to every service as it
     *                                                         is instantiated.
     *
     * @return ServiceBuilder
     */
    public static function factory($config = null, array $globalParameters = array())
    {
        if (!$config) {
            // If nothing is passed in, then use the default configuration file
            // with Instance profile credentials
            $config = self::getDefaultServiceDefinition();
        } elseif (is_array($config)) {
            // If an array was passed, then use the default configuration file
            // with global parameter overrides in the first argument
            $globalParameters = $config;
            $config = self::getDefaultServiceDefinition();
        }

        $loader = new static();

        return $loader->load($config, $globalParameters);
    }

    /**
     * Get the full path to the default JSON service definition file
     *
     * @return string
     */
    public static function getDefaultServiceDefinition()
    {
        return __DIR__  . '/Resources/amazon-pa.json';
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->addAlias('_amazon_pa', self::getDefaultServiceDefinition());
    }
}