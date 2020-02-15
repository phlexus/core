<?php

/**
 * This file is part of the Phlexus CMS.
 *
 * (c) Phlexus CMS <cms@phlexus.io>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phlexus\Providers;

use Phalcon\Session\Manager;
use Phalcon\Session\Adapter\Stream;

class SessionProvider extends AbstractProvider
{
    /**
     * Provider name
     *
     * @var string
     */
    protected $providerName = 'session';

    /**
     * Register application service.
     *
     * @psalm-suppress UndefinedMethod
     *
     * @param array $parameters Custom parameters for Service Provider
     * @return void
     */
    public function register(array $parameters = [])
    {
        $this->di->setShared($this->providerName, function () {
            $session = new Manager();
            $session->setAdapter(new Stream(['savePath' => '/tmp']));
            $session->start();

            return $session;
        });
    }
}
