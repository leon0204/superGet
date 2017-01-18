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
    public static function send($username,$password,$subject,$sendTo)
    {
        $mail = new \PHPMailer(true); // notice the \  you have to use root namespace here
        try {
            $mail->isSMTP(); // tell to use smtp

            $mail->CharSet = "utf-8"; // set charset to utf8
            $mail->SMTPAuth = true;  // use smpt auth
            $mail->SMTPSecure = "tls"; // or ssl
            $mail->Host = "smtp.qq.com";

            $mail->Port = 25; // most likely something different for you. This is the mailtrap.io port i use for testing.
            $mail->Username = $username;
            $mail->Password = $password;
            $mail->setFrom($username, "leon0204yo");//设置邮件来源

            //标题
            $mail->Subject = isset($subject)? $subject : "新年到了,想要脱单吗？快点进来看看yo";
            //文字部分
            $mail->MsgHTML("正文");
            //设置html
            $mail->ishtml(false);

            //添加图片
            $mail->AddEmbeddedImage("/var/www/resource/little.jpg", "my-attach", "粉红女郎"); //设置邮件中的图片
            $mail->Body =
                '
              <a href="http://www.wuxixindai.com"><font size="10px" color="red" >海量视频在线观看！点击就送会员</font> <br/><br/> </a>  
              <a href="http://www.wuxixindai.com"> <img alt="helloweba"   src="cid:my-attach"></a> 
                '; //邮件主体内容

            //添加附件
            $mail->addattachment('/var/www/resource/baijie.txt', '福利你懂得！'); // (path,show-name)

            $mail->addAddress($sendTo,"qqisgood");
            $mail->send();
        } catch (phpmailerException $e) {
            dd($e);
        } catch (Exception $e) {
            dd($e);
        }
        die('send success');
    }
}