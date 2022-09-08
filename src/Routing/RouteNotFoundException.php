<?php

namespace Routing;


class RouteNotFoundException extends \Exception
{
    public function __construct(string $uri)
    {
       if(!empty($uri)){
           $this->message = "La page que vous cherchez n'existe pas.(URI : $uri)";
       }

    }
}