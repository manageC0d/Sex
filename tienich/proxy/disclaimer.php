<?php
/*******************************************************************
* Glype is copyright and trademark 2007-2012 UpsideOut, Inc. d/b/a Glype
* and/or its licensors, successors and assigners. All rights reserved.
*
* Use of Glype is subject to the terms of the Software License Agreement.
* http://www.glype.com/license.php
*******************************************************************
*
* BY USING THIS DISCLAIMER, YOU ACKNOWLEDGE AND AGREE THAT ALL INFORMATION
* CONTAINED HEREIN DOES NOT CONSTITUTE LEGAL ADVICE OF ANY KIND OR NATURE.
* PLEASE CONSULT WITH LEGAL COUNSEL BEFORE USING THIS DISCLAIMER.
*
/*****************************************************************
* Initialize glype
******************************************************************/

require 'includes/init.php';


/*****************************************************************
* Create content
******************************************************************/

$content = <<<OUT
	<h2 class="first">Disclaimer</h2>
	<p>Chúng tôi không chịu trách nhiệm cho bất kỳ thiệt hại trực tiếp hoặc gián tiếp từ việc sử dụng dịch vụ này.</p>
	<p>Dịch vụ này cho phép duyệt gián tiếp của các trang web bên ngoài, bên thứ ba. Chúng tôi không chịu trách nhiệm cho nội dung trên bất kỳ trang web bên ngoài có thể được truy cập thông qua dịch vụ của chúng tôi. Một trang web xem thông qua dịch vụ của chúng tôi là không có cách nào sở hữu bởi hoặc liên kết với trang web này.</p>
	<p>Các thuật ngữ "duyệt gián tiếp" đề cập đến các máy chủ mà bạn kết nối tới. Trong khi trình duyệt "trực tiếp", bạn kết nối với máy chủ cung cấp các tài nguyên bạn đang yêu cầu. Trong khi trình duyệt "gián tiếp", bạn kết nối với máy chủ của chúng tôi. kịch bản của chúng tôi tải các tài nguyên yêu cầu và chuyển tiếp nó cho bạn.</p>
	<p>Bất kỳ tài nguyên (chẳng hạn như các trang web, hình ảnh, file) tải về thông qua dịch vụ của chúng tôi có thể được sửa đổi. Điều này có thể bao gồm, nhưng không giới hạn, chỉnh sửa URL để cho bất kỳ nguồn tham chiếu bởi nguồn tài nguyên mục tiêu cũng được tải về một cách gián tiếp. Sự chính xác và tin cậy của quá trình này không được bảo đảm. Các nguồn tài nguyên mà bạn nhận được có thể không phải là một đại diện chính xác của tài nguyên được yêu cầu. </p>
	<p>Một tác dụng phụ của trình duyệt gián tiếp có thể được giấu tên. Bằng cách kết nối đến máy chủ của chúng tôi thay vì các máy chủ mục tiêu, các máy chủ mục tiêu không thấy địa chỉ IP của bạn. Tuy nhiên, chúng tôi không đảm bảo dịch vụ của chúng tôi sẽ hoàn toàn vô danh. Các nguồn tài nguyên đã tải về có thể tham khảo các nguồn lực khác mà trình duyệt của bạn có thể tự động tải về. Dịch vụ cố gắng để định tuyến lại tất cả các yêu cầu đó thông qua máy chủ của chúng tôi nhưng có thể không hoàn toàn thành công. Một yêu cầu trực tiếp duy nhất sẽ thỏa hiệp danh tính của bạn.</p>
	<p>Dịch vụ này có thể tải về một nguồn tài nguyên trên một kết nối an toàn nhưng điều này có thể được gửi lại cho bạn qua một kết nối không an toàn. Không nhập thông tin bí mật, trừ khi bạn đang ở trên một kết nối an toàn với máy chủ của chúng tôi.</p>
OUT;


/*****************************************************************
* Send content wrapped in our theme
******************************************************************/

echo replaceContent($content);
