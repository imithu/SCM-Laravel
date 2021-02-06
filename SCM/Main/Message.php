<?php

namespace SCM\Main;


use Illuminate\Support\Facades\DB;



class Message
{
    /**
     * delete a message
     * 
     * @since   1.0.0
     * @version 1.0.0
     * @author  Mahmudul Hasan Mithu
     */
    public static function delete( int $message_id )
    {
        DB::delete('DELETE FROM SCM_Messages WHERE id=?', [$message_id]);
        DB::delete('DELETE FROM SCM_Messagemeta WHERE message_id=?', [$message_id]);
    }
}