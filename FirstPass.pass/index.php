<?php

	if($_POST['name'] != "" && $_POST['rabatt'] != "") {
		
		require_once('PKPass.php');
		
		$pass = new PKPass();
		
		$pass->setCertificate('CertifPass.p12');
		$pass->setCertificatePassword('22568771');
		
		$pass->setWWDRcertPath('CertifPass.pem');
		
		$pass->setJSON('{
		  "formatVersion" : 1,
		  "passTypeIdentifier" : "pass.com.Ibrst.FirstPass",
		  "serialNumber" : "1654",
		  "teamIdentifier" : "XKGM46C43S",
		  "webServiceURL" : "https://example.com/passes/",
		  "authenticationToken" : "vxwxd7J8AlNNFPS8k0a0FfUFtq0ewzFdc",
		  "barcode" : {
		    "message" : "12345",
		    "format" : "PKBarcodeFormatQR",
		    "messageEncoding" : "iso-8859-1"
		  },
		  "locations" : [
		    {
		      "longitude" : -122.3748889,
		      "latitude" : 37.6189722
		    },
		    {
		      "longitude" : -122.03118,
		      "latitude" : 37.33182
		    }
		  ],
		  "organizationName" : "Nilz",
		  "logoText" : "Nilz",
		  "description" : "'. $_POST['rabatt'] .' % auf alles außer Tiernahrung",
		  "foregroundColor" : "rgb(255, 255, 255)",
		  "backgroundColor" : "rgb(206, 200, 0)",
		  "coupon" : {
		    "primaryFields" : [
		      {
		        "key" : "offer",
		        "label" : "auf alles außer Tiernahrung",
		        "value" : "'. $_POST['rabatt'] .'%"
		      }
		    ],
		    "auxiliaryFields" : [
		      {
		        "key" : "name",
		        "label" : "Name",
		        "value" : "'. $_POST['name'] .'"
		      }
		    ]
		  }
		}');
		
		$pass->addFile('icon.png');
		$pass->addFile('icon@2x.png');
		$pass->addFile('logo.png');
		$pass->addFile('logo@2x.png');
		
		if($pass->create(true) == false) {
			echo 'Fehler: ' . $pass->getError();
		}
		
		echo "Pass erstellen";
		exit;
		
	}
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="language" content="de" />

	</head>
	<body>
		<form method="post" action="index.php">

			<input name="rabatt" placeholder="Rabatt-Wert" type="number"> % <br>
			<input name="name" placeholder="Name" type="text"><br><br>
			
			<input type="submit" value="Pass erstellen">
		
		
		</form>
	</body>
</html>


