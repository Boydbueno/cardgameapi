<?php namespace Cardgameapi\Http;

class Request extends \Illuminate\Http\Request {

	public function wantsXML() {
		$acceptable = $this->getAcceptableContentTypes();

		return isset($acceptable[0]) && $acceptable[0] == 'application/xml';
	}

}