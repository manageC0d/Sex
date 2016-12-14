
status="Em Yêu Anh"
var a=new Array(),n=""
a[1]='Đ';
a[2]='ú';
a[3]='n';
a[4]='g';
a[5]=' ';
a[6]='v';
a[7]='ậ';
a[8]='y';
a[9]='!';
a[10]=' ';
a[11]='A';
a[12]='n';
a[13]='h';
a[14]=' ';
a[15]='H';
a[16]='O';
a[17]='À';
a[18]='N';
a[19]='G';
a[20]=' ';
a[21]='đ';
a[22]='ẹ';
a[23]='p';
a[24]=' ';
a[25]='t';
a[26]='r';
a[27]='a';
a[28]='i';
a[29]=' ';
a[30]='n';
a[31]='h';
a[32]='ấ';
a[33]='t';
a[34]=' ';
a[35]='q';
a[36]='u';
a[37]='ả';
a[38]=' ';
a[39]='đ';
a[40]='ấ';
a[41]='t';
a[42]=' ';
a[43]='♥';
a[44]='♥';
a[45]='♥';
a[46]='♥';
a[47]='♥';
a[48]='♥';
function one()
{
t=document.f.txt.value
j=t.length
if(j>0)
{
for(var i=1;i<=j;i++)
{
n=n+a[i]
if(i==48)
{
document.f.txt.value=""
n=""
}
}
}
document.f.txt.value=n
n=""
setTimeout("one()",1)
}
function s()
{
}
function on()
{
one()
}

        $(document).ready(function() {
            $('#k').hide();
            $('h1').click(function() {
                $('.active').removeClass('active');
                $('#k').slideUp('fast');
                if($(this).next('#k').is(':hidden') == true) {
                $(this).addClass('active');
                $(this).next('#k').slideDown('fast');
                }
            });
        });
					function Yeu()
					{
					$("#divResult").fadeOut(0);
					$("#divResult").html("</br><h2>Ủ ÔI! AI CŨNG NÓI VẬY ĐÓ <img src='http://vozforums.com/images/smilies/Off/adore.gif'</img></h2>");
					$("#divResult").fadeIn(2000,function()
							{
							$("#divResult2").fadeOut(0);
							$("#divResult2").html("<p>Em rất TỐT nhưng Anh rất TIẾC <img src='http://vozforums.com/images/smilies/Off/angry.gif'/></p></br>");
							$("#divResult2").fadeIn(2000,function()
									{
									$("#divResult3").fadeOut(0);
									$("#divResult3").html("<p>Xin lỗi! anh có bạn trai rồi, với lại anh không phải loại đàn ông dễ dãi...! <img src='http://vozforums.com/images/smilies/Off/sure.gif'/></p></br>");
									$("#divResult3").fadeIn(2000);
									}
								);
							}
						);
					}
				