<?php

namespace Xn\AdminCK\Polyfill;

use Symfony\Component\HttpKernel\Controller\ArgumentResolverInterface;

class CommandResolver extends \CKSource\CKFinder\CommandResolver implements ArgumentResolverInterface {}
