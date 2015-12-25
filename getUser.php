<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wxa3b22cc835b53e05", "89161de1080ad94fd65d1acceed5de10" ,"");
$signPackage = $jssdk->GetSignPackage();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>
            function getUrlParam(name) {
                var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
                var r = window.location.search.substr(1).match(reg); //匹配目标参数
                if (r != null) return unescape(r[2]);
                return null; //返回参数值
            }

            function getAccessTokenUrl(wx_code) {
                var wx_appId = '<?php echo $signPackage["appId"];?>';
                var wx_secret = '89161de1080ad94fd65d1acceed5de10';
                var wx_apiUrl = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" + wx_appId + "&secret=" + wx_secret + "&code=" + wx_code + "&grant_type=authorization_code";
                return wx_apiUrl;
            }
        </script>
    </head>

    <body>
        <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script>
            var jsonData,access_token,open_id;
            var wx_code = getUrlParam("code");
            $("#wx_code").html(getUrlParam("code"));
            $("#wx_state").html(getUrlParam("state"));
            var accessTokenUrl = getAccessTokenUrl(wx_code);
                $.ajax({
                    url: "getJson.php",
                    type: 'POST',
                    async:false,
                    data: {
                        url: accessTokenUrl
                    },
                    success: function (data) {
                        //测试参数值
                        jsonData = $.parseJSON(data);
                        access_token = jsonData.access_token;
                        open_id = jsonData.openid;
                        return access_token;
                    },
                    error: function (e) {
                        alert('ajax hava an error');
                    },
                    complete: function (e) {}
                });
            var userInfoUrl = "https://api.weixin.qq.com/sns/userinfo?access_token=" + access_token + "&openid=" + open_id + "&lang=zh_CN";
            $.ajax({
                    url: "getJson.php",
                    type: 'POST',
                    async:false,
                    data: {
                        url: userInfoUrl
                    },
                    success: function (data) {
                        //测试参数值
                        jsonData = $.parseJSON(data);
                        var userSex;
                        if(jsonData.sex==1){
                            userSex="男";
                        }else{
                            userSex="女";
                        }
						//$("#getTempJson").append("<li>"+jsonData.openid+"</li>");
                        //$("#getTempJson").append("<li>"+jsonData.headimgurl+"</li>");
                        //$("#getTempJson").append("<li>"+jsonData.nickname+"</li>");
                        //$("#getTempJson").append("<li>"+userSex+"</li>");
                        //$("#getTempJson").append("<li>"+jsonData.city+"</li>");
                        //$("#getTempJson").append("<li>"+jsonData.province+"</li>");
                        //$("#getTempJson").append("<li>"+jsonData.country+"</li>");
                    },
                    error: function (e) {
                        alert('ajax hava an error');
                    },
                    complete: function (e) {}
                });
				//var userInsertUrl = "http://lefans.com/userInsert.php?openid="+jsonData.openid + "&nickname=" + jsonData.nickname;
				$.ajax({
                    url: "userInsert.php",
                    type: 'POST',
                    async:false,
                    data: {
                        openid: jsonData.openid
                    },
                    success: function (data) {
                    },
                    error: function (e) {
                        alert('ajax hava an error');
                    },
                    complete: function (e) {
						}
                });
        </script>
        <div class="buttons"><a href="wx-join-team.php" class="btn"></a></div>
    </body>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script>
        wx.config({
            debug: false,
            appId: '<?php echo $signPackage["appId"];?>',
            timestamp: '<?php echo $signPackage["timestamp"];?>',
            nonceStr: '<?php echo $signPackage["nonceStr"];?>',
            signature: '<?php echo $signPackage["signature"];?>',
            jsApiList: [
        "onMenuShareQQ"
    ]
        });
        wx.ready(function () {});
    </script>

    </html>
