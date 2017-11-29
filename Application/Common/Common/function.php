<?php
/**
 * 字符串截取，支持中文和其他编码
 * static 
 * access public
 * @param string $str 需要转换的字符串
 * @param string $start 开始位置
 * @param string $length 截取长度
 * @param string $charset 编码格式
 * @param string $suffix 截断显示字符
 * return string
 */
function msubstr($str,$start=0,$length,$charset="utf-8",$suffix=true){
    if (function_exists("mb_substr")){
        $slice=mb_substr($str,$start,$length,$charset);
    }elseif (function_exists('iconv_substr')){
        $slice = iconv_substr($str,$start,$length,$charset);
        if (false === $slice){
            $slice = '';
        }
    }else {
        $re['utf-8']="/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
        $re['gb2312']="/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
        $re['gbk']="/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
        $re['big5']="/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
        preg_match_all($re[$charset],$str,$match);
        $slice = join("",array_slice($match[0],$start,$length));
    }
    if (strlen($str)<$length){
        return $str;
    }
    return $suffix?$slice.'...':$slice;
}




/**
 * TODO 基础分页的相同代码封装，使前台的代码更少
 * @param $count 要分页的总记录数
 * @param int $pagesize 每页查询条数
 * @return \Think\Page
 */
function getpage($count, $pagesize = 8) {
    $p = new Think\Page($count, $pagesize);
    $p->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
    $p->setConfig('prev', '上一页');
    $p->setConfig('next', '下一页');
    $p->setConfig('last', '末页');
    $p->setConfig('first', '首页');
    $p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
    $p->lastSuffix = false;//最后一页不显示为总页数
    return $p;
}
//是否有session
function islogin(){
    if(!$_SESSION['account']){
        redirect(U('Home/index/login'));
    }
}

?>