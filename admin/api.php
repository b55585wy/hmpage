<?php
include_once '../usr/inc.php';
$do = isset($_POST['do']) ? $_POST['do'] : '0';
header('Content-Type: application/json');
if($adminlogin!=1){
json(['code' => 0, 'msg' => '未登录！']);
exit();
}
function escape_POST_params() {
    foreach ($_POST as $key => $value) {
        $_POST[$key] = str_replace("'", "\\'", $value);
    }
}
escape_POST_params();
if ($do == "base") {
	if (isset($_POST['user'])  && isset($_POST['pwd']) &&isset($_POST['sitename'])  && isset($_POST['keywords']) && isset($_POST['description'])&& isset($_POST['ico'])&& isset($_POST['logo']) && isset($_POST['beian']) && isset($_POST['tag']) && isset($_POST['time']) && isset($_POST['infor']) && isset($_POST['tcs'])&& isset($_POST['des']) && isset($_POST['title1']) && isset($_POST['title2'])&& isset($_POST['header'])&& isset($_POST['footer'])&& isset($_POST['indexlogo'])&& isset($_POST['leftzyyo'])&& isset($_POST['skill'])&& isset($_POST['maxwidth'])) {
		$sitename = $_POST['sitename'];
		$keywords = $_POST['keywords'];
			$user= $_POST['user'];
		$pwd = $_POST['pwd'];
			$infor = $_POST['infor'];
				$tcs = $_POST['tcs'];
		$description = $_POST['description'];
			$ico = $_POST['ico'];
		
				$logo= $_POST['logo'];
		$beian = $_POST['beian'];
		$tag = $_POST['tag'];
		$time = $_POST['time'];
		$des= $_POST['des'];
		$title1 = $_POST['title1'];
		$title2 = $_POST['title2'];
		$header = $_POST['header'];
		$footer = $_POST['footer'];
		$indexlogo = $_POST['indexlogo'];
		$skill = $_POST['skill'];
		$leftzyyo = $_POST['leftzyyo'];
			$maxwidth = $_POST['maxwidth'];
		$sql = "UPDATE zyyo_data SET user='$user', pwd='$pwd', sitename='{$sitename}',  keywords='$keywords', description='$description', ico='$ico', logo='$logo', beian='$beian', tag='$tag', time='$time',tcs='$tcs', des='$des',infor='$infor', title1='{$title1}', title2='$title2' ,header='$header',footer='$footer',indexlogo='$indexlogo',leftzyyo='$leftzyyo',skill='$skill',maxwidth='$maxwidth' WHERE id=1";
		if (DB::query($sql) == TRUE) {
			json(['code' => 1, 'msg' => '成功！']);
		} else {
			json(['code' => 0, 'msg' => '错误！'.DB::error()]);
		}
	} else {
		json(['code' => 0, 'msg' => '参数不足！']);
	}
} else if ($do == "newproject") {
	if (isset($_POST['name']) && isset($_POST['icon']) && isset($_POST['type'])) {
		$name = $_POST['name'];
		$icon = $_POST['icon'];
		$type = $_POST['type'];
		$sql = "INSERT INTO zyyo_project (name, icon, type) VALUES ('$name', '$icon', '$type')";

		if (@DB::query($sql) == TRUE) {
			json(['code' => 1, 'msg' => '成功！']);
		} else {
			json(['code' => 0, 'msg' => '错误！'.DB::error()]);
		}
	} else {
		json(['code' => 0, 'msg' => '参数不足！']);
	}
} else if ($do == "newitem") {
	if (isset($_POST['name']) && isset($_POST['icon']) && isset($_POST['des']) && isset($_POST['href']) && isset($_POST['project'])) {
		$name = $_POST['name'];
		$icon = $_POST['icon'];
		$des = $_POST['des'];
		$href = $_POST['href'];
		$project = $_POST['project'];
		$sql = "INSERT INTO zyyo_item (name, icon, des, href, project) VALUES ('$name', '$icon', '$des', '$href', '$project')";

		if (@DB::query($sql) == TRUE) {
			json(['code' => 1, 'msg' => '成功！']);
		} else {
			json(['code' => 0, 'msg' => '错误！'.DB::error()]);
		}
	} else {
		json(['code' => 0, 'msg' => '参数不足！']);
	}
} else if ($do == "newicon") {
	if (isset($_POST['name']) && isset($_POST['icon']) && isset($_POST['href']) && isset($_POST['onclick'])) {
		$name = $_POST['name'];
		$icon = $_POST['icon'];
		$href = $_POST['href'];
		$onclick = $_POST['onclick'];
		$sql = "INSERT INTO zyyo_icon (tip, icon,  href, onclick) VALUES ('$name', '$icon',  '$href', '$onclick')";

		if (@DB::query($sql) == TRUE) {
			json(['code' => 1, 'msg' => '成功！']);
		} else {
			json(['code' => 0, 'msg' => '错误！'.DB::error()]);
		}
	} else {
		json(['code' => 0, 'msg' => '参数不足！']);
	}
} else if ($do == "del") {
    if (isset($_POST['c']) && isset($_POST['id'])) {
        $class = $_POST['c'];
        $id = $_POST['id'];

      
        $sql = "DELETE FROM `$class` WHERE `id` = $id";
        if (@DB::query($sql) == TRUE) {
            
			if ($class === 'zyyo_project') {
			    
			    
            $sql1= "DELETE FROM `zyyo_item` WHERE `project` = $id";
            if (@DB::query($sql1) == FALSE) {
                json(['code' => 0, 'msg' => '删除zyyo_item表失败！'.DB::error()]);
            }else{
                json(['code' => 1, 'msg' => '成功！']);
            }
            
            
        }else{
                json(['code' => 1, 'msg' => '成功！']);
            }
        
		} else {
			json(['code' => 0, 'msg' => '错误！'.DB::error()]);
		}

        
        

        
    } else {
        json(['code' => 0, 'msg' => '参数不足！']);
    }
}
else if ($do == "edititem") {
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['icon']) && isset($_POST['des']) && isset($_POST['href']) && isset($_POST['project'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $icon = $_POST['icon'];
        $des = $_POST['des'];
        $href = $_POST['href'];
        $project = $_POST['project'];

        $sql = "UPDATE zyyo_item SET name='$name', icon='$icon', des='$des', href='$href', project='$project' WHERE id='$id'";

        if (@DB::query($sql) == TRUE) {
            json(['code' => 1, 'msg' => '成功！']);
        } else {
            json(['code' => 0, 'msg' => '错误！'.DB::error()]);
        }
    } else {
        json(['code' => 0, 'msg' => '参数不足！']);
    }
} else if ($do == "editproject") {
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['icon']) && isset($_POST['type'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $icon = $_POST['icon'];
        $type = $_POST['type'];

        $sql = "UPDATE zyyo_project SET name='$name', icon='$icon', type='$type' WHERE id='$id'";

        if (@DB::query($sql) == TRUE) {
            json(['code' => 1, 'msg' => '成功！']);
        } else {
            json(['code' => 0, 'msg' => '错误！'.DB::error()]);
        }
    } else {
        json(['code' => 0, 'msg' => '参数不足！']);
    }
} else if ($do == "editicon") {
    if (isset($_POST['id']) && isset($_POST['tip']) && isset($_POST['icon']) && isset($_POST['href']) && isset($_POST['onclick'])) {
        $id = $_POST['id'];
        $tip= $_POST['tip'];
        $icon = $_POST['icon'];
        $href = $_POST['href'];
        $onclick = $_POST['onclick'];

        $sql = "UPDATE zyyo_icon SET tip='$tip', icon='$icon', href='$href', onclick='$onclick' WHERE id='$id'";

        if (@DB::query($sql) == TRUE) {
            json(['code' => 1, 'msg' => '成功！']);
        } else {
            json(['code' => 0, 'msg' => '错误！'.DB::error()]);
        }
    } else {
        json(['code' => 0, 'msg' => '参数不足！']);
    }
}else if ($do == "edittheme") {
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['main_bg_color']) && isset($_POST['main_text_color']) && isset($_POST['gradient']) && isset($_POST['purple_text_color']) && isset($_POST['text_bg_color']) && isset($_POST['item_bg_color']) && isset($_POST['item_hover_color']) && isset($_POST['item_left_title_color']) && isset($_POST['item_left_text_color']) && isset($_POST['footer_text_color']) && isset($_POST['left_tag_item']) && isset($_POST['card_filter']) && isset($_POST['back_filter']) && isset($_POST['back_filter_color'])&& isset($_POST['fill'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $main_bg_color = $_POST['main_bg_color'];
        $main_text_color = $_POST['main_text_color'];
        $gradient = $_POST['gradient'];
        $purple_text_color = $_POST['purple_text_color'];
        $text_bg_color = $_POST['text_bg_color'];
        $item_bg_color = $_POST['item_bg_color'];
        $item_hover_color = $_POST['item_hover_color'];
        $item_left_title_color = $_POST['item_left_title_color'];
        $item_left_text_color = $_POST['item_left_text_color'];
        $footer_text_color = $_POST['footer_text_color'];
        $left_tag_item = $_POST['left_tag_item'];
        $card_filter = $_POST['card_filter'];
        $back_filter = $_POST['back_filter'];
        $back_filter_color = $_POST['back_filter_color'];
$fill = $_POST['fill'];
        $sql = "UPDATE zyyo_theme SET name='$name', main_bg_color='$main_bg_color', main_text_color='$main_text_color', gradient='$gradient', purple_text_color='$purple_text_color', text_bg_color='$text_bg_color', item_bg_color='$item_bg_color', item_hover_color='$item_hover_color', item_left_title_color='$item_left_title_color', item_left_text_color='$item_left_text_color', footer_text_color='$footer_text_color', left_tag_item='$left_tag_item', card_filter='$card_filter', back_filter='$back_filter', back_filter_color='$back_filter_color', fill='$fill' WHERE id='$id'";

        if (@DB::query($sql) == TRUE) {
            json(['code' => 1, 'msg' => '成功！']);
        } else {
            json(['code' => 0, 'msg' => '错误！'.DB::error()]);
        }
    } else {
        json(['code' => 0, 'msg' => '参数不足！']);
    }
}


?>