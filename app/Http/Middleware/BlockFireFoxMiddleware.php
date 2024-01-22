<?php


namespace App\Http\Middleware;

use hisorange\BrowserDetect\Parser as Browser;
use App\Http\Middleware\Contract\MiddlewareInterface;

class BlockFireFoxMiddleware implements MiddlewareInterface
{

    public function handle()
    {
        // request is global type
        // global $request;
        // var_dump($request);
        if (Browser::isDesktop()) {
            if (Browser::isFirefox()) {
                die('You do not have access with this browser , FireFox Blocked');
            }
        }


    }
}