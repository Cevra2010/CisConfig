<?php
namespace CisConfig;

use Carbon\Carbon;
use CisConfig\Exceptions\WrongDatatypeException;
use Illuminate\Support\Facades\DB;
use stdClass;

class Config {

    protected static $configCache;

    /**
     * Load data from database to application cache
     *
     * @return void
     */
    private static function loadConfigToCache() : void {
        self::$configCache = collect();
        $data = DB::table('cis_config')->get();
        foreach($data as $dataSet) {
            self::$configCache->add($dataSet);
        }
    }

    public function __construct()
    {
        if(!self::$configCache) {
            self::loadConfigToCache();
        }
    }

    public function get($configKey) {
        if($value = self::$configCache->where('cis_config_key',$configKey)->first()) {
            return $value->cis_config_value;
        }
        return null;
    }

    public function set($configKey,$configValue = null) {
        $dataSet = self::getDataSet($configKey,$configValue);

        foreach($dataSet as $key => $value) {
            if($this->exists($key)) {
                DB::table('cis_config')
                ->where('cis_config_key',$configKey)
                ->update(['cis_config_value' => $value,'updated_at' => Carbon::now()]);
            }
            else {
                DB::table('cis_config')
                ->insert([
                    'cis_config_key' => $key,
                    'cis_config_value' => $value,
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now(),
                ]);
            }

            self::loadConfigToCache();
        }
    }

    public function exists($configKey) {
        return (self::$configCache->where('cis_config_key',$configKey)->count() > 0) ? true : false;
    }

    private static function getDataSet($configKey,$configValue) {
        $dataSet = [];
        // key, value
        if($configValue !== null){
            $dataSet =  [$configKey => $configValue];
        }

        if($configValue === null) {
            if(!is_array($configKey)) {
                throw new WrongDatatypeException('First var needs to be an array.');
            }

            if(isset($configKey[0]) && isset($configKey[1])) {
                $dataSet = [$configKey[0] => $configKey[1]];
            }
            else {
                $dataSet = $configKey;
            }
        }
        return $dataSet;
    }

    public function forget($configKey) {
        DB::table('cis_config')->where('cis_config_key',$configKey)->delete();
    }
}
