<?php

namespace Exceptum\Contracts;

interface Repository
{
	public function map(string $exception, string $handler);
}
