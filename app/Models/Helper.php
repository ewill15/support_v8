<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Helper extends Model
{
    public static function getToken ($length = 50)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen ($codeAlphabet) - 1;
        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[self::crypto_rand_secure (0, $max)];
        }
        return $token;
    }


    public static function crypto_rand_secure ($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) return $min;
        $log = ceil (log ($range, 2));
        $bytes = (int)($log / 8) + 1;
        $bits = (int)$log + 1;
        $filter = (int)(1 << $bits) - 1;
        do {
            $rnd = hexdec (bin2hex (openssl_random_pseudo_bytes ($bytes)));
            $rnd = $rnd & $filter;
        } while ($rnd >= $range);
        return $min + $rnd;
    }

    public static function generatePassword ($length)
    {
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        return substr (str_shuffle ($chars), 0, $length);
    }

    public static function saveBase64Image ($file_input, $folder)
    {
        $data = $file_input;
        list($type, $data) = explode (';', $data);
        list(, $data) = explode (',', $data);
        $split = explode ('/', $type);
        $type = $split[1];
        $data = base64_decode ($data);
        if (!is_dir (base_path () . "/public/img/$folder")) {
            mkdir (base_path () . "/public/img/$folder", 0755, true);
        }
        $imageName = 'img_' . self::getToken () . '.' . $type;
        
        file_put_contents (base_path () . "/public/img/" . $folder . "/" . $imageName, $data);//create or open a existing file

        return $imageName;
    }

    public static function saveImage ($files, $folder)
    {
        $names = [];
        if (is_array ($files)) {
            foreach ($files as $file) {
                if (!file_exists (base_path () . "/public/img/$folder")) {
                    mkdir (base_path () . "/public/img/$folder",0755,true);
                }
                $name = 'img_' . self::getToken () . '.' . $file->getClientOriginalExtension ();

                $path = public_path () . "/img/" . $folder;
                $file->move ($path, $name);
                array_push ($names, $name);
            }
        } else {
            if (!file_exists (base_path () . "/public/img/$folder")) {
                mkdir (base_path () . "/public/img/$folder",0755,true);
            }
            $path = public_path () . "/img/" . $folder;
            $name = 'img_'.self::getToken().'.'. $files->getClientOriginalExtension ();
            $files->move ($path, $name);
            array_push ($names, $name);        
        }
        return $name;
    }
    public static function saveImage2($file, $folder)
    { 
        $upload_image = $_FILES['image']['name'][0];        
        $ext = pathinfo($upload_image,PATHINFO_EXTENSION);

        $name = 'img'.self::getToken().'.'.$ext;
        $final_path = public_path()."/img/".$folder;        
        $tmp_name = $_FILES["image"]["tmp_name"][0];

        move_uploaded_file($tmp_name, "$final_path/$name");

        return $name;
    }
    public static function deleteImage ($name, $folder)
    { 
        if (strlen ($name) > 0) 
            if (file_exists (public_path () . "/img/" . $folder . '/' . $name))
                unlink (public_path () . "/img/" . $folder . '/' . $name);
    }

    public static function saveVideo ($file, $folder)
    {
        if (!file_exists ($folder)) {
            mkdir ($folder);
        }
        $name = 'video' . self::getToken () . '.' . $file->getClientOriginalExtension ();
        $path = public_path () . "/videos/" . $folder;
        $file->move ($path, $name);

        return $name;
    }

    public static function deleteVideo ($name, $folder)
    {
        if (strlen ($name) > 0) if (file_exists (public_path () . "/videos/" . $folder . '/' . $name)) unlink (public_path () . "/videos/" . $folder . '/' . $name);
    }

    public static function savePdf ($file, $folder)
    {
        if (!file_exists ($folder)) {
            mkdir ($folder);
        }
        $name = 'pdf' . self::getToken () . '.' . $file->getClientOriginalExtension ();
        $path = public_path () . "/pdf/" . $folder;
        $file->move ($path, $name);

        return $name;
    }

    public static function deletePdf ($name, $folder)
    {
        if (strlen ($name) > 0) if (file_exists (public_path () . "/pdf/" . $folder . '/' . $name)) unlink (public_path () . "/pdf/" . $folder . '/' . $name);
    }

    public static function check_route ($route)
    {
        if (is_array ($route)) {
            $current_url = strtolower (\Route::getCurrentRoute ()->uri ());
            foreach ($route as $item) {
                if (strpos ($current_url, $item)) return 'active';
            }
            return '';
        } else
            return strpos (strtolower (\Route::getCurrentRoute ()->uri ()), $route) !== false ? 'active' : '';
    }

    public static function show_date_spanish($date,$full_date = true)
    {
        $dia = ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'];
        $mes = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

        $dia_string = $dia[(int)date('w',strtotime($date))]; 
        $dia_number = date('j',strtotime($date));
        $mes_string = $mes[(int)date('n',strtotime($date))-1];
        $time = date('G:i',strtotime($date));
        
        if($full_date)
            $string_date = $date->format ('d') . ' de ' . $mes_string;
        else
            $string_date = $dia_string .' '.$dia_number .' de '. $mes_string.' '.$time;

        return  $string_date;
    }

    public static function messageCounterPagination($total, $page, $pagination,$lang="en"){
        $initial = ($page == 0)? 1 : $page;
        $start = ($initial * $pagination) - ($pagination -1);
        $end = $initial * $pagination;
        if ($end > $total)
            $end = $total;
        if(strtolower($lang)=='es')
            $text = "Mostrando registros del ".$start." al ".$end." de un total de ".$total." registros";
        else
            $text = "Showing records from ".$start." to ".$end." of ".$total." records";
        return $text;
    }

    /** 
     * @params  $lang   string   language
     * @params  @type   string   create-update-delete
     */
    public static function contentFlashMessage($type)
    {
       $lang = strtolower(app()->getLocale());
       if ($lang=='en') { //english
            switch ($type) {
                case 'create':
                    $msg['success'] = 'Created item successfully';
                    $msg['error'] = 'Occured an error creating item';
                    break;
                case 'update':
                    $msg['success'] = 'Updated item successfully';
                    $msg['error'] = 'Occured an error updating item';
                    break;
                case 'update':
                    $msg['success'] = 'Reset passwordsuccessfully';
                    $msg['error'] = 'Occured an error reseting password';
                    break;
                
                default: //delete
                    $msg['success'] = 'item deleted';
                    $msg['error'] = 'Could not delete item';
                    break;
            }
        }   
        else{//spanish
            switch ($type) {
                case 'create':
                    $msg['success'] = 'Item creado exitosamente';
                    $msg['error'] = 'Ocurrio un error al crear el item';
                    break;
                case 'update':
                    $msg['success'] = 'Se ha actualizado el item';
                    $msg['error'] = 'Hubo un error al actualizar el item';
                    break;
                case 'reset':
                    $msg['success'] = 'El password fue reseteado';
                    $msg['error'] = 'Hubo un error al resetear el password';
                    break;                    
                
                default: //delete
                    $msg['success'] = 'Item eliminado';
                    $msg['error'] = 'No se pudo eliminar el item';
                    break;
            }
        }

        return $msg;
    }

    public static function messageCountResults($total,$keyword)
    {
        if ($total == 1 && !$keyword)
            return $total." resultado encontrado";
        if ($total > 1 && !$keyword)
            return $total." resultados encontrados";
        if (!$keyword)
            return null;
        if ($total > 0) {
            if ($total == 1)
                $temp = " resultado encontrado ";
            else
                $temp = " resultados encontrados ";
            return $total .$temp."para <span>\"" . $keyword . "\"</span>";
        }else
            return "No hay contenido disponible aplicando los filtros seleccionados";
    //        return "No se encontraron resultados para <span>".$keyword."</span>";
    }

    public static function get_database_date($date,$time=true)
    {
        if($time)
            $format = 'd-m-Y H:i:s';
        else
            $format = 'd-m-Y';
            
        return Carbon::parse($date)->format($format);
    }

    public static function get_english_date($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }
}
