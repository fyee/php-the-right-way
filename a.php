<?php
/*
参数：
1.$bgimg : 背景图片
2.$x     : 距离左边的距离
3.$topy  : 距离顶部的距离
4.$font  : 要添加的字符串
5.$size  : 字体的大小
6.$fonttype : 字体
7.$color : 字体颜色
8.$tofile: 生成的图片
9.$nameyycolor : 字符串的阴影颜色
10.$nameyysize : 阴影的宽度
11.$fontfile   : 字体文件
 */
function addchartopic($bgimg, $x, $topy, $font, $size, $fonttype, $color, $tofile, $nameyycolor, $nameyysize, $fontfile)
{
    $r = hexdec(substr($color, 0, 2));
    /*hexdec()函数把十六进制转换为十进制。*/
    $g  = hexdec(substr($color, 2, 2));
    $b  = hexdec(substr($color, 4, 2));
    $im = imagecreatefrompng($bgimg);
    /*ImageCreateFromPNG本函数用来取出一张 PNG格式图形，通当取出当背景或者基本的画布样本使用。参数 filename 可以是本地端的文件，也可以是网络的 URL位址。ImageCreateFromPNG返回值为 PNG 的文件代码，可供其它的函数使用。本函数在 PHP 3.0.13 版之后才支持。
     */
    $fontcolor = imagecolorallocate($im, $r, $g, $b);
    /*int imagecolorallocate ( resource image, int red, int green, int blue)
    　　imagecolorallocate() 返回一个标识符，代表了由给定的 RGB 成分组成的颜色。image 参数是 imagecreate() 函数的返回值。red，green 和 blue 分别是所需要的颜色的红，绿，蓝成分。这些参数是 0 到 255 的整数或者十六进制的 0x00 到 0xFF。imagecolorallocate() 必须被调用以创建每一种用在 image 所代表的图像中的颜色。 */
    $sy = imagesy($im) / $topy;
    /*imagesx与imagesy-- 分别取得图像宽度与高度。*/
    $array = imagettfbbox($size, 0, $fontfile, $font);
    /*array imagettfbbox (int size, int angle, string fontfile, string text)
    说明 :

    此函式计算并传回TrueType文字的区块坐标。
    text : 要被测量的字串。
    size : 字体大小。
    fontfile : TrueType字体档的名称(也可以是URL)。
    angle : text将要测量的角度度数。
    ImageTTFBBox( )传回的阵列有8个元素，代表文字区块的四个顶点。
    0 左下角X坐标
    1 左下角Y坐标
    2 右下角X坐标
    3 右下角Y坐标
    4 右上角X坐标
    5 右上角Y坐标
    6 左上角X坐标
    7 左上角Y坐标
    顶点是相对于text，所以不管角度。"左上角"的意思是，以水平的方向看文字时的左上角。
     */
    $fontsy   = ($array[0] - $array[5]) / 2;
    $jiaozhen = $fontsy * 0.3;
    $y        = $sy + $fontsy - $jiaozhen;

    if ($x == "-1") {
        $sx     = imagesx($im) / 2;
        $array  = imagettfbbox($size, 0, $fontfile, $font);
        $fontsx = ($array[0] - $array[2]) / 2;
        $x      = $sx + $fontsx;
    }

    $r1      = hexdec(substr($nameyycolor, 0, 2));
    $g1      = hexdec(substr($nameyycolor, 2, 2));
    $b1      = hexdec(substr($nameyycolor, 4, 2));
    $yycolor = imagecolorallocate($im, $r1, $g1, $b1);

    if (2 < $nameyysize) {
        imagettftext($im, $size, 0, $x + 3, $y + 3, $yycolor, $fontfile, $font);
        /*imagettftext (image,size,angle, x, y,color,fontfile,text)

    意思是 imagettftext() 将字符串 text 画到 image 所代表的图像上，从坐标 x，y（左上角为 0, 0）开始，角度为 angle，颜色为 color，使用 fontfile 所指定的 TrueType 字体文件。根据 PHP 所使用的 GD 库的不同，如果 fontfile 没有以 '/'开头，则 '.ttf' 将被加到文件名之后并且会搜索库定义字体路径。

    由 x，y 所表示的坐标定义了第一个字符的基本点（大概是字符的左下角）。这和 imagestring() 不同，其 x，y 定义了第一个字符的右上角。

    angle 以角度表示，0 度为从左向右阅读文本（3 点钟方向），更高的值表示逆时针方向（即如果值为 90 则表示从下向上阅读文本）。

    fontfile 是想要使用的 TrueType 字体的文件名。

    text 是文本字符串，可以包含 UTF-8 字符序列（形式为：&#123;）来访问字体中超过前 255 个的字符。

    color 是颜色的索引值。使用某颜色索引值的负值具有关闭防混色的效果*/
    }

    if (1 < $nameyysize) {
        imagettftext($im, $size, 0, $x + 2, $y + 2, $yycolor, $fontfile, $font);
    }

    if (0 < $nameyysize) {
        imagettftext($im, $size, 0, $x + 1, $y + 1, $yycolor, $fontfile, $font);
    }

    imagettftext($im, $size, 0, $x, $y, $fontcolor, $fontfile, $font);
    imagepng($im, $tofile); /*本函数用来建立一张 PNG 格式图形。参数 im 为使用 ImageCreate() 所建立的图片代码。参数 filename 可省略，若无本参数 filename，则会将图片指接送到浏览器端，记得在送出图片之前要先送出使用 Content-type: image/png 的标头字符串 (header) 到浏览器端，以顺利传输图片。本函数在 PHP 3.0.13 版之后才支持。 */
    imagedestroy($im);
    /*bool imagedestroy ( resource image )
    imagedestroy() 释放与 image 关联的内存
     */
    chmod($tofile, 438);
}

addchartopic("test.png", 50, 20, "I'm here as always", 15, "arial", "ffffff", "test1.png", "cccccc", 5, "arial.ttf");
echo "<h2>*This is the original png image:</h2>";
echo "<hr><center><img src=test.png border=1></center>";
echo "<h2>*This is the new png image:</h2>";
echo "<hr><center><img src=test1.png border=1></center>";
