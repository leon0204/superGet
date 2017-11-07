# Superget 轻量级工具

## For get everthing.

![icon](https://cdn0.iconfinder.com/data/icons/black-icon-social-media/256/099280-blinklist-logo.png)

# Via   `Composer`

- bash
- `composer` require `leon0204/superget` dev-master (推荐)

- php
- $superget = new SuperGet\SuperGet;



# 更新日志
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/) 
and this project adheres to [Semantic Versioning](http://semver.org/).

## [0.1.0] - 2017-1-16
### 添加基础配置
- INIT add base config@leon0204.
- Model add base model.etc,Catch,Img,Article.@leon0204.

## [0.1.1] - 2017-1-17
### 添加快照
- ADD curl -snapshot @leon0204

## [0.1.2] - 2017-1-29
### 添加邮件发送
- ADD `email` send - `email` @leon0204

- `composer` require `phpmailer/phpmailer`  `dev-master` 
- 使用案例

```      
use `SuperGet\Utils`  as `Utils`;

//必填参数
$params['username'] = '邮箱号';
$params['password'] = '设置SMTP服务密码，注意不是邮箱密码';
$params['port'] = 25;  //设置端口号
$params['host'] = 'smtp.qq.com';  //邮件服务器

$params['subject'] = '邮件标题';
$params['text'] = '邮件正文';//可以设置成带css的html内容

$params['sendTo'] = '收件邮箱';
$params['sendNick'] = '发件人昵称';
$params['sendToNick'] = '收件人昵称';



//选填参数
$params['filePath'] = '';//附件路径
$params['fileName'] = '';//附件名称
$params['picPath'] = '';//图片路径
$params['picName'] = '';//图片名称


$send  =  Utils\SendEmail::send($params);
```
