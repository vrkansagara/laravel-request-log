<?php

namespace Vrkansagara\LaravelRequestLog\Middleware;

/**
 * @copyright  Copyright (c) 2015-2019 Vallabh Kansagara <vrkansagara@gmail.com>
 * @license    https://opensource.org/licenses/BSD-3-Clause New BSD License
 */


use Closure;
use Vrkansagara\LaraOutPress\LaraOutPress;
use Vrkansagara\LaravelRequestLog\LaravelRequestLog;

class LogAllRequestAndResponseIntoDatabase
{

    public $bufferOldSize;

    public $bufferNewSize;


    /**
     * @var LaraOutPress
     */
    protected $laravelRequestLog;

    /**
     * LogAllRequestAndResponseIntoDatabase constructor.
     * @param LaravelRequestLog $laravelRequestLog
     */
    public function __construct(LaravelRequestLog $laravelRequestLog)
    {
        $this->laravelRequestLog = $laravelRequestLog;
    }


    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$this->laravelRequestLog->isEnabled()) {
            return $next($request);
        }
        $config = $this->laravelRequestLog->getConfig();

        $targetEnvironment = explode(',', $config['target_environment']);

        $appEnvironment = getenv('APP_ENV');

        $response = $next($request);

        if (!in_array($appEnvironment, $targetEnvironment)) {
            return $next($request);
        }

    }

}
