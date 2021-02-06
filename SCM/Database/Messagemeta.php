<?php

namespace SCM\Database;


use Illuminate\Support\Facades\DB;



class Messagemeta
{
    /**
     * Insert meta data based on message_id
     * 
     * @param int    $message_id
     * @param string $meta_key
     * @param string $meta_value
     * 
     * @since   1.0.0
     * @version 1.0.0
     * @author  Mahmudul Hasan Mithu
     */
    public static function insert( int $message_id, string $meta_key, string $meta_value )
    {
        date_default_timezone_set('UTC');
        $datetime = date('Y-m-d H:i:s');
        DB::insert('INSERT INTO SCM_Messagemeta  VALUES( NULL, ?, ?, ?, ?)', [$message_id, htmlspecialchars(trim($meta_key)), htmlspecialchars(trim($meta_value)), $datetime]);
    }


    /**
     * select meta_value by message_id and meta_key
     * 
     * @param int    $message_id
     * @param string $meta_key
     * 
     * @return string meta_value
     *                if not found then return ''
     * 
     * @since   1.0.0
     * @version 1.0.0
     * @author  Mahmudul Hasan Mithu
     */
    public static function select( int $message_id, string $meta_key )
    {
        return DB::select('SELECT meta_value FROM SCM_Messagemeta WHERE   (`message_id`=? AND `meta_key`=?) ORDER BY id DESC', [$message_id, htmlspecialchars(trim($meta_key))])[0]->meta_value ?? '';
    }


    /**
     * delete all meta data by message_id and meta_key
     * 
     * @param int    $message_id
     * @param string $meta_key
     * 
     * 
     * @since   1.0.0
     * @version 1.0.0
     * @author  Mahmudul Hasan Mithu
     */
    public static function delete( int $message_id, string $meta_key )
    {
        DB::delete( 'DELETE FROM SCM_Messagemeta WHERE   (`message_id`=? AND `meta_key`=?)', [$message_id, htmlspecialchars(trim($meta_key))] );
    }
}