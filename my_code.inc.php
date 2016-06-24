<?php
	function my_code($str){
		$str = trim(strip_tags($str));
		$patterns = array(
				1=>"[b]",
				2=>"[/b]",
				3=>"[i]",
				4=>"[/i]",
				5=>"[u]",
				6=>"[/u]",
				7=>"[s]",
				8=>"[/s]",
				9=>"[sup]",
				10=>"[/sup]",
				11=>"[sub]",
				12=>"[/sub]",
				13=>"[hr]",
				14=>"[ul]",
				15=>"[/ul]",
				16=>"[ol]",
				17=>"[/ol]",
				18=>"[li]",
				19=>"[/li]",
				20=>"[color=\"",
				21=>"[/color]",
				22=>"[size=\"",
				23=>"[/size]",
				24=>"[center]",
				25=>"[/center]",
				100=>"\"]"
				);
		$replacements = array(
				1=>"<b>",
				2=>"</b>",
				3=>"<i>",
				4=>"</i>",
				5=>"<u>",
				6=>"</u>",
				7=>"<s>",
				8=>"</s>",
				9=>"<sup>",
				10=>"</sup>",
				11=>"<sub>",
				12=>"</sub>",
				13=>"<HR />",
				14=>"<ul>",
				15=>"</ul>",
				16=>"<ol>",
				17=>"</ol>",
				18=>"<li>",
				19=>"</li>",
				20=>"<font color=\"",
				21=>"</font>",
				22=>"<font size=\"",
				23=>"</font>",
				24=>"<center>",
				25=>"</center>",
				100=>"\">"
				);
		return str_replace($patterns, $replacements, $str);
	};
?>