<?php

namespace Exceptum\Contracts;

use Exception;

interface Abettor
{
	public function render($request, Exception $exception);
}