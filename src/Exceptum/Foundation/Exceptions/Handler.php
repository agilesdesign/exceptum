<?php

namespace Exceptum\Foundation\Exceptions;

use Exception;
use Exceptum\Facades\Exceptum;
use App\Exceptions\Handler as LaravelHandler;

class Handler extends LaravelHandler
{
	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Exception               $exception
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $exception)
	{
		return Exceptum::render($request, $exception) ?? parent::render($request, $exception);
	}
}