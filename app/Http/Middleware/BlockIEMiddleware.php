<?php


namespace App\Http\Middleware;


use App\Http\Middleware\Contract\MiddlewareInterface;
use hisorange\BrowserDetect\Parser as Browser;

class BlockIEMiddleware implements MiddlewareInterface
{

    public function handle()
    {
        // request is global type
        // global $request;
        // var_dump($request);
        // echo 'BlockIE'. '<br/>';

        if (Browser::isDesktop()) {
            if (Browser::isEdge()) {
                die('You do not have access with this browser , IE Blocked');
            }
        }
    }
}