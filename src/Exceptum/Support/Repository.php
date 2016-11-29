<?php

namespace Exceptum\Support;

use Exception;
use App\Exceptions\Handler;
use Exceptum\Contracts\Repository as RepositoryContract;

class Repository implements RepositoryContract
{
	protected $map;

	protected $handler;

	/**
	 * Repository constructor.
	 *
	 * @param \App\Exceptions\Handler $laravelHandler
	 */
	public function __construct(Handler $handler)
	{
		$this->handler = $handler;
	}

	/**
	 * Add Excetion -> Abettor mapping
	 *
	 * @param string $exception
	 * @param string $abettor
	 */
	public function map(string $exception, string $abettor)
	{
		$this->map[$exception] = $abettor;
	}

	/**
	 * Resolve the appropriate Exception Handler
	 *
	 * @param \Exception $exception
	 *
	 * @return \App\Exceptions\Handler
	 */
	public function resolve(Exception $exception)
	{
		if($abettor = $this->getAbettor($exception))
		{
			return new $abettor;
		}

		return $this->handler;
	}

	/**
	 * Retrieve Abettor from Exception Map
	 *
	 * @param \Exception $exception
	 *
	 * @return mixed
	 */
	protected function getAbettor(Exception $exception)
	{
		return collect($this->map)->pull(get_class($exception));
	}

	/**
	 * Render Exception
	 *
	 * @param            $request
	 * @param \Exception $exception
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $exception)
	{
		return $this->resolve($exception)->render($request, $exception) ?? parent::render($request, $exception);
	}
}
