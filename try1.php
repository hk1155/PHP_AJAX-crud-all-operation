<?php
/*class Demo {
  public $name;
  public $color;


  function get_name($n) {
    
    echo $n;
    echo '<br>';
  }

  function hke($value)
  {
  	echo $value;
  }
}

$demo = new Demo();
$demo->get_name('apple');
$demo->hke(2222);*/

function hke($value)
{
	$check = var_dump($value);
	echo $check;
	// if($value>0&&$value<=20)
	// {
	// 	$value=$value+5;
	// }
	// else
	// {
	// 	$value=$value+10;
	// 	$value=$value*2;
	// }
	// echo $value;
}

function hkd($dvalue)
{
	if ($dvalue > 0 && $dvalue <= 20) {
		$dvalue = $dvalue - 5;
	} else {
		$dvalue = $dvalue / 2;
		$dvalue = $dvalue - 10;
	}
	echo $dvalue;
}
