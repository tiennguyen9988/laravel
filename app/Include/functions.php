<?php
	function stripInicode($str){
		
	}
	function changeTitle($str){
		$str = trim($str);
		if($str=="") return "";
		$str =str_replace('"','',$str);
		$str =str_replace("'",'',$str);
		$str =stripInicode($str);
		$str =mb_convert_case($str,MB_CASE_LOWER,'utf-8');
		// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
		$str =str_replace(' ','-',$str);
		return $str;
	}
	function cate_parent($data,$parent=0,$str="--",$select=0){		
		foreach ($data as $key => $value) {
			$id = $value["id"];
			$name = $value['name'];
			$parent_id = $value["parent_id"];
			if($parent_id == $parent){
				if($select!=0 && $id==$select){
					echo "<option value='$id' selected='selected'>$str $name</option>";
				}else{
					echo "<option value='$id'>$str $name</option>";
				}				
				cate_parent($data, $id, $str."--", $select);
			}			
		}
	}
?>