<?php

/**
 * \AppserverIo\RemoteMethodInvocation\InitialContextProxy
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @author    Bernhard Wick <bw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/rmi
 * @link      http://www.appserver.io
 */

namespace AppserverIo\RemoteMethodInvocation;

/**
 * Proxy for the container instance itself.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @author    Bernhard Wick <bw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/rmi
 * @link      http://www.appserver.io
 */
class InitialContextProxy extends RemoteProxy
{

    /**
     * Runs a lookup on the container for the class with the
     * passed name.
     *
     * @param string $className  The class name to run the lookup for
     * @param string $proxyClass The class name of the proxy to be created
     *
     * @return \AppserverIo\RemoteMethodInvocation\RemoteObjectInterface The instance
     */
    public function lookup($className, $proxyClass = 'AppserverIo\RemoteMethodInvocation\RemoteProxy')
    {
        return $proxyClass::__create($className)->__setSession($this->__getSession());
    }
}
