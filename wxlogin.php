<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wxa3b22cc835b53e05", "89161de1080ad94fd65d1acceed5de10");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
<div class="app"></div>
<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script>
  $(document).ready(function () {
      var wx_appId = '<?php echo $signPackage["appId"];?>';
      window.location.href="https://open.weixin.qq.com/connect/oauth2/authorize?appid="+wx_appId+"&redirect_uri=http%3A%2F%2Flefans.com%2FgetUser.php&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
  });
</script>
</body>
</html>
