<?php 
function sendSMS($mobile,$code,$content)
{
    $_sms = array(
        'user' =>'yqs',
        'pwd' =>'532E198CB71E8658B98D8632B5BB',
        'sign' =>'摇钱树'
    );
    $content = "您的验证码是：$code ，请勿向任何人提供您收到的短信验证码";

    $flag = 0;
    $params='';//要post的数据
    $argv = array(
        'name'=> $_sms['user'],     //必填参数。用户账号
        'pwd'=> $_sms['pwd'],     //必填参数。（web平台：基本资料中的接口密码）
        'content'=>$content,   //必填参数。发送内容（1-500 个汉字）UTF-8编码
        'mobile'=>$mobile,   //必填参数。手机号码。多个以英文逗号隔开
        //'stime'=>'',   //可选参数。发送时间，填写时已填写的时间发送，不填时为当前时间发送
        'sign'=> $_sms['sign'],    //必填参数。用户签名。
        'type'=>'pt',  //必填参数。固定值 pt
        //'extno'=>''    //可选参数，扩展码，用户定义扩展码，只能为数字
    );
    foreach ($argv as $key=>$value) {
        if ($flag!=0) {
            $params .= "&";
            $flag = 1;
        }
        $params.= $key."="; $params.= urlencode($value);// urlencode($value);
        $flag = 1;
    }
    $url = "http://web.cr6868.com/asmx/smsservice.aspx?".$params; //提交的url地址
    //echo 'file_get_contents($url)';
    $con= substr(file_get_contents($url),0,1);  //获取信息发送后的状态
    if($con == '0'){
        return true;
    }else{
        return false;
    }
}

sendSMS(18678199939,123456,'');

 ?>