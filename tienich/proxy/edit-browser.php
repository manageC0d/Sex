<?php
/*******************************************************************
* Glype is copyright and trademark 2007-2012 UpsideOut, Inc. d/b/a Glype
* and/or its licensors, successors and assigners. All rights reserved.
*
* Use of Glype is subject to the terms of the Software License Agreement.
* http://www.glype.com/license.php
*******************************************************************
* This page allows the user to change settings for their "virtual
* browser" - includes disabling/enabling referrers, choosing a user
* agent string
******************************************************************/


/*****************************************************************
* Initialize glype
******************************************************************/

require 'includes/init.php';

// Stop caching
sendNoCache();

// Start buffering
ob_start();


/*****************************************************************
* Create content
******************************************************************/

// Return without saving button
$return		 = empty($_GET['return']) ? '' : '<input type="button" value="Cancel" onclick="window.location=\'' . $_GET['return'] . '\'">';
$returnField = empty($_GET['return']) ? '' : '<input type="hidden" value="' . $_GET['return'] . '" name="return">';

// Quote strings
function q($value) {
	return str_replace("'", "\'", $value);
}

// Get existing values
$browser		  = $_SESSION['custom_browser'];

$currentUA		  = q($browser['user_agent']);
$realReferrer	  = $browser['referrer'] == 'real' ? 'true' : 'false';
$customReferrer  = $browser['referrer'] == 'real' ? ''	  : q($browser['referrer']);

echo <<<OUT
	<script type="text/javascript">
		// Update custom ua field with value of currently selected preset
		function updateCustomUA(select) {
			
			// Get value
			var newValue = select.value;
			
			// Custom field
			var customField = document.getElementById('user-agent');
			
			// Special cases
			switch ( newValue ) {
				case 'none':
					newValue = '';
					break;
				case 'custom':
					customField.focus();
					return;
			}
			
			// Set new value
			customField.value = newValue;
			
		}
		
		// Set select box to "custom" field when the custom text field is edited
		function setCustomUA() {
			var setTo = document.getElementById('user-agent').value ? 'custom' : '';
			setSelect(document.getElementById('user-agent-presets'), setTo);
		}
		
		// Set a select field by value
		function setSelect(select, value) {
			for ( var i=0; i < select.length; ++i ) {
				if ( select[i].value == value ) {
					select.selectedIndex = i;
					return true;
				}
			}
			return false
		}
		
		// Clear custom-referrer text field if real-referrer is checked
		function clearCustomReferrer(checkbox) {
			if ( checkbox.checked ) {
				document.getElementById('custom-referrer').value = '';
			}
		}
		
		// Clear real-referrer checkbox if custom-referrer text field is edited
		function clearRealReferrer() {
			document.getElementById('real-referrer').checked = '';
		}
		
		// Add domready function to set form to current values
		window.addDomReadyFunc(function() {
			document.getElementById('user-agent').value			= '{$currentUA}';
			if ( setSelect(document.getElementById('user-agent-presets'), '{$currentUA}') == false ) {
				setCustomUA();
			}
			document.getElementById('real-referrer').checked	= {$realReferrer};
			document.getElementById('custom-referrer').value	= '{$customReferrer}';
		});
	</script>
	
	<h2 class="first">Sửa Browser</h2>
	<p>Bạn có thể điều chỉnh các cài đặt cho "trình duyệt ảo " của bạn dưới đây . Các tùy chọn này ảnh hưởng đến các thông tin proxy sẽ gửi đến máy chủ mục tiêu .</p>
	<form action="includes/process.php?action=edit-browser" method="post">
	
		<table cellpadding="2" cellspacing="0" align="center" class="large-table">
			<tr>
				<th colspan="2">User Agent (<a style="cursor:help;" onmouseover="tooltip('Trình duyệt của bạn sẽ được giả dạng và gửi đến máy chủ sẽ xác định những phần mềm bạn đang sử dụng để truy cập internet .')" onmouseout="exit()">?</a>)</th>
			</tr>
			<tr>
				<td width="150">Chọn trình duyệt truy cập:</td>
				<td>
					<select id="user-agent-presets" onchange="updateCustomUA(this)">
						<option value="Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30; .NET CLR 3.0.04506.648; .NET CLR 3.5.21022; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729; .NET4.0C; .NET4.0E)">XP với IE 8</option>
						<option value="Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; Zune 4.0; InfoPath.3; MS-RTC LM 8; .NET4.0C; .NET4.0E)">Windows 7 với IE 9</option>
						<option value="Opera/9.80 (Windows NT 5.1; U; en) Presto/2.9.168 Version/11.52">XP với Opera Browser</option>
						<option value="Opera/9.80 (Windows NT 6.1; U; en) Presto/2.9.168 Version/11.52">Windows 7 với Opera Browser</option>
						<option value="Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/533.20.25 (KHTML, like Gecko) Version/5.0.4 Safari/533.20.27">Windows 7 với Safari</option>
						<option value="Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.36 Safari/535.7">Windows 7 với Chrome</option>
						<option value="Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:8.0) Gecko/20100101 Firefox/8.0">XP với Firefox 8</option>
						<option value="Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:8.0) Gecko/20100101 Firefox/8.0">Windows 7 với Firefox 8</option>
						<option value="Mozilla/5.0 (X11; Linux i686; rv:8.0) Gecko/20100101 Firefox/8.0">Linux X11 với Firefox 8</option>
						<option value="Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_8; en-US) AppleWebKit/533.21.1 (KHTML, like Gecko) Version/5.0.5 Safari/533.21.1">Mac OS X 10.6 với Safari</option>
						<option value="Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.6.8; en-US; rv:8.0) Gecko/20100101 Firefox/8.0">Mac OS X 10.6 với Firefox 8</option>
						<option value="Opera/9.80 (Macintosh; Intel Mac OS X 10.6.8; U; en) Presto/2.9.168 Version/11.52">Mac OS X 10.6 với Opera Browser</option>
						<option value="Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.10">iPad</option>
						<option value="Mozilla/5.0 (iPhone; U; CPU iPhone OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.20 (KHTML, like Gecko) Mobile/7B298g">iPhone</option>
						<option value="Mozilla/5.0 (compatible; MSIE 9.0; Windows Phone OS 7.5; Trident/5.0; IEMobile/9.0)">Windows Phone OS 7.5 và IE 9</option>
						<option value="Mozilla/5.0 (Linux; U; Android 2.3.5; en-us; HTC Vision Build/GRI40) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1">Android 2.3.5</option>
						<option value="Mozilla/5.0 (BlackBerry; U; BlackBerry 9850; en-US) AppleWebKit/534.11+ (KHTML, like Gecko) Version/7.0.0.115 Mobile Safari/534.11+">Blackberry</option>
						<option value="Opera/9.80 (J2ME/MIDP; Opera Mini/9.80 (S60; SymbOS; Opera Mobi/23.348; U; en) Presto/2.5.25 Version/10.54">Symbian với Opera Mini</option>
						<option value="{$_SERVER['HTTP_USER_AGENT']}"> - Hiện hành/Thực</option>
						<option value=""> - None</option>
						<option value="custom"> - Custom...</option>			  
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="text" id="user-agent" name="user-agent" class="full-width" onchange="setCustomUA();">
				</td>
			</tr>
			<tr>
				<td colspan="2" class="small-note"><b>Lưu ý:</b> Một số websites có thể tự điều chỉnh Browser của bạn</td>
			</tr>
		</table>
		
		<table cellpadding="2" cellspacing="0" align="center" class="large-table">
			<tr>
				<th colspan="2">Referrer (<a style="cursor:help;" onmouseover="tooltip('Link URL của trang trước đó sẽ được gửi đến máy chủ . Bạn có thể ghi đè giá trị này với một giá trị tùy chỉnh hoặc thiết lập để gửi không đến từ đâu cả .')" onmouseout="exit()">?</a>)</th>
			</tr>
			<tr>
				<td width="150">Không có trang trước đó</td>
				<td><input type="checkbox" name="real-referrer" id="real-referrer" onclick="clearCustomReferrer(this)"></td>
			</tr>
			<tr>
				<td>Tuỳ chỉnh URL:</td>
				<td><input type="text" name="custom-referrer" id="custom-referrer" class="full-width" onchange="clearRealReferrer()"></td>
			</tr>
			<tr>
				<td colspan="2" class="small-note"><b>Lưu ý:</b> Một số trang web có thể xác nhận URL trang trước đó của bạn và từ chối truy cập nếu thiết lập một giá trị không hợp lệ hoặc trang trước khi đến phải là URL của web đó.</td>
			</tr>
		</table>
		
		<br>
		
		<div style="text-align: center;"><input type="submit" value="Lưu"> {$return}</div>
		
		{$returnField}
		
	</form>
OUT;


/*****************************************************************
* Send content wrapped in our theme
******************************************************************/

// Get buffer
$content = ob_get_contents();

// Clear buffer
ob_end_clean();

// Print content wrapped in theme
echo replaceContent($content);