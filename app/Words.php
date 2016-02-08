<?php

namespace App;

use JsonSerializable;

abstract class Word implements WordInterface, TranslatableInterface, JsonSerializable
{

	/** @var string */
	protected $string;

	/** @var string */
	protected $prefix;

	/** @var string */
	protected $suffix;

	private function __construct($string, $prefix)
	{
		$this->string = $string;
		$this->prefix = $prefix;
		$this->suffix = substr($this->string, strlen($this->prefix));
	}

	/**
	 * @param string $string
	 * @return string|FALSE
	 */
	static function isValid($string)
	{
		if (preg_match('/^' . static::RE . '/i', $string, $prefix) === 1) {
			return $prefix[0];
		}

		return FALSE;
	}

	/**
	 * @param string $string
	 * @return Consonant|ConsonantCluster|Vowel|Other|NULL
	 */
	static function create($string)
	{
		$prefix = static::isValid($string);
		if ($prefix !== FALSE) {
			$class = get_called_class();
			return new $class($string, $prefix);
		}

		return NULL;
	}

	public function jsonSerialize()
	{
		return $this->string;
	}

}

class Consonant extends Word
{

	const RE = '[bcdfghjklmnpqrstvwxyz]{1}';

	public function translate()
	{
		return $this->suffix . $this->prefix . 'ay';
	}

}

class ConsonantCluster extends Word
{

	const RE = '[bcdfghjklmnpqrstvwxz]{2,3}';

	public function translate()
	{
		return $this->suffix . $this->prefix . 'ay';
	}

}

class Other extends Word
{

	const RE = '(qu){1}';

	public function translate()
	{
		return $this->suffix . $this->prefix . 'ay';
	}

}

class Vowel extends Word
{

	const RE = '[aeiou]{1}';

	public function translate()
	{
		return $this->string . 'way';
	}

}

interface WordInterface
{

	/** @return string|FALSE */
	static function isValid($string);
}

interface TranslatableInterface
{

	/** @return string */
	function translate();
}
