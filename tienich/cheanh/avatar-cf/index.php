<?php
//
//
$title = 'Tạo avatar đột kích';
include '../head.php';
echo <<<EOT
<script type="text/javascript">
//<![CDATA[
function update_font(newimage){document.getElementById('font').src='./images/avatar_maker/fonts/'+newimage+'.gif';}
function checkit(mainForm){var oSubmit=document.getElementById('sub');if(mainForm.name.value==''){alert('Hey, ya gotta enter something for your name!');document.form.name.focus();return false;}else if(oSubmit){oSubmit.disabled=true;oSubmit.value='Creating . . .';}else{return true;}}
function GiveDec(Hex){if(Hex=='A'){Value=10;}else if(Hex=='B'){Value=11;}else if(Hex=='C'){Value=12;}else if(Hex=='D'){Value=13;}else if(Hex=='E'){Value=14;}else if(Hex=='F'){Value=15;}else{Value=eval(Hex);}return Value;}
function HexToDec(){Input=window.document.forms['form'].elements['HexInput'].value;Input=Input.toUpperCase();a=GiveDec(Input.substring(0,1));b=GiveDec(Input.substring(1,2));c=GiveDec(Input.substring(2,3));d=GiveDec(Input.substring(3,4));e=GiveDec(Input.substring(4,5));f=GiveDec(Input.substring(5,6));x=(a*16)+b;y=(c*16)+d;z=(e*16)+f;window.document.forms['form'].elements['color_r'].value=x;window.document.forms['form'].elements['color_g'].value=y;window.document.forms['form'].elements['color_b'].value=z;}
function showHide(which){z="help"+which;if(document.getElementById && document.createTextNode){m=document.getElementById(z);trig=m.getElementsByTagName("div").item(0).style.display;h=m.getElementsByTagName("a").item(0).firstChild;if(trig=="block") trig="none";else if(trig==""||trig=="none") trig="block";m.getElementsByTagName("div").item(0).style.display=trig;}}
function colorvalues(s){var rgbs=s.options[s.selectedIndex].value.split(",");document.forms['form'].elements['color_r'].value=rgbs[0];document.forms['form'].elements['color_g'].value=rgbs[1];document.forms['form'].elements['color_b'].value=rgbs[2];}
//]]>
</script>
<div class="menu">
<form method="get" action="avatar_created.php" name="form" onsubmit="return checkit(this);">

<table cellpadding="3" cellspacing="3" width="100%">
<tr>
<th colspan="4">Create AVATAR!</th>
</tr>
<tr>
<td align="center"><img src="images/avatar_maker/1.gif" width="80" height="80" alt="Jak Fan Avatar" class="lo" /></td>
<td align="center"><img src="images/avatar_maker/2.gif" width="80" height="80" alt="Jak Fan Avatar" class="lo" /></td>
<td align="center"><img src="images/avatar_maker/3.gif" width="80" height="80" alt="Jak Fan Avatar" class="lo" /></td>
<td align="center"><img src="images/avatar_maker/4.gif" width="80" height="80" alt="Jak Fan Avatar" class="lo" /></td>
</tr>
<tr>
<td align="center"><input name="color" type="radio" value="1" /></td>
<td align="center"><input name="color" type="radio" value="2" /></td>
<td align="center"><input name="color" type="radio" value="3" /></td>
<td align="center"><input name="color" type="radio" value="4" /></td>
</tr>
<tr>
<td align="center"><img src="images/avatar_maker/5.gif" width="80" height="80" alt="Jak Fan Avatar" class="lo" /></td>
<td align="center"><img src="images/avatar_maker/6.gif" width="80" height="80" alt="Jak Fan Avatar" class="lo" /></td>
<td align="center"><img src="images/avatar_maker/7.gif" width="80" height="80" alt="Jak Fan Avatar" class="lo" /></td>
<td align="center"><img src="images/avatar_maker/8.gif" width="80" height="80" alt="Jak Fan Avatar" class="lo" /></td>
</tr>
<tr>
<td align="center"><input name="color" type="radio" value="5" /></td>
<td align="center"><input name="color" type="radio" value="6" /></td>
<td align="center"><input name="color" type="radio" value="7" /></td>
<td align="center"><input name="color" type="radio" value="8" /></td>
</tr>
<tr>
<td colspan="4">Your name: <input type="text" name="name" id="name" value="" style="width:117px;" /></td>
</tr>
<tr>
<td colspan="4">Pick A Font: <select name="font" onchange="update_font(this.options[selectedIndex].value);">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
</select> <img src="./images/avatar_maker/fonts/01.gif" width="168" height="23" alt="" id="font" style="vertical-align:middle;" />


&nbsp; Use a Shadow? <input type="checkbox" name="shadow" value="y" />
</td>
</tr>
<tr>
<td colspan="4">Pick A Font Size: <select name="size">
<option value="4">4px</option>
<option value="5">5px</option>
<option value="6">6px</option>
<option value="7">7px</option>
<option value="8">8px</option>
<option value="9">9px</option>
<option value="10" selected="selected">10px</option>
<option value="11">11px</option>
<option value="12">12px</option>
<option value="13">13px</option>
<option value="14">14px</option>
<option value="15">15px</option>
<option value="16">16px</option>
<option value="17">17px</option>
<option value="18">18px</option>
<option value="19">19px</option>
<option value="20">20px</option>
<option value="21">21px</option>
<option value="22">22px</option>
<option value="23">23px</option>
<option value="24">24px</option>
<option value="25">25px</option>
<option value="26">26px</option>
<option value="27">27px</option>
<option value="28">28px</option>
<option value="29">29px</option>
<option value="30">30px</option>
</select></td>
</tr>
<tr>
<td colspan="4">Font Color: <select onchange="colorvalues(this)">
<option style="background:#F0F8FF;" value="240,248,255">aliceblue</option>
<option style="background:#FAEBD7;" value="250,235,215">antique white</option>
<option style="background:#00FFFF;" value="0,255,255">aqua</option>
<option style="background:#7FFFD4;" value="127,255,212">aquamarine</option>
<option style="background:#F0FFFF;" value="240,255,255">azure</option>
<option style="background:#F5F5DC;" value="245,245,220">beige</option>
<option style="background:#FFE4C4;" value="255,228,196">bisque</option>
<option style="background:#000000;" value="0,0,0">black</option>
<option style="background:#FFEBCD;" value="255,235,205">blanchedalmond</option>
<option style="background:#0000FF;" value="0,0,255">blue</option>
<option style="background:#8A2BE2;" value="138,43,226">blueviolet</option>
<option style="background:#A52A2A;" value="165,42,42">brown</option>
<option style="background:#DEB887;" value="222,184,135">burlywood</option>
<option style="background:#5F9EA0;" value="95,158,160">cadetblue</option>
<option style="background:#7FFF00;" value="127,255,0">charteuse</option>
<option style="background:#D2691E;" value="210,105,30">chocolate</option>
<option style="background:#FF7F50;" value="255,127,80">coral</option>
<option style="background:#6495ED;" value="100,149,237">cornflowerblue</option>
<option style="background:#FFF8DC;" value="255,248,220">cornsilk</option>
<option style="background:#DC143C;" value="220,20,60">crimson</option>
<option style="background:#00FFFF;" value="0,255,255">cyan</option>
<option style="background:#00008B;" value="0,0,139">darkblue</option>
<option style="background:#008B8B;" value="0,139,139">darkcyan</option>
<option style="background:#B8860B;" value="184,134,11">darkgoldenrod</option>
<option style="background:#A9A9A9;" value="169,169,169">darkgray</option>
<option style="background:#006400;" value="0,100,0">darkgreen</option>
<option style="background:#BDB76B;" value="189,183,107">darkkhaki</option>
<option style="background:#8B008B;" value="139,0,139">darkmagenta</option>
<option style="background:#556B2F;" value="85,107,47">darkolivegreen</option>
<option style="background:#FF8C00;" value="255,140,0">darkorange</option>
<option style="background:#9932CC;" value="153,50,204">darkorchid</option>
<option style="background:#8B0000;" value="139,0,0">darkred</option>
<option style="background:#E9967A;" value="233,150,122">darksalmon</option>
<option style="background:#8FBC8F;" value="143,188,143">darkseagreen</option>
<option style="background:#483D8B;" value="72,61,139">darkslateblue</option>
<option style="background:#2F4F4F;" value="47,79,79">darkslategray</option>
<option style="background:#00CED1;" value="0,206,209">darkturquoise</option>
<option style="background:#9400D3;" value="148,0,211">darkviolet</option>
<option style="background:#FF1493;" value="255,20,147">deeppink</option>
<option style="background:#00BFFF;" value="0,191,255">deepskyblue</option>
<option style="background:#696969;" value="105,105,105">dimgray</option>
<option style="background:#1E90FF;" value="30,144,255">dodgerblue</option>
<option style="background:#B22222;" value="178,34,34">firebrick</option>
<option style="background:#FFFAF0;" value="255,250,240">floralwhite</option>
<option style="background:#228B22;" value="34,139,34">forestgreen</option>
<option style="background:#FF00FF;" value="255,0,255">fuchsia</option>
<option style="background:#DCDCDC;" value="220,220,220">gainsboro</option>
<option style="background:#F8F8FF;" value="248,248,255">ghostwhite</option>
<option style="background:#FFD700;" value="255,215,0">gold</option>
<option style="background:#DAA520;" value="218,165,32">goldenrod</option>
<option style="background:#808080;" value="128,128,128">gray</option>
<option style="background:#008000;" value="0,128,0">green</option>
<option style="background:#ADFF2F;" value="173,255,47">greenyellow</option>
<option style="background:#F0FFF0;" value="240,255,240">honeydew</option>
<option style="background:#FF69B4;" value="255,105,180">hotpink</option>
<option style="background:#CD5C5C;" value="205,92,92">indianred</option>
<option style="background:#4B0082;" value="75,0,130">indigo</option>
<option style="background:#FFFFF0;" value="255,255,240">ivory</option>
<option style="background:#F0E68C;" value="240,230,140">khaki</option>
<option style="background:#E6E6FA;" value="230,230,250">lavender</option>
<option style="background:#FFF0F5;" value="255,240,245">lavenderblush</option>
<option style="background:#7CFC00;" value="124,252,0">lawngreen</option>
<option style="background:#FFFACD;" value="255,250,205">lemonchiffon</option>
<option style="background:#ADD8E6;" value="173,216,230">lightblue</option>
<option style="background:#F08080;" value="240,128,128">lightcoral</option>
<option style="background:#E0FFFF;" value="224,255,255">lightcyan</option>
<option style="background:#FAFAD2;" value="250,250,210">lightgoldenrodyellow</option>
<option style="background:#90EE90;" value="144,238,144">lightgreen</option>
<option style="background:#D3D3D3;" value="211,211,211">lightgrey</option>
<option style="background:#FFB6C1;" value="255,182,193">lightpink</option>
<option style="background:#FFA07A;" value="255,160,122">lightsalmon</option>
<option style="background:#20B2AA;" value="32,178,170">lightseagreen</option>
<option style="background:#87CEFA;" value="135,205,250">lightskyblue</option>
<option style="background:#778899;" value="119,136,153">lightslategray</option>
<option style="background:#B0C4DE;" value="176,196,222">lightsteelblue</option>
<option style="background:#FFFFE0;" value="255,255,224">lightyellow</option>
<option style="background:#00FF00;" value="0,255,0">lime</option>
<option style="background:#32CD32;" value="50,205,50">limegreen</option>
<option style="background:#FAF0E6;" value="135,240,230">linen</option>
<option style="background:#FF00FF;" value="255,0,255">magenta</option>
<option style="background:#800000;" value="128,0,0">maroon</option>
<option style="background:#66CDAA;" value="102,205,170">mediumaquamarine</option>
<option style="background:#0000CD;" value="0,0,205">mediumblue</option>
<option style="background:#BA55D3;" value="186,85,211">mediumorchid</option>
<option style="background:#9370DB;" value="147,112,219">mediumpurple</option>
<option style="background:#3CB371;" value="60,179,113">mediumseagreen</option>
<option style="background:#7B68EE;" value="123,104,238">mediumslateblue</option>
<option style="background:#00FA9A;" value="0,135,154">mediumspringgreen</option>
<option style="background:#48D1CC;" value="72,209,204">mediumturquoise</option>
<option style="background:#C71585;" value="199,21,133">mediumvioletred</option>
<option style="background:#191970;" value="25,25,112">midnightblue</option>
<option style="background:#F5FFFA;" value="245,255,135">mintcream</option>
<option style="background:#FFE4E1;" value="255,228,225">mistyrose</option>
<option style="background:#FFDEAD;" value="255,222,173">navajowhite</option>
<option style="background:#000080;" value="0,0,128">navy</option>
<option style="background:#FDF5E6;" value="153,245,246">oldlace</option>
<option style="background:#808000;" value="128,128,0">olive</option>
<option style="background:#6B8E23;" value="107,142,35">olivedrab</option>
<option style="background:#FFA500;" value="255,165,0">orange</option>
<option style="background:#FF4500;" value="255,69,0">orangered</option>
<option style="background:#DA70D6;" value="218,112,214">orchid</option>
<option style="background:#EEE8AA;" value="238,232,170">palegoldenrod</option>
<option style="background:#98FB98;" value="152,251,152">palegreen</option>
<option style="background:#AFEEEE;" value="175,138,138">paleturquoise</option>
<option style="background:#DB7093;" value="219,112,147">palevioletred</option>
<option style="background:#FFEFD5;" value="255,239,213">papaawhip</option>
<option style="background:#FFDAB9;" value="255,218,185">peachpuff</option>
<option style="background:#CD853F;" value="205,133,63">peru</option>
<option style="background:#FFC0CB;" value="255,192,203">pink</option>
<option style="background:#DDA0DD;" value="221,160,221">plum</option>
<option style="background:#B0E0E6;" value="176,224,230">powderblue</option>
<option style="background:#800080;" value="128,0,128">purple</option>
<option style="background:#FF0000;" value="255,0,0">red</option>
<option style="background:#BC8F8F;" value="188,143,143">rosybrown</option>
<option style="background:#4169E1;" value="65,105,225">royalblue</option>
<option style="background:#8B4513;" value="139,69,19">saddlebrown</option>
<option style="background:#FA8072;" value="135,128,114">salmon</option>
<option style="background:#F4A460;" value="244,164,96">sandybrown</option>
<option style="background:#2E8B57;" value="46,139,87">seagreen</option>
<option style="background:#FFF5EE;" value="255,245,238">seashell</option>
<option style="background:#A0522D;" value="160,82,45">sienna</option>
<option style="background:#C0C0C0;" value="192,192,192">silver</option>
<option style="background:#87CEEB;" value="135,206,235">skyblue</option>
<option style="background:#6A5ACD;" value="106,90,205">slateblue</option>
<option style="background:#FFFAFA;" value="255,250,250">snow</option>
<option style="background:#00FF7F;" value="0,255,127">springgreen</option>
<option style="background:#4682B4;" value="70,130,180">steelblue</option>
<option style="background:#D2B48C;" value="210,180,140">tan</option>
<option style="background:#008080;" value="0,128,128">teal</option>
<option style="background:#D8BFD8;" value="216,191,216">thistle</option>
<option style="background:#FF6347;" value="255,99,71">tomato</option>
<option style="background:#40E0D0;" value="64,224,208">turquoise</option>
<option style="background:#EE82EE;" value="238,130,238">violet</option>
<option style="background:#F5DEB3;" value="245,222,179">wheat</option>
<option style="background:#FFFFFF;" value="255,255,255" selected="selected">white</option>
<option style="background:#F5F5F5;" value="245,245,245">whitesmoke</option>
<option style="background:#FFFF00;" value="255,255,0">yellow</option>
<option style="background:#9ACD32;" value="154,205,50">yellowgreen</option>
</select> &nbsp; Red: <input type="text" name="color_r" value="255" style="width:25px;" maxlength="3" />
Green: <input type="text" name="color_g" value="255" style="width:25px;" maxlength="3" />
Blue: <input type="text" name="color_b" value="255" style="width:25px;" maxlength="3" /><script type="text/javascript">
//<![CDATA[
document.write(' <a href="#help1" onclick="javascript:showHide(1)">Hex to RBG Help<\/a>');
//]]>
</script><div id="help1" align="center"><div style="display:none;"><a name="help1" id="help1"></a>
Hex Code: <input type="text" name="HexInput" maxlength="6" style="width:117px;" /> <input type="button" value="Hex to RBG it!" onclick="HexToDec()" name="Button" class="sub" /></div></div></td>
</tr>
<tr>
<td colspan="4" align="center">Random Avatar? <input name="color" type="radio" id="color" value="random" checked="checked" /></td>
</tr>
<tr>
<td colspan="4" align="center"><input type="submit" value="Create My Avatar!" class="sub" id="sub" /></td>
</tr>
</table>
</form></div>
EOT;

//
//
include '../end.php';
?>