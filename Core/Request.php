<?php

namespace Core;

class Request
{

    private $req_params;

    function __construct()
    {
        foreach ($_REQUEST as $key => $val) {
            $this->req_params[$key] = htmlspecialchars(stripslashes(trim($val)));
        }
    }

    public function getQueryParams()
    {
        return $this->req_params;
    }
}
