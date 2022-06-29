<?php

if( !empty($argv[1]) ){
	if (!file_exists($argv[1]) ) {
		exit( "Fayl topilmadi".PHP_EOL );
	}
	$film = file_get_contents($argv[1]);
	$lines = explode(PHP_EOL, $film);
	$frames = array_chunk($lines, 14);

	foreach ($frames as $frame) {
		$timeout = preg_replace('/\D/', '',  $frame[0]);
		$frame[0] = preg_replace('/^'.$timeout.'/', '', $frame[0]);
		system( 'clear' );
		foreach ($frame as $line) echo $line.PHP_EOL;
		usleep( floor( ($timeout * 100000) ) );
	}
}else{
	exit( "Fayl ko'rsatilmadi".PHP_EOL );
}
