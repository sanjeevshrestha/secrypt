<?php
/**
* Simple class to encrypt and decrypt strings
* @author Sanjeev Shrestha
* @package Secrypt
* date August 17 2014
*/

class Secrypt
{

	private $secretseed='UcGvS3HD9BoL16jlPX9xfgm0Vvg8SjjMwZhp3Z2cArYBxhXne6'; 


	/**
	*
	*/
	public function __construct($secret='')
	{
		if(!empty($secret))
		{
			$this->secretseed=$secret;
		}

	}

	/**
	*
	*/
	public function setSecret($secret='')
	{
		if(!empty($secret))
		{
			$this->secretseed=$secret;
		}
	}

	/**
	*
	*/
	public function encrypt($string='')
	{
		//
		$sechash=hash('crc32', $this->secretseed);
		$encryptstring=$string.$sechash;

		$length=strlen($encryptstring);

		$offsetnumber=rand(1,9);

		$offsettedstring=array();

		$i=0;
		while($i<$length)
		{
			$offsettedstring[$i]=sprintf('%03d',(ord($encryptstring[$i]) - $offsetnumber));

			$i++;
		}

		$encrypted = implode('', $offsettedstring) . '.' . (ord($offsetnumber)+40);
		return $encrypted;
	}


/**
* Decrypt the string
*/
	public function decrypt($string='')
	{
  		$sec_string = explode(".", $string);// splits up the string to any array with .
  		$calc = $sec_string[1]-40;

  		$randkey = chr($calc); // works out the randkey number

  		$ax=chunk_split($sec_string[0],3,'|');
  		$a=explode('|',$ax);
  		$i = 0;

  		$decrypted='';

  		$y=count($a);
  		while ($i < $y)
  		{
    		$array[$i] = $a[$i]+$randkey;  // Works out the ascii characters actual numbers
    		$decrypted .= chr($array[$i]); //The actual decryption

    		$i++;
		};

		$sechash=hash('crc32', $this->secretseed);
		$return=str_replace($sechash,'',$decrypted);
		return $return;
	}
}