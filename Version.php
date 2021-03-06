<?php

namespace Wednesday;

use Wednesday\Exception\DependentComponentNotFoundException;
use Wednesday\Exception\IncompatibleComponentVersionException;

/**
 * Version class allows to checking the dependencies required
 * and the current version of doctrine extensions
 *
 * @version $Id: 1.8.7 RC2 wednesday $    $Id: 1.8.7 RC2 jameshelly $
  @author James A Helly <james@wednesday-london.com>,  Gediminas Morkevicius <gediminas.morkevicius@gmail.com>
 * @subpackage Version
 * @package Wednesday
 * @link http://tech.wednesday-london.com/GedmoPackaged.1.2.5.html
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
final class Version
{
    /**
     * Current version of extensions
     */
    const VERSION = '1.7.4';

    /**
     * Checks the dependent ORM library components
     * for compatibility
     *
     * @throws DependentComponentNotFoundException
     * @throws IncompatibleComponentVersionException
     */
    public static function checkORMDependencies()
    {
        // doctrine common library
        if (!class_exists('Doctrine\\Common\\Version')) {
            throw new DependentComponentNotFoundException("Doctrine\\Common library is either not registered by autoloader or not installed");
        }
        //var_dump(\Doctrine\Common\Version::compare('2.0.2') === 0);
        if (\Doctrine\Common\Version::compare('2.0.x') < 0 && \Doctrine\Common\Version::compare('2.1') <= 0) {
            throw new IncompatibleComponentVersionException("Doctrine\\Common library is older than expected for these extensions");
        }

        // doctrine dbal library
        if (!class_exists('Doctrine\\DBAL\\Version')) {
            throw new DependentComponentNotFoundException("Doctrine\\DBAL library is either not registered by autoloader or not installed");
        }
        if (\Doctrine\DBAL\Version::compare(self::VERSION) < 0 && \Doctrine\DBAL\Version::compare('2.1') <= 0) {
            throw new IncompatibleComponentVersionException("Doctrine\\DBAL library is older than expected for these extensions");
        }

        // doctrine ORM library
        if (!class_exists('Doctrine\\ORM\\Version')) {
            throw new DependentComponentNotFoundException("Doctrine\\ORM library is either not registered by autoloader or not installed");
        }
        if (\Doctrine\ORM\Version::compare(self::VERSION) < 0 && \Doctrine\ORM\Version::compare('2.1') <= 0) {
            throw new IncompatibleComponentVersionException("Doctrine\\ORM library is older than expected for these extensions");
        }
    }

    /**
     * Checks the dependent ODM MongoDB library components
     * for compatibility
     *
     * @throws DependentComponentNotFoundException
     * @throws IncompatibleComponentVersionException
     */
    public static function checkODMMongoDBDependencies()
    {
        // doctrine common library
        if (!class_exists('Doctrine\\Common\\Version')) {
            throw new DependentComponentNotFoundException("Doctrine\\Common library is either not registered by autoloader or not installed");
        }

        if (\Doctrine\Common\Version::compare('2.0.x') < 0 && \Doctrine\Common\Version::compare('2.1') <= 0) {
            throw new IncompatibleComponentVersionException("Doctrine\\Common library is older than expected for these extensions");
        }

        // doctrine mongodb library
        if (!class_exists('Doctrine\\MongoDB\\Database')) {
            throw new DependentComponentNotFoundException("Doctrine\\MongoDB library is either not registered by autoloader or not installed");
        }

        // doctrine ODM MongoDB library
        if (!class_exists('Doctrine\\ODM\\MongoDB\\Version')) {
            throw new DependentComponentNotFoundException("Doctrine\\ODM\\MongoDB library is either not registered by autoloader or not installed");
        }
        if (\Doctrine\ODM\MongoDB\Version::compare('1.0.0BETA2-DEV') > 0) {
            throw new IncompatibleComponentVersionException("Doctrine\\ODM\\MongoDB library is older than expected for these extensions");
        }
    }
}