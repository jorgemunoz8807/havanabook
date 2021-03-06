<?php

/*

CometChat
Copyright (c) 2012 Inscripts

CometChat ('the Software') is a copyrighted work of authorship. Inscripts 
retains ownership of the Software and any copies of it, regardless of the 
form in which the copies may exist. This license is not a sale of the 
original Software or any copies.

By installing and using CometChat on your server, you agree to the following
terms and conditions. Such agreement is either on your own behalf or on behalf
of any corporate entity which employs you or which you represent
('Corporate Licensee'). In this Agreement, 'you' includes both the reader
and any Corporate Licensee and 'Inscripts' means Inscripts (I) Private Limited:

CometChat license grants you the right to run one instance (a single installation)
of the Software on one web server and one web site for each license purchased.
Each license may power one instance of the Software on one domain. For each 
installed instance of the Software, a separate license is required. 
The Software is licensed only to you. You may not rent, lease, sublicense, sell,
assign, pledge, transfer or otherwise dispose of the Software in any form, on
a temporary or permanent basis, without the prior written consent of Inscripts. 

The license is effective until terminated. You may terminate it
at any time by uninstalling the Software and destroying any copies in any form. 

The Software source code may be altered (at your risk) 

All Software copyright notices within the scripts must remain unchanged (and visible). 

The Software may not be used for anything that would represent or is associated
with an Intellectual Property violation, including, but not limited to, 
engaging in any activity that infringes or misappropriates the intellectual property
rights of others, including copyrights, trademarks, service marks, trade secrets, 
software piracy, and patents held by individuals, corporations, or other entities. 

If any of the terms of this Agreement are violated, Inscripts reserves the right 
to revoke the Software license at any time. 

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

*/

include dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."modules.php";

include dirname(__FILE__).DIRECTORY_SEPARATOR."config.php";
$extrajs = '';
if ($sleekScroller == 1) {
	$extrajs = '<script>jqcc=jQuery;</script><script src="../../js.php?type=core&name=scroll"></script>';
}

echo <<<EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="expires" content="-1">
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/> 
<link type="text/css" rel="stylesheet" media="all" href="../../css.php?type=module&name=twitter" /> 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
{$extrajs}
<script>
$(function(){

	if (jQuery().slimScroll) {
		$('#tweets').slimScroll({height: '310px',allowPageScroll: false});
		$("#tweets").css("height","290px");			
	}

	$.ajax({
		url: 'http://api.twitter.com/1/statuses/user_timeline.json',
		data: {screen_name: '{$nusername}', exclude_replies: 'true', trim_user: 'true'},
		dataType: 'jsonp',
		success: function(data) {
			tweets = '';
			for (tweet in data) {
				tweets += '<li class="tweet">'+data[tweet]['text'].replace(/http:\/\/t.co\/(\S+)/g,'<a href="http://t.co/$1" target="_blank">http://t.co/$1</a>')+'<br /><small>'+data[tweet]['created_at'].replace(/(\S+) (\S+) (\S+)(.*)/g,'$1 $2 $3');+'</small></li>';
			}
			$('#tweets').html(tweets);
		}
	});

	$.ajax({
		url: 'http://api.twitter.com/1/followers/ids.json',
		data: {screen_name: '{$nusername}'},
		dataType: 'jsonp',
		success: function(data) {
			var ids = data.ids;
			var idList = '';

			for (var i=0;i<48;i++) {
				if (ids[i]) {
					idList += ids[i]+',';	
				}
			}

			$.ajax({
				url: 'http://api.twitter.com/1/users/lookup.json',
				data: {user_id: idList},
				dataType: 'jsonp',
				success: function(data) {
					followers = '';
					for (follower in data) {
						followers += '<a target="_blank" href="http://www.twitter.com/'+data[follower]['screen_name']+'"><img width=24 height=24 src="'+data[follower]['profile_image_url'].replace('normal','mini')+'" alt="'+data[follower]['screen_name']+'" title="'+data[follower]['screen_name']+'"></a>';
					}
					$('#followers').html(followers);
				}
			});
		}
	});
});

</script>
</head>
<body>
<div style="width:100%;margin:0 auto;margin-top: 0px;">

<div class="container">
<div class="followme">
<a target="_blank" href="http://www.twitter.com/{$nusername}"><img src="themes/{$theme}/follow.png"></a>
<br/><br/>
<div id="followers"></div>
</div>
<div style="float:left;width: 324px; height: 300px;overflow:auto">
<ul id="tweets">
</ul>
</div>
<div style="clear:both"></div>
</div>
</body>
</html>
EOD;
?>