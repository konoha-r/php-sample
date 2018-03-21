<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

require_once dirname(__FILE__).'/Enum.php';

final class ColorEnum extends Hss2Enum{

    const Black = 1;
    const Red = 2;
    const Blue = 3;
    const Yellow = 4;
    const White = 5;

    private static $list;

    final public static function to_string($v, $default=''){/*{{{*/
        if( $v == self::Black ){ return 'Black'; }
        if( $v == self::Red ){ return 'Red'; }
        if( $v == self::Blue ){ return 'Blue'; }
        if( $v == self::Yellow ){ return 'Yellow'; }
        if( $v == self::White ){ return 'White'; }
        return $default;
    }/*}}}*/

    final public static function consts(){/*{{{*/
        if( self::$list ){ return self::$list; }
        $consts = array( self::Black, self::Red, self::Blue, self::Yellow, self::White );
        foreach($consts as $value){
            self::$list[$value] = new ColorEnum($value);
        }
        return self::$list;
    }/*}}}*/

    final public static function get($value){/*{{{*/
        $consts = self::consts();
        if( isset($consts[$value]) ){ return $consts[$value]; }
        throw new InvalidArgumentException();
    }/*}}}*/

    public function equalOf($value){ return $this->valueOf() == $value; }
    public function equalWith($kbn){ return $this->valueOf() == $kbn->valueOf(); }

}


