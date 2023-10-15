<?php
require_once(LIB_PATH . DS . 'database.php');

class formstruck
{

	public static function co($type = "", $name = "", $n)
	{
		if($n==0)
		{
		$attributes = "['class' => 'form-control', 'placeholder' => '" . ucfirst($name) . "']";
		}else
		{
			$attributes = "['class' => 'form-control', 'placeholder' => '" . ucfirst($name) . "','required'=> 'required']";	
		}
		$x = 'echo $fo=Form::' . strtolower($type) . '("' . ucfirst($name) . '","' . $name . '",$' . $name . ',' . $attributes . ');' . "		
		";
		return $x;
	}

	public static function text($lable = "", $name = "", $n)
	{
		if ($n == 0) {
			$attributes = "['class' => 'form-control', 'placeholder' => '" . ucfirst($name) . "']";
		} else {
			$attributes = "['class' => 'form-control', 'placeholder' => '" . ucfirst($name) . "','required'=> 'required']";
		}
		$x = 'echo $fo=Form::text("' . ucfirst($lable) . '","' . $name . '",$' . $name . ',"' . $name . '",' . $attributes . ');
		';
		return $x;
	}
	public static function textarea($lable = "", $name = "", $n)
	{
		if ($n == 0) {
			$attributes = "['class' => 'form-control', 'placeholder' => '" . ucfirst($name) . "']";
		} else {
			$attributes = "['class' => 'form-control', 'placeholder' => '" . ucfirst($name) . "','required'=> 'required']";
		}
		$x = 'echo $fo=Form::textarea("' . ucfirst($lable) . '","' . $name . '",$' . $name . ',"' . $name . '",' . $attributes . ');
		';
		return $x;
	}
	public static function select($lable = "", $name = "", $table, $t, $n)
	{
		if ($n == 0) {
			$attributes = "['class' => 'form-control', 'placeholder' => '" . ucfirst($name) . "']";
		} else {
			$attributes = "['class' => 'form-control', 'placeholder' => '" . ucfirst($name) . "','required'=> 'required']";
		}
		$x = 'echo $fo=Form::select("' . ucfirst($lable) . '","' . $name . '","' . $table . '",$' . $t . ',' . $attributes . ');
		';
		return $x;
	}
	public static function image($lable = "", $name = "")
	{
		$m = 'impath';
		$im = 'image';
		$x = 'echo $fo=Forms::img("' . ucfirst($lable) . '","' . $name . '",$' . $m . ',$' . $im . ');
		';
		return $x;
	}
	
}
