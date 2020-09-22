<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canvas extends Model
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function draw($size)
    {
//        file_put_contents('tmp/cookie.txt');

        $kod = $json;
        $name = $json["name"];
        dd($name);
        $xname = (212-mb_strlen($name)*6)/2;

        $size = $size;
        $xsize = (212-mb_strlen($size)*7)/2;

        $id_site = 'Арт: '. $this->id;
        $xid_site = (212-mb_strlen($id_site)*7)/2;

        $price = $json["min_price"];
        $xprice = (212-mb_strlen($price)*8)/2;


        $image = imagecreate(212, 240);
        imagecolorallocate($image, 255, 255, 255);
        $textcolor = imagecolorallocate($image, 0, 0, 0);
        $font = 'arial.ttf';

        $green = imagecolorallocate($image, 0, 0, 0);
        imageline ($image, 10, 10, 10, 230, $green);
        imageline ($image, 200, 10, 200, 230, $green);
        imageline ($image, 10, 10, 200, 10, $green);
        imageline ($image, 10, 230, 200, 230, $green);
        imagettftext($image, 10, 0,53, 30, $textcolor, $font,'123456789012345');//29
        imagettftext($image, 8, 0,$xname, 100, $textcolor, $font,$name);
        imagettftext($image, 10,0, $xsize, 140, $textcolor, $font,$size);
        imagettftext($image, 10, 0,$xid_site, 180, $textcolor, $font,$id_site);
        imagettftext($image, 15, 0,$xprice, 220, $textcolor, $font,$price);


//        header('Content-Type: image/png');
        imagepng($image,'test.png');



    }

    public function parserUrl1($url, $postdata = null )
    {
        $cookiefile = '/usr/share/nginx/html/public/cookie.txt';

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36');

        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


        if($postdata){
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        }

        $html = curl_exec($ch);
        curl_close($ch);
        return $html;

    }

}
