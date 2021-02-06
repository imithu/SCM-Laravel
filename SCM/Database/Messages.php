<?php

namespace SCM\Database;


use Illuminate\Support\Facades\DB;



class Messages
{
    /**
     * add data and return last id from database
     * 
     * 
     * @return int
     * 
     * @since   1.0.0
     * @version 1.0.0
     * @author  Mahmudul Hasan Mithu
     */
    public static function last_id()
    {
        date_default_timezone_set('UTC');
        $datetime = date('Y-m-d H:i:s');

        DB::insert( 'INSERT INTO SCM_Messages (`id`, `archive`, `important`, `status`, `datetime` ) VALUES( NULL, ?, ?, ?, ? )', ['no', 'no', 'unread', $datetime ] );
        $last_id = ((array) DB::select( 'SELECT MAX(id) FROM SCM_Messages' )[0])['MAX(id)'];

        return $last_id;
    }




    /**
     * 
     * update value of a column by id
     * 
     * @param int    $id
     * @param string $columnName
     * @param string $value
     * 
     * 
     * @since   1.0.0
     * @version 1.0.0
     * @author  Mahmudul Hasan Mithu
     */
    public static function update( int $id, string $columnName, string $value )
    {
        DB::update( "UPDATE SCM_Messages SET {$columnName}=? WHERE `id`=?", [ htmlspecialchars(trim($value)), $id ] );
    }




    /**
     * 
     * select value of a column by id
     * 
     * @param int    $id
     * @param string $columnName
     * 
     * @return  string  value
     *                  if fail then ''
     * 
     * @since   1.0.0
     * @version 1.0.0
     * @author  Mahmudul Hasan Mithu
     */
    public static function select( int $id, string $columnName )
    {
        return  DB::select("SELECT {$columnName} FROM SCM_Messages WHERE    `id`=? ORDER BY id DESC", [  $id ] )[0]->$columnName ?? '';
    }
}