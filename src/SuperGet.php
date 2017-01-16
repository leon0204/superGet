<?php

namespace SuperGet;

use SuperGet\Utils\Config as SConfig;

/**
 * Class SuperGet
 * @package SuperGet
 */
class SuperGet
{
    private static $instances;

    public static function info ()
    {
        echo 'u get info ';
    }

    /**
     * @param  array  $configs
     * @return void
     */
    public static function setConfig($configs = [])
    {
//        SConfig::import($configs);TODO
    }


    private static function getInstance($modelAlias)
    {
        if (empty(self::$instances[$modelAlias])) {
            self::$instances[$modelAlias] = new self();
            self::$instances[$modelAlias]->model = self::getBindingModel($modelAlias);
        }

        return self::$instances[$modelAlias];
    }

    /**
     * Set model.
     */
    public static function get($modelAlias)
    {
        return self::getInstance($modelAlias);
    }

    /**
     * Get binding model by model mapping
     *
     * @return object
     */
    private static function getBindingModel($modelAlias)
    {
        $models = SConfig::get('models');
        dd($models);
        if (array_key_exists($modelAlias, $models)) {
            $model = $models[$modelAlias];
        } else {
            $model = $models['content'];
        }
        $model = $model::getInstance($modelAlias);

        return $model;
    }

}
