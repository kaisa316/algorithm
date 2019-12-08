<?php

function fn($x) {
	if($x == 1) {
		return 1;
	}
	return $x*fn($x-1);
}

function main() {
	echo fn(3);
}

main();
