<?php

namespace SuperGet\Utils;

/**
 * Class SendEmail
 * @package SuperGet\Utils
 * send 模板 email
 * @param $password smtp的token
 */
class SendEmail
{
    public static function send($params)
    {
        $mail = new \PHPMailer(true); // notice the \  you have to use root namespace here
        try {
            $mail->isSMTP(); // tell to use smtp

            $mail->CharSet = "utf-8"; // set charset to utf8
            $mail->SMTPAuth = true;  // use smpt auth
            $mail->SMTPSecure = "tls"; // or ssl
            $mail->Host =  $params['host'];

            $mail->Port = $params['port'];
            $mail->Username = $params['username'];
            $mail->Password = $params['password'];
            $mail->setFrom($params['username'], $params['sendNick']);//设置邮件来源

            //标题
            $mail->Subject = empty($params['subject'])?  "你好，这是一封测试的邮件" : $params['subject'];
            //文字部分
//            $mail->MsgHTML("正文：你好啊");
            //设置html
            $mail->ishtml(false);

            //添加图片
            if (isset($params['picPath']) &&!empty($params['picPath'])) $mail->AddEmbeddedImage($params['picPath'], "my-attach",$params['picName']); //设置邮件中的图片

            //邮件主体内容
            if (isset($params['text']) &&!empty($params['text'])){
                $mail->Body =$params['text'];
            }else{
                $mail->Body =
                    '
              <a href="http://www.leon0204.com"><font size="10px" color="blue" >你好！</font> <br/><br/> </a>  
              <a href="http://www.leon0204.com"> <img alt="helloweba"   src="cid:my-attach"></a> 
                ';
            }
            //添加附件
            if (isset($params['filePath']) &&!empty($params['filePath'])) $mail->addattachment($params['filePath'], $params['fileName']); // (path,show-name)

            $mail->addAddress($params['sendTo'],$params['sendToNick']);
            $mail->send();
        } catch (phpmailerException $e) {
            dd($e);
        } catch (Exception $e) {
            dd($e);
        }
        echo('send success');
    }
}
