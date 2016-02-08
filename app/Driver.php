<?php

namespace App;

/**
 * @author Martin Šifra <me@martinsifra.cz>
 */
class Driver
{

	/** @var string */
	private $input = '';

	public function run()
	{
		$this->input = filter_input(INPUT_POST, 'english', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

		if (isset($this->input)) {
			$lexer = new Lexer($this->input);
			$tokens = $lexer->run();

			$translator = new Translator($tokens);
			$result = $translator->run();

			if ($this->isAjax()) {
				$this->sendPayload($result);
			}
		}
	}

	public function getInput()
	{
		return $this->input;
	}

	/** @return bool */
	private function isAjax()
	{
		$xmlHttpRequest = filter_input(INPUT_SERVER, 'HTTP_X_REQUESTED_WITH', FILTER_SANITIZE_STRING);

		if (isset($xmlHttpRequest) && ($xmlHttpRequest == 'XMLHttpRequest')) {
			return TRUE;
		}

		return FALSE;
	}

	/** @param mixed $data */
	private function sendPayload($data)
	{
		echo json_encode($data);
		exit();
	}

}
