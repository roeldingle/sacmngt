<?php


class Helper{


	function generateCode($prefix, $lenght){

		return (strtoupper($prefix.'-'.substr(md5(time()), 0, $length)));

	}
}