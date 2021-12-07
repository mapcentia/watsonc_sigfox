<?php

namespace app\extensions\watsonc_sigfox\models;

use app\inc\Model;
use app\conf\Connection;
use app\conf\App;
use app\inc\Util;

/**
 * Class Sigfox
 * @package app\extensions\watsonc_sigfox\models
 */
class Sigfox extends Model
{
    /**
     * Sigfox constructor.
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $data
     * @return array
     */
    public function store($data)
    {

        $response = [];
        $rel = "sensor.sensordata_sigfox";
        $sql = "INSERT INTO {$rel} (terminalid, value, timeofmeas) VALUES (:terminalid, :value, :timeofmeas)";
        $res = $this->prepare($sql);
        try {
            $res->execute(["terminalid" => $data["id"], "value" => $data["data"], "timeofmeas" => $data["time"]]);
        } catch (\PDOException $e) {
            $response['message'] = $e->getMessage();
            $response['success'] = false;
            $response['code'] = "400";
            $response['data'] = $data;
            return $response;
        }
        $response['message'] = "";
        $response['success'] = true;
        $response['data'] = $data;
        return $response;
    }
}
