<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class AlertStatusClass extends Enum
{
    const CLASS_500 =  'danger';
    const CLASS_200 =  'success';
}