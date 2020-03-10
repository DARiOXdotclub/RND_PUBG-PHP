<?php
	$token = json_decode(file_get_contents(__DIR__."/token.json"),true);
	if ($token[api_key] === "not_set") {
		print_r("API Key is not set, contact System Administrator.");
	}
	if (!ISSET($_GET['type'])){
		print_r("Export Type is not selected, please go back <3");
		exit();
	}
	switch ($_GET['type']) {
		case 'user':
			if(!ISSET($_GET['username'])){
				print_r("Username is not given, please go back <3");
				exit();
			}
			user($_GET['username']);
			break;
		case 'matchID':
			if(!ISSET($_GET['matchID'])){
				print_r("MatchID is not given, please go back <3");
				exit();
			}
			export($_GET['matchID']);
			break;
	}
	
	$config = new Pubg\Config();
	$config->setApiKey('{'.$token.'}');
	$config->setPlatform('{steam}');

	$api = new Pubg\Api($config);

	function getLatestMatchID($username) {
		
	}

	function user($username) {
		$username = "Sergeant_Lemming";
		//Get User Data and Return User Data as a JSON.
		
		$playerService = new Pubg\Player($api);
		$player = $playerService->get('{'.$username.'}');
		print_r($player);
	}

	function export($matchID) {
		// Export MatchID as HTML Table
		
		
	}
?>