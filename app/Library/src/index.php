<?php

require_once __DIR__ . "/SmsSenderUtil.php";
require_once __DIR__ . "/SmsSingleSender.php";
require_once __DIR__ . "/SmsMultiSender.php";
require_once __DIR__ . "/SmsStatusPuller.php";
require_once __DIR__ . "/SmsMobileStatusPuller.php";
require_once __DIR__ . "/SmsVoicePromptSender.php";
require_once __DIR__ . "/SmsVoiceVerifyCodeSender.php";

require_once __DIR__ . "/VoiceFileUploader.php";
require_once __DIR__ . "/FileVoiceSender.php";
require_once __DIR__ . "/TtsVoiceSender.php";

use Qcloud\Sms\SmsSingleSender;



try {

	// 短信应用SDK AppID
	$appid = 1400231589; // 1400开头

	// 短信应用SDK AppKey
	$appkey = "efd946dc7c589652a212d7530208c359";

	// 需要发送短信的手机号码
	$phoneNumbers = "19920140051";

	// 短信模板ID，需要在短信应用中申请
	$templateId = 371369;  // NOTE: 这里的模板ID`7839`只是一个示例，真实的模板ID需要在短信控制台中申请

	// 签名
	$smsSign = "一根头发"; // NOTE: 这里的签名只是示例，请使用真实的已申请的签名，签名参数使用的是`签名内容`，而不是`签名ID`
	$yanzheng=rand(10,99);
	
	$_SESSION["yanzheng"]=$yanzheng;
	echo $yanzheng;
	echo $_SESSION["yanzheng"];

    $ssender = new SmsSingleSender($appid, $appkey);
    $params = array($yanzheng,'1');
    $result = $ssender->sendWithParam("86", $phoneNumbers, $templateId,
        $params, $smsSign, "", "");  // 签名参数未提供或者为空时，会使用默认签名发送短信
    $rsp = json_decode($result);
    var_dump($rsp);
} catch(\Exception $e) {
    echo var_dump($e);
}