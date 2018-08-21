<?php
	function year_text_arg($year) {
		$year = abs($year);
		$t1 = $year % 10;
		$t2 = $year % 100;

		if(get_locale() == 'ru_RU'){
			$one = 'год';
			$two = 'года';
			$three = 'лет';
		}else{
			$one = 'year';
			$two = 'years';
			$three = 'years';
		}

		return ($t1 == 1 && $t2 != 11 ? $one : ($t1 >= 2 && $t1 <= 4 && ($t2 < 10 || $t2 >= 20) ? $two : $three));
	}
?>