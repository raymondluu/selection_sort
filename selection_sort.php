<?php
set_time_limit(60);

function selection_sort($arr){
	$temp_arr = $arr;
	
	for($i = 0; $i < count($temp_arr); $i++){
		$min = $temp_arr[$i];
		
		for($j = $i; $j < count($temp_arr); $j++){
			if($temp_arr[$j] <= $min){
				$min = $temp_arr[$j];
				$min_index = $j;
			}
		}
		$temp_num = $temp_arr[$i];
		$temp_arr[$i] = $temp_arr[$min_index];
		$temp_arr[$min_index] = $temp_num;
	}

	return $temp_arr;
}

function modified_selection_sort($arr){
	for($i = 0; $i < count($arr); $i++){	
		$min = $arr[$i];
		$max = $arr[$i];
		$min_index = $i;
		$max_index = $i;

		for($j = $i; $j < count($arr) - $i; $j++){
			if($arr[$j] < $min){
				$min = $arr[$j];
				$min_index = $j;
			}
			else if($arr[$j] > $max){
				$max = $arr[$j];
				$max_index = $j;
			}
		}

		if($max != $min){
			if($arr[$i] == $max){
				$max_index = $min_index;
			}

			$arr[$min_index] = $arr[$i];
			$arr[$i] = $min;
			
			$arr[$max_index] = $arr[count($arr) - 1 - $i];
			$arr[count($arr) - 1 - $i] = $max;
		}
		else{
			$i = count($arr);
		}
	}
	return $arr;
}

function arr_with_100_rand(){
	$arr = array();

	for($i = 0; $i < 101; $i++){
		array_push($arr, rand(0,10000));
	}

	return $arr;
}

function arr_with_10000_rand(){
	$arr = array();

	for($i = 0; $i < 10001; $i++){
		array_push($arr, rand(0,10000));
	}

	return $arr;
}

$start_time = microtime(true);

//$my_arr = array(8, 5, 2, 6, 9, 3, 1, 4, 0, 7);
// $my_arr2 = selection_sort($my_arr);

//$my_arr3 = arr_with_100_rand();
//$my_arr4 = selection_sort($my_arr3);

///$my_arr5 = modified_selection_sort($my_arr);
//$my_arr6 = modified_selection_sort($my_arr3);

$my_arr7 = arr_with_10000_rand();
$my_arr8 = modified_selection_sort($my_arr7);

$end_time = microtime(true);
$total_time = $end_time - $start_time;

echo "It took " . round($total_time) . " seconds to execute";
// var_dump($my_arr);
// var_dump($my_arr2);
// var_dump($my_arr3);
// var_dump($my_arr4);
// var_dump($my_arr5);
// var_dump($my_arr6);

?>