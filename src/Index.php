<?php
/**
 * Created by PhpStorm.
 * User: 小灰灰
 * Date: 2022-06-29
 * Time: 15:45:55
 * Info:
 */

namespace xianrenqh\ApiDocWebman;

use xianrenqh\ApiDocWebman\ApiDoc;
use xianrenqh\ApiDocWebman\BootstrapApiDoc;

class Index
{

    public function index()
    {
        $api = new BootstrapApiDoc();
        $doc = $api->getHtml();

        return $doc;
    }

}
