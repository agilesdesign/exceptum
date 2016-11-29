<?php

namespace Exceptum\Facades;

use Exceptum\Contracts\Repository;
use Illuminate\Support\Facades\Facade;

class Exceptum extends Facade
{
	public static function getFacadeAccessor()
	{
		return Repository::class;
	}
}