<?php

namespace app\extensions\watsonc_sigfox\api;

use \app\conf\App;
use \app\inc\Response;
use \app\models\Database;
use \app\conf\Connection;
use \app\inc\Session;
use \app\inc\Input;
use \app\inc\Model;
use \app\models\Table;
use \app\inc\Route;

/**
 * Class Multisearch
 * @package app\extensions\multisearch\api
 */
class Sigfox extends \app\inc\Controller
{
    /**
     * Sigfox constructor.
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function get_index() {
        $sigfox = new \app\extensions\watsonc_sigfox\models\Sigfox();
        $response =$sigfox->store(Input::get());
        return $response;
    }
}