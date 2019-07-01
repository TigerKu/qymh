<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use PHPMailer\PHPMailer;
// 应用公共文件

use think\Db;

function get_sys_config(){
    $result = Db::name('system_setting')->select();
    $data = array();
    foreach($result as $key => $value){
        $data[$value['syskey']] = $value['sysvalue'];
    }
    return $data;
}

/**
 * 获取某个商品分类的 儿子 孙子  重子重孙 的 id
 * @param type $cat_id
 */
function getCatGrandson ($nav_id)
{
    $GLOBALS['catGrandson'] = array();
    $GLOBALS['category_id_arr'] = array();
    // 先把自己的id 保存起来
    $GLOBALS['catGrandson'][] = $nav_id;
    // 把整张表找出来
    $GLOBALS['category_id_arr'] = db('nav_category')->cache(true,60)->getField('category_id,pid');
    // 先把所有儿子找出来
    $son_id_arr = db('nav_category')->where("pid", $nav_id)->cache(true,60)->getField('category_id',true);
    foreach($son_id_arr as $k => $v)
    {
        getCatGrandson2($v);
    }
    return $GLOBALS['catGrandson'];
}

/**
 * 递归调用找到 重子重孙
 * @param type $cat_id
 */
function getCatGrandson2($nav_id)
{
    $GLOBALS['catGrandson'][] = $nav_id;
    foreach($GLOBALS['category_id_arr'] as $k => $v)
    {
        // 找到孙子
        if($v == $nav_id)
        {
            getCatGrandson2($k); // 继续找孙子
        }
    }
}



function cate_tree($pid = 0,&$result=array()){
    $data = Db::name('product_category')->where('pid',$pid)->select();
    foreach ($data as $k => $value){
        $result[] = $value;
        cate_tree($value['product_cat_id'],$result);
    }
    return $result;
}

function get_cate_tree($pid = 0,&$result=array()){
    $data = Db::name('product_category')->where('pid',$pid)->select();
    foreach ($data as $k => $value){
        $result[] = $value;
        get_cate_tree($value['product_cat_id'],$result);
    }
    return $result;
}

function get_cate_tree_json($pid = 0,&$result=array()){
    $data = Db::name('product_category')->field('product_cat_id as id,pid as pId,name')->where('pid',$pid)->select();
    foreach ($data as $k => $value){
        $value['open'] = true;
        $result[] = $value;
        get_cate_tree_json($value['id'],$result);
    }
    return $result;
}

function arrow($num){
    for($i = 0; $i <= $num-1; $i++){
        echo "----";
    }
}

function get_cate_tree_wenku($pid = 0,&$result=array()){
    $data = Db::name('wenku_category')->where('pid',$pid)->select();
    foreach ($data as $k => $value){
        $result[] = $value;
        get_cate_tree_wenku($value['wenku_cat_id'],$result);
    }
    return $result;
}

function avatar_lawyer($lawyerid){
    $rs = Db::name('lawyer')->find($lawyerid);
    if($rs['avatar1']){
        echo $rs['avatar1'];
    }else{
        echo '/public/static/h-ui.admin/images/noavatar.gif';
    }
}

function avatar_user($userid){
    $rs = Db::name('user')->find($userid);
    if($rs['avatar1']){
        echo $rs['avatar1'];
    }else{
        echo '/public/static/h-ui.admin/images/noavatar.gif';
    }
}

function get_general($pid = 0){
    $result = Db::name('general_category')->where('pid',$pid)->select();
    return $result;
}

//视频
function get_cate_tree_video($pid = 0,&$result=array()){
    $data = Db::name('video_category')->where('pid',$pid)->select();
    foreach ($data as $k => $value){
        $result[] = $value;
        get_cate_tree_video($value['video_cat_id'],$result);
    }
    return $result;
}
//获取用户用户名
function get_username($id = 0){
    $result = Db::name('user')->where('userid',$id)->find();
    return $result['username'];
}
//获得用户真实姓名
    function get_user_realname($id = 0){
        $result = Db::name('user')->where('userid',$id)->find();
        return $result['realname'];
    }
//获得律师用户姓名
function get_lawyername($id = 0){
    $result = Db::name('lawyer')->where('lawyerid',$id)->find();
    return $result['username'];
}
//获得律师真实姓名
function get_lawyer_realname($id = 0){
    $result = Db::name('lawyer')->where('lawyerid',$id)->find();
    return $result['realname'];
}

//获得用户信息
function get_user_info($id = 0){
    $result = Db::name('user')->where('userid',$id)->find();
    return $result;
}
//获得律师信息
function get_lawyer_info($id = 0){
    $result = Db::name('lawyer')->where('lawyerid',$id)->find();
    return $result;
}

function get_general_name($cat = 0){
    $result = Db::name('general_category')->where('general_cat_id',$cat)->find();
    $rs = $result['name'];
    return $rs;
}

function get_general_html($pid = 0,$name = '',$default='',$classname = 'form-item-select'){
    $result = Db::name('general_category')->where('pid',$pid)->select();
    $select_htm = '<select name="'.$name.'" class="'.$classname.'">';
    $d = '';
    foreach($result as $k => $val){
        if($default == $val['general_cat_id']){ $d = ' selected="selected"';}
        $select_htm .= '<option value="'.$val['general_cat_id'].'"'.$d.'>'.$val['name'].'</option>';
        $d = '';
    }
    $select_htm .= '</select>';
    echo $select_htm;
}

/**
 * 字符截取 支持UTF8/GBK
 * @param $string
 * @param $length
 * @param $dot
 */
function str_cut($string, $length, $dot = '...') {
    $charset = 'utf-8';
    $strlen = strlen($string);
    if($strlen <= $length) return $string;
    $string = str_replace(array(' ','&nbsp;', '&amp;', '&quot;', '&#039;', '&ldquo;', '&rdquo;', '&mdash;', '&lt;', '&gt;', '&middot;', '&hellip;'), array('∵',' ', '&', '"', "'", '“', '”', '—', '<', '>', '·', '…'), $string);
    $strcut = '';
    if(strtolower($charset) == 'utf-8') {
        $length = intval($length-strlen($dot)-$length/3);
        $n = $tn = $noc = 0;
        while($n < strlen($string)) {
            $t = ord($string[$n]);
            if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
                $tn = 1; $n++; $noc++;
            } elseif(194 <= $t && $t <= 223) {
                $tn = 2; $n += 2; $noc += 2;
            } elseif(224 <= $t && $t <= 239) {
                $tn = 3; $n += 3; $noc += 2;
            } elseif(240 <= $t && $t <= 247) {
                $tn = 4; $n += 4; $noc += 2;
            } elseif(248 <= $t && $t <= 251) {
                $tn = 5; $n += 5; $noc += 2;
            } elseif($t == 252 || $t == 253) {
                $tn = 6; $n += 6; $noc += 2;
            } else {
                $n++;
            }
            if($noc >= $length) {
                break;
            }
        }
        if($noc > $length) {
            $n -= $tn;
        }
        $strcut = substr($string, 0, $n);
        $strcut = str_replace(array('∵', '&', '"', "'", '“', '”', '—', '<', '>', '·', '…'), array(' ', '&amp;', '&quot;', '&#039;', '&ldquo;', '&rdquo;', '&mdash;', '&lt;', '&gt;', '&middot;', '&hellip;'), $strcut);
    } else {
        $dotlen = strlen($dot);
        $maxi = $length - $dotlen - 1;
        $current_str = '';
        $search_arr = array('&',' ', '"', "'", '“', '”', '—', '<', '>', '·', '…','∵');
        $replace_arr = array('&amp;','&nbsp;', '&quot;', '&#039;', '&ldquo;', '&rdquo;', '&mdash;', '&lt;', '&gt;', '&middot;', '&hellip;',' ');
        $search_flip = array_flip($search_arr);
        for ($i = 0; $i < $maxi; $i++) {
            $current_str = ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
            if (in_array($current_str, $search_arr)) {
                $key = $search_flip[$current_str];
                $current_str = str_replace($search_arr[$key], $replace_arr[$key], $current_str);
            }
            $strcut .= $current_str;
        }
    }
    return $strcut.$dot;
}

function merge_images($pic_list){
    /**
     * 图片合并
     **/
    $pic_list	 = array_slice($pic_list, 0, 9); // 只操作前9个图片
    $bg_w	 = 751;	// 背景图片宽度
    $bg_h	 = 1124;	// 背景图片高度

    $background	= imagecreatetruecolor($bg_w,$bg_h); // 背景图片
    $color	 = imagecolorallocate($background, 202, 201, 201); // 为真彩色画布创建白色背景，再设置为透明
    imagefill($background, 0, 0, $color);
    imageColorTransparent($background, $color);

    $pic_count	= count($pic_list);
    //$lineArr	= array();	// 需要换行的位置
    $space_x	= 3;
    $space_y	= 3;
    //$line_x	 = 0;

    $start_x	= 250;	// 开始位置X
    $start_y	= 5;	// 开始位置Y
    $pic_w	 = intval($bg_w/3) - 5;	// 宽度
    $pic_h	 = intval($bg_h/$pic_count) - 5;	// 高度
    $lineArr	= array(2,3,4,5);
    $line_x	 = 250;

    $bg	= imagecreatefrompng('http://ctrlidea.hf.mofire.net/public/static/images/meida_bc.png');
    imagecopyresized($background,$bg,0,0,0,0,$bg_w,$bg_h,imagesx($bg),imagesy($bg));

    foreach( $pic_list as $k=>$pic_path ) {
        $kk	= $k + 1;
        if ( in_array($kk, $lineArr) ) {
            $start_x	= $line_x;
            $start_y	= $start_y + $pic_h + $space_y;
        }
        $pathInfo	 = pathinfo($pic_path);
        switch( strtolower($pathInfo['extension']) ) {
            case 'jpg':
            case 'jpeg':
                $imagecreatefromjpeg	= 'imagecreatefromjpeg';
                break;
            case 'png':
                $imagecreatefromjpeg	= 'imagecreatefrompng';
                break;
            case 'gif':
            default:
                $imagecreatefromjpeg	= 'imagecreatefromstring';
                $pic_path	 = file_get_contents($pic_path);
                break;
        }
        $resource	= $imagecreatefromjpeg($pic_path);
        imagecopyresized($background,$resource,$start_x,$start_y,0,0,$pic_w,$pic_h,imagesx($resource),imagesy($resource)); // 最后两个参数为原始图片宽度和高度，倒数两个参数为copy时的图片宽度和高度
        $start_x	= $start_x + $pic_w + $space_x;
    }

    $path = 'data/attachment/matches/'.uniqid().'.jpg';
    header("Content-type: image/jpg");
    imagejpeg($background,$path);
    return '/'.$path;
}
/**
* 为律师增加一定量的经验
* @access public
* @param  int $id 律师id
* @param int $exp 经验增加量
* @return true
*/

function add_exp($id,$exp){
    //经验不能为负
    if($exp < 0){
        return false;
    }
    //在原始的量上加上这次的增加量
    $ad = Db::name('lawyer')
           ->where('lawyerid',$id)
           ->setInc('exp', $exp);
    //成功返回 true 失败返回false      
    if($ad){
        return true;
    }else{
        return false;
    }
}

/**
* 改变律币的值并记录
* @access public
* @param  int $id 律师或用户id
* @param int $coin 律币增加量可以为负 即为减   
* @param  str $str 律币增减的记录
* @param str $type 具体是律师还是用户 只能是'l'律师或'u'用户
* @return true
*/
function change_coin($id,$coin,$str,$type){
    //判断是律师还是用户，参数错误返回false
    if($type =='u'){
        $table = 'user';
    }elseif($type =='l'){
        $table = 'lawyer';
    }else{
        return false;
    }
    //如果减少量大于拥有量 返回false
    $co = Db::name($table)
         ->where($table.'id',$id)
         ->field('coin')
         ->find();
    $co['coin'] = $co['coin'] + $coin;
    if($co['coin'] < 0){
        return false;
    }
    //改变律币量
    $ad = Db::name($table)
           ->where($table.'id',$id)
           ->update($co);
    //记录这条数据
    $data['log'] = $str;
    $data['amount'] = $coin;
    $data['type'] = $table;
    $data['changedate'] = time();
    $data['id'] = $id;
    $ins = Db::name('coinlog')
           ->insert($data);
    return $ins;
}

/**
* 改变积分的值并记录
* @access public
* @param  int $id 律师或用户id
* @param int $credit 积分增加量可以为负 即为减   
* @param  str $str 积分增减的记录
* @param str $type 具体是律师还是用户 只能是'l'律师或'u'用户
* @return true
*/
function op_credit($id,$credit,$str,$type){
    //判断是律师还是用户，参数错误返回false
    if($type =='u'){
        $table = 'user';
    }elseif($type =='l'){
        $table = 'lawyer';
    }else{
        return false;
    }
    //如果减少量大于拥有量 返回false
    $co = Db::name($table)
         ->where($table.'id',$id)
         ->field('credit')
         ->find();
    $co['credit'] = $co['credit'] + $credit;
    if($co['credit'] < 0){
        return false;
    }
    //改变积分值
    $ad = Db::name($table)
           ->where($table.'id',$id)
           ->update($co);
    //记录这条数据
    $data['log'] = $str;
    $data['amount'] = $credit;
    $data['type'] = $table;
    $data['changedate'] = time();
    $data['id'] = $id;
    $ins = Db::name('creditlog')
           ->insert($data);
    return $ins;
}

/**
 * 发送站内信
 * @access public
 * @param string $send_name 发件人
 * @param string $msg_title 消息标题
 * @param string $msg_content 消息内容
 * @param string $username 收件人
 * @param int $u_type 收件人类型，0：普通用户；1：律师
 * @param int $msg_type 消息类型，0：注册成功通知；1：指定用户
 * @return true
 */
function send_message($send_name,$msg_title,$msg_content,$username,$u_type,$msg_type=1){
    $container_data = [
        'send_name' => $send_name,
        'msg_title' => $msg_title,
        'msg_content' => $msg_content,
        'msg_type' => $msg_type,
        'dateline' => time()
    ];
    $message_data = [
        'receive_name' => $username,
        'receive_type' => $u_type
    ];

    $message_container_id = Db::name('message_container')->insertGetId($container_data);
    if($message_container_id){
        $message_data['message_container_id'] = $message_container_id;
        $ret = Db::name('message')->insert($message_data);
    }
    return $ret;
}
/**
 * 发送手机短信
 * @access public
 * @param string $content 发送内容
 * @param int $mobile 手机号码
 * @return true
 */
function send_sms($content,$mobile){
    $data = get_sys_config();
    $smsapi = $data['sms_server'];   //短信网关
    $user = $data['sms_user'];       //短信平台帐号
    $pass = md5($data['sms_password']);  //短信平台密码
    $content=$content;      //要发送的短信内容
    $sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$mobile."&c=".urlencode($content);
    $result =file_get_contents($sendurl);
    return $result;
}
/**
 * 发送邮箱验证
 * @access public
 * @param string $to 收件人
 * @param string $sub 发送主题
 * @param string $body 发送内容
 * @return true
 */
function send_email($to,$sub,$body,$title='',$attachment='',$filename=''){
    $data = get_sys_config();
    vendor('PHPMailer.PHPMailer');
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->CharSet='UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码
    $mail->SMTPAuth   = true;                  //开启认证
    $mail->Port       = 25;
    $mail->Host       = $data['smtp'];
    $mail->Username   = $data['email_name'];
    $mail->Password   = $data['email_password'];
    //$mail->IsSendmail(); //如果没有sendmail组件就注释掉，否则出现“Could  not execute: /var/qmail/bin/sendmail ”的错误提示
    $mail->AddReplyTo($data['email_name'],"此邮件不需回复！");//回复地址
    $mail->From       = $data['email_name'];
    $mail->FromName   = "律宝法务".$title;
    $to = $to;
    $mail->AddAddress($to);
    $mail->Subject  = $sub;
    $mail->Body = $body;
    //$mail->AltBody    = ""; //当邮件不支持html时备用显示，可以省略
    $mail->WordWrap   = 80; // 设置每行字符串的长度
    //$mail->AddAttachment("d://WWW/XaJianZhuYe/public/abc.doc","name.doc");  //可以添加附件
    if($attachment){
        $mail->AddAttachment($attachment,$filename);
    }
    $mail->IsHTML(true);
    if($mail->Send())
    {  //判断邮件是否发送成功
        return 1;//发送成功
    }else
    {
        return 0;//网络波动，请重新尝试
    }
}

function get_usercenter_menu(){
    $data = [
        [
            'id'=>1,
            'name'=>'账户信息管理',
            'sub'=>[
                  ['pid'=>1,'name'=>'个人资料','url'=>'/index.php/Users/index/profile.html'],
                  ['pid'=>1,'name'=>'账户安全','url'=>'/index.php/Users/index/profile_safe.html']
            ]
        ],
        [
            'id'=>2,
            'name'=>'我的交易',
            'sub'=>[
                ['pid'=>2,'name'=>'法律咨询','url'=>'/index.php/Users/consult/lists.html'],
                ['pid'=>2,'name'=>'约见律师','url'=>'/index.php/Users/appointment/lists.html'],
                ['pid'=>2,'name'=>'文书服务','url'=>'/index.php/Users/writ/lists.html'],
                ['pid'=>2,'name'=>'案件发布','url'=>'/index.php/Users/cases/lists.html'],
                ['pid'=>2,'name'=>'风险防控','url'=>'/index.php/Users/prevention/special_list.html'],
                ['pid'=>2,'name'=>'法律讲座','url'=>'/index.php/Users/lecture/special_list.html'],
                ['pid'=>2,'name'=>'法律宣传','url'=>'/index.php/Users/agent/special_list.html'],
            ]
        ],
        [
            'id'=>3,
            'name'=>'我的收藏夹',
            'sub'=>[
                ['pid'=>3,'name'=>'服务方','url'=>'javascript:;'],
                ['pid'=>3,'name'=>'文书模板','url'=>'/index.php/Users/contract/contract_list.html'],
                ['pid'=>3,'name'=>'文章','url'=>'javascript:;'],
                ['pid'=>3,'name'=>'视频','url'=>'/index.php/Users/lecture/favorites.html'],
                ['pid'=>3,'name'=>'风险防控产品','url'=>'/index.php/Users/prevention/favorites.html']
            ]
        ],
        [
            'id'=>4,
            'name'=>'我的消息',
            'sub'=>[
                ['pid'=>4,'name'=>'收/发件箱','url'=>'/index.php/Users/message/inbox_list.html']
            ]
        ],
        [
            'id'=>5,
            'name'=>'我的财富',
            'sub'=>[
                ['pid'=>5,'name'=>'余额','url'=>'javascript:;'],
                ['pid'=>5,'name'=>'我的律币','url'=>'/index.php/Users/index/coin_log_show.html'],
                ['pid'=>5,'name'=>'我的积分','url'=>'/index.php/Users/index/credit_log_show.html']
            ]
        ],
        [
            'id'=>6,
            'name'=>'我的评价',
            'sub'=>[
                ['pid'=>6,'name'=>'案件评价','url'=>'/index.php/Users/cases/vealuate_list.html'],
                ['pid'=>6,'name'=>'文书评价','url'=>'/index.php/Users/writ/vealuate_list.html'],
                ['pid'=>6,'name'=>'约见律师评价','url'=>'/index.php/Users/appointment/vealuate_list.html'],
                ['pid'=>6,'name'=>'法律讲座评价','url'=>'/index.php/Users/lecture/vealuate_list.html']
            ]
        ],
        [
            'id'=>7,
            'name'=>'我的套餐',
            'sub'=>[
                ['pid'=>7,'name'=>'使用中的套餐','url'=>'/index.php/Users/package/nowuse.html'],
                ['pid'=>7,'name'=>'套餐订单','url'=>'/index.php/Users/package/index.html']
            ]
        ],
        [
            'id'=>8,
            'name'=>'投诉与申诉',
            'sub'=>[
                ['pid'=>8,'name'=>'投诉管理','url'=>'/index.php/Users/complaints/complaint.html'],
                ['pid'=>8,'name'=>'申诉管理','url'=>'/index.php/Users/complaints/appeal.html']
            ]
        ]
    ];
    return $data;
}
function get_lawyercenter_menu(){
    $data = [
        [
            'id'=>1,
            'name'=>'账户信息管理',
            'sub'=>[
                ['pid'=>1,'name'=>'个人资料','url'=>'/index.php/Lawyer/index/profile.html'],
                ['pid'=>1,'name'=>'账户安全','url'=>'/index.php/Lawyer/index/profile_safe.html']
            ]
        ],
        [
            'id'=>2,
            'name'=>'我的服务记录',
            'sub'=>[
                ['pid'=>2,'name'=>'咨询服务','url'=>'/index.php/Lawyer/consult/lists.html'],
                ['pid'=>2,'name'=>'约见律师','url'=>'/index.php/Lawyer/appointment/lists.html'],
                ['pid'=>2,'name'=>'文书服务','url'=>'/index.php/Lawyer/writ/lists.html'],
                ['pid'=>2,'name'=>'案件发布','url'=>'/index.php/Lawyer/cases/lists.html'],
                //['pid'=>2,'name'=>'风险防控','url'=>'javascript:;'],
                ['pid'=>2,'name'=>'法律讲座','url'=>'/index.php/Lawyer/lecture/lists.html'],
                //['pid'=>2,'name'=>'法律宣传','url'=>'javascript:;'],
            ]
        ],
        [
            'id'=>3,
            'name'=>'我的收藏夹',
            'sub'=>[
                //['pid'=>3,'name'=>'服务方','url'=>'javascript:;'],
                //['pid'=>3,'name'=>'文书模板','url'=>'javascript:;'],
                ['pid'=>3,'name'=>'文章','url'=>'javascript:;']
            ]
        ],
        [
            'id'=>4,
            'name'=>'我的投稿',
            'sub'=>[
                ['pid'=>4,'name'=>'文书模板','url'=>'/index.php/Lawyer/cases/contract_list.html'],
                ['pid'=>4,'name'=>'典型案例','url'=>'/index.php/Lawyer/cases/model_case.html'],
                ['pid'=>4,'name'=>'讲座资料','url'=>'javascript:;']
            ]
        ],
        [
            'id'=>5,
            'name'=>'我的消息',
            'sub'=>[
                ['pid'=>5,'name'=>'收/发件箱','url'=>'/index.php/Lawyer/message/inbox_list.html']
            ]
        ],
        [
            'id'=>6,
            'name'=>'我的财富',
            'sub'=>[
                ['pid'=>6,'name'=>'余额','url'=>'javascript:;'],
                ['pid'=>6,'name'=>'我的律币','url'=>'/index.php/Lawyer/index/coin_log_show.html'],
                ['pid'=>6,'name'=>'我的积分','url'=>'/index.php/Lawyer/index/credit_log_show.html']
            ]
        ],
        [
            'id'=>7,
            'name'=>'我的评价',
            'sub'=>[
                ['pid'=>7,'name'=>'案件评价','url'=>'/index.php/Lawyer/cases/vealuate_list.html'],
                ['pid'=>7,'name'=>'文书评价','url'=>'/index.php/Lawyer/writ/vealuate_list.html'],
                ['pid'=>7,'name'=>'约见评价','url'=>'/index.php/Lawyer/appointment/vealuate_list.html'],
                ['pid'=>7,'name'=>'讲座评价','url'=>'/index.php/Lawyer/lecture/vealuate_list.html']
            ]
        ],
        [
            'id'=>8,
            'name'=>'投诉与申诉',
            'sub'=>[
                ['pid'=>8,'name'=>'投诉管理','url'=>'/index.php/Lawyer/complaints/complaint.html'],
                ['pid'=>8,'name'=>'申诉管理','url'=>'/index.php/Lawyer/complaints/appeal.html']
            ]
        ]
    ];
    return $data;
}
