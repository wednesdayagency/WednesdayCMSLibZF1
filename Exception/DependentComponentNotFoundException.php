<?php

namespace Wednesday\Exception;

use Wednesday\Exception;

/**
 * DependentComponentNotFoundException
 *
 * @version    $Id: 1.7.4 RC1 jameshelly $
  @author James A Helly <james@wednesday-london.com>,  Gediminas Morkevicius <gediminas.morkevicius@gmail.com>
 * @package Wednesday.Exception
 * @subpackage DependentComponentNotFoundException
 * @link http://www.gediminasm.org
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class DependentComponentNotFoundException
    extends \RuntimeException
    implements Exception
{}
