<?php

namespace App;

use InvalidArgumentException;

/**
 * @author Martin Šifra <me@martinsifra.cz>
 */
class Translator
{

	/** @var array */
	private $tokens;

	public function __construct($tokens)
	{
		if (is_array($tokens)) {
			$this->tokens = $tokens;
		} else {
			throw new InvalidArgumentException('Tokens must be an array!');
		}
	}

	/** @return string */
	public function run()
	{
		$translated = [];

		foreach ($this->tokens as $token) {
			if ($token instanceof TranslatableInterface) {
				$word = $token->translate();
			} else {
				$word = (string) $token;
			}

			$translated[] = $word;
		}

		return implode(' ', $translated);
	}

}
