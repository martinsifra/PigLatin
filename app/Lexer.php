<?php

namespace App;

use InvalidArgumentException;

class Lexer
{

	/** @var $string */
	private $input;

	/**
	 * @param string $input
	 * @throws InvalidArgumentException
	 */
	public function __construct($input)
	{
		if (is_string($input)) {
			$this->input = $input;
		} else {
			throw new InvalidArgumentException('Lexer input must be a string!');
		}
	}

	/** @return array */
	public function run()
	{
		$tokens = explode(' ', $this->input);

		foreach ($tokens as $key => $token) {
			if (($word = Other::create($token)) !== NULL) {
				
			} elseif (($word = Vowel::create($token)) !== NULL) {
				
			} elseif (($word = ConsonantCluster::create($token)) !== NULL) {
				
			} elseif (($word = Consonant::create($token)) !== NULL) {
				
			} else {
				$word = $token;
			}

			$tokens[$key] = $word;
		}

		return $tokens;
	}

}
