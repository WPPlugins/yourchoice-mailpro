<?php
class mailpro {

	function __constuct() {

	}

	function getAddressBooks($options) {
    
		$url = "https://api.mailpro.com/v2/addressbook/list.json";
		$fields = array('IDClient'=>$options['IDClient'], 'APIKey'=>$options['APIKey'], 'type'=>1);
		$postFields = '';
		foreach($fields as $key=>$value) {
			$postFields .= $key .'=' . $value . '&';
		}
		rtrim($postFields, '&');

		$options = array(
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER         => false,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_ENCODING       => "",
			CURLOPT_USERAGENT      => "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)",
			CURLOPT_AUTOREFERER    => true,
			CURLOPT_CONNECTTIMEOUT => 120,
			CURLOPT_TIMEOUT        => 120,
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_POST		   => true,
			CURLOPT_POSTFIELDS	   => $postFields,
		);
		$ch      = curl_init( $url );
		curl_setopt_array( $ch, $options );
		$content = curl_exec( $ch );
		$err     = curl_errno( $ch );
		$errmsg  = curl_error( $ch );
		$header  = curl_getinfo( $ch );
		curl_close( $ch );
		return $content;
	}

	function getEmailAddresses($options) {
    
		$url = "https://api.mailpro.com/v2/email/list.json";
		$fields = array('IDClient'=>$options['IDClient'], 'APIKey'=>$options['APIKey'], 'AddressBookID'=>$options['AddressBookID']);
		$postFields = '';
		foreach($fields as $key=>$value) {
			$postFields .= $key .'=' . $value . '&';
		}
		rtrim($postFields, '&');

		$options = array(
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER         => false,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_ENCODING       => "",
			CURLOPT_USERAGENT      => "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)",
			CURLOPT_AUTOREFERER    => true,
			CURLOPT_CONNECTTIMEOUT => 120,
			CURLOPT_TIMEOUT        => 120,
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_POST		   => true,
			CURLOPT_POSTFIELDS	   => $postFields,
		);
		$ch      = curl_init( $url );
		curl_setopt_array( $ch, $options );
		$content = curl_exec( $ch );
		$err     = curl_errno( $ch );
		$errmsg  = curl_error( $ch );
		$header  = curl_getinfo( $ch );
		curl_close( $ch );
		return $content;
	}

	function addEmailAddress($emailAddress, $options, $variables) {

		$concatVariables = implode(", ", $variables);
		$url = "https://api.mailpro.com/v2/email/add.json";
		$fields = array('IDClient'=>$options['IDClient'], 'APIKey'=>$options['APIKey'], 'AddressBookID'=>$options['AddressBookID'], 'emailList'=>$emailAddress . "," . $concatVariables, 'force'=>2);
		$postFields = '';
		foreach($fields as $key=>$value) { 
			$postFields .= $key . '=' . $value . '&';
		}
		rtrim($postFields, '&');
	
		$options = array (
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER         => false,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_ENCODING       => "",
			CURLOPT_USERAGENT      => "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)",
			CURLOPT_AUTOREFERER    => true,
			CURLOPT_CONNECTTIMEOUT => 120,
			CURLOPT_TIMEOUT        => 120,
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_POST		   => true,
			CURLOPT_POSTFIELDS	   => $postFields,
		);
		
		$ch = curl_init( $url );
		curl_setopt_array( $ch, $options );
		$content = curl_exec( $ch );
		$err = curl_errno( $ch );
		$errmsg = curl_error( $ch );
		$header = curl_getinfo( $ch );
		curl_close( $ch );
		return $content;
	}
	
}
?>
