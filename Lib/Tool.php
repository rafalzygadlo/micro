<?php


/**
 * Tool
 * 
 * @category   Libs
 * @package    CMS
 * @author     Rafał Żygadło <rafal@maxkod.pl>
 
 * @copyright  2016 maxkod.pl
 * @version    1.0
 */

namespace Lib;

class Tool
{


    public function AsString()
    {
        return get_class($this);
    }

    public function Href($href,$text)
    {
        print '<a href="$controller">$text</a>';
    }
    
    public function GetDiskTotalSpace($directory)
    {
        return disk_total_space($directory)/1024/1024/1024;
    }
    
    public function GetDiskFreeSpace($directory = '/home/qotsa2')
    {
        return disk_free_space($directory);
    }

    public static function RandomString($len)
    {
        $string_table = "qazwsxedcrfvtgbyhnujmikolpQAZWSXEDCRFVTGBHNUJMIKOLP1234567890";
        $buffer = "";
        for ($i = 0; $i < $len; $i++)
            $buffer = $buffer . $string_table[rand(0, strlen($string_table) - 1)];

        return $buffer;
    }
    
    public function PureText($text, $maxlength = FALSE, $breakCode = FALSE,$striptags = TRUE)
    {
            
        if($striptags)
            $text = strip_tags(trim($text));
        
        $IsBreak = strstr($text, $breakCode);
    
        if ($breakCode AND $IsBreak)
        {
            $textArray = explode($breakCode, $text);    
            $text = $textArray[0];
        } 
        
        if ($IsBreak == FALSE AND $maxlength)
        {     
            $text = mb_strimwidth($text, 0, $maxlength, '...');   
        }
        
        
        
        return $text;
        
    }
    
    public function DateFormat($time, $dateFormat=FALSE){
    
        $data = $time;
        
        if ($dateFormat){
        
            $mktime = strtotime($time);
            
            $data = date($dateFormat, $mktime);
        }
    
        return $data;
        
    }
    
    public function FilterTextFromEditor($text){
        
        /*
        CKEDYTOR znaki :
        
        data-plugin-options='{"items": 1, "autoHeight": true, "navigation": true, "pagination": true, "transitionStyle":"fade", "progressBar":"true"}'

        zmienia na:

        data-plugin-options="{&quot;items&quot;: 1, &quot;autoHeight&quot;: true, &quot;navigation&quot;: true, &quot;pagination&quot;: true, &quot;transitionStyle&quot;:&quot;fade&quot;, &quot;progressBar&quot;:&quot;true&quot;}" 
        
        WIĘC POPRAWIAMY...
        */
        
        $text = str_replace('"{&quot;','\'{"',$text);
        $text = str_replace('&quot;:','":',$text);
        $text = str_replace(', &quot;',', "',$text);
        $text = str_replace('&quot;}"','"}\'',$text);
        
        //zdjęcia responsywne
        $text = str_replace('class="dopasuj"','class="img-responsive"',$text);
        
        //$text = str_replace('<img class="img-responsive"','<span class="image-hover-icon image-hover-dark"><i class="fa fa-search-plus"></i></span><img class="img-responsive"',$text);
        
        //lightbox
        $text = str_replace('class="powieksz"','class="image-hover lightbox" data-plugin-options=\'{"type":"image"}\'',$text);
        
        return $text;
        
    }
    
    

    public static function IsValidEmail($email)
    {
        $wholeexp = '/^(.+?)@(([a-z0-9\.-]+?)\.[a-z]{2,5})$/i';
        $userexp = "/^[a-z0-9\~\\!\#\$\%\&\(\)\-\_\+\=\[\]\;\:\'\"\,\.\/]+$/i";

        if (preg_match($wholeexp, $email, $regs))
        {
            $username = $regs[1];
            $host = $regs[2];

            if (checkdnsrr($host, "MX"))
            {
                if (preg_match($userexp, $username))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
    
    public function TransliterateStringToFile($string)
    {        
        $TransliterateString = strtolower(preg_replace('/[^a-z0-9\-\_\.]/i', '', iconv("UTF-8", "ASCII//TRANSLIT//IGNORE", transliterator_transliterate('Any-Latin; Latin-ASCII', $string))));
        return $TransliterateString;
    }
    
    public function TransliterateStringToUrl($string)
    {
        
        $TransliterateStringWithSpaces = iconv("UTF-8", "ASCII//TRANSLIT//IGNORE", transliterator_transliterate('Any-Latin; Latin-ASCII', $string));
        $TransliterateStringWithOutSpaces = str_replace(' ','-',$TransliterateStringWithSpaces);        
        $TransliterateString = strtolower(preg_replace('/[^a-z0-9\-]/i', '', $TransliterateStringWithOutSpaces));

        return $TransliterateString;
    }

    public function PrintImageUrl($img, $folder = NULL)
    {
        
        if(!is_null($folder))
        {
            $folder = $folder.'/';   
        }
        
        print IMAGES_URL.$folder.$img;
    }
    
    public static function ImageUrl($img, $folder = NULL)
    {
        
        if(!is_null($folder))
        {
            $folder = $folder.'/';   
        }
        
        return IMAGES_URL.$folder.$img;
    }
    
    
    public function FileUrl($file, $folder = NULL)
    {
        
        if(!is_null($folder))
        {
            $folder = $folder.'/';   
        }
        
        return FILES_URL.$folder.$file;
    }
    
    public function PrintArray($array)
    {
        print '<pre>';
        print_r($array);
        print '</pre>';
    }
  
    public static function DirectoryExists($path)
    {
        if (!file_exists($path))
        {
            return false;
        }else{
     
        return true;
        }
    } 
 
    public static function DirectoryCreate($path)
    {
        if (mkdir($path))
            return true;
        else
            return false;
    }
    
    // przydatne do newsletera wymienia znaczniki img w tekscie na img z pełnym url
    function ReplaceImgSrc($img_tag)
    {
        $doc = new DOMDocument();
        $doc->loadHTML($img_tag);
        $tags = $doc->getElementsByTagName('img');
        
        foreach ($tags as $tag)
        {
            $old_src = $tag->getAttribute('src');
            $new = str_replace(SITE_URL,'',$old_src);
            $new_src_url = SITE_URL.$new;
            $tag->setAttribute('src', $new_src_url);
        }
        
        return $doc->saveHTML();
    }
    
    // upload image to $dir = directory
    public static function UploadImage($dir,$fname)
    {
        
        // taka konstrukcja powoduje brak warningów
        if(isset($_FILES[IMAGE]['tmp_name'])) 
        {
            $from = $_FILES[IMAGE]['tmp_name'];
            $to = $dir.'/'.$fname;
            
            if (!self::DirectoryExists($dir)) 
            {
                if (!self::DirectoryCreate($dir))
                {
                    return false; 
                }
            }
                
            if ( move_uploaded_file( $from, $to ) )
            {
                return true;
            } 
            else 
            {
                return false;
            }
        }
    }

}