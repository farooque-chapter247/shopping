<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OrderStatus extends Enum
{
    const  NEW_ORDER =  'New Order';
    const  PACKED=  'Packed';
    const  ON_WAY=  'On the way';
    const  DELIVERED=  'Delivered';
    const  CANCELLED=  'Cancelled';
    const  RETURNED=  'Returned';

}