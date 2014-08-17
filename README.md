Secrypt
=======

Simple Encrypt-Decrypt class for php, nothing fancy

Usage
===

	$secObj=new Secrypt();
	$encrypted=$secObj->encrypt('SanjeevShrestha');
	
	$encryptedString="081095108104099099116081102112099113114102095047052048053095050095055.90";
	$decrypted=$secObj->decrypt($encryptedString);
	
License
===
GPL V2