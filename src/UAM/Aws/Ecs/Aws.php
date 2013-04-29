<?php

namespace UAM\Aws\Ecs;

use Guzzle\Service\Builder\ServiceBuilderLoader;

class Aws extends ServiceBuilderLoader
{
    public static function factory($config)
    {
        $loader = new static();

        return $loader->load($config);
    }

    public function build($config, array $options = array())
    {
        if (array_key_exists('services', $config)) {
            return parent::build($config, $options);
        }


        // A service builder class can be specified in the class field
        $class = !empty($config['class']) ? $config['class'] : 'Guzzle\Service\Builder\ServiceBuilder';

        if (array_key_exists('stores', $config)) {
            $services = array();

            foreach ($config['stores'] as $name => $params) {
                $service = array(
                    'class' => 'UAM\\Aws\\Ecs\\EcsClient',
                    'params' => $params
                );

                $services[$name] = $service;
            }
        }
        else {
            $name = array_key_exists('name', $config) ? $config['name'] : 'ecs';

            $services = array(
                $name => array(
                    'class' => 'UAM\\Aws\\Ecs\\EcsClient',
                    'params' => $config
                )
            );
        }

        return new $class($services);
    }
}