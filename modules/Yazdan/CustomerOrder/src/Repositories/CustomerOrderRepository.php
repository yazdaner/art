<?php

namespace Yazdan\CustomerOrder\Repositories;

class CustomerOrderRepository
{
    const SIZE_ONE = '20*30';
    const SIZE_TWO = '20*40';
    const SIZE_THREE = '40*60';
    const SIZE_FOUR = '50*60';
    const SIZE_FIVE = '60*70';

    static $sizes = [
        self::SIZE_ONE,
        self::SIZE_TWO,
        self::SIZE_THREE,
        self::SIZE_FOUR,
        self::SIZE_FIVE,
    ];

    const CANVAS_WHITE_NORMAL  = 'white normal';
    const CANVAS_DEEP = 'deep';

    static $canvas_types = [
        self::CANVAS_WHITE_NORMAL,
        self::CANVAS_DEEP,
    ];

    const SHAPE_VETICAL  = 'vertical';
    const SHAPE_HORIZONTAL = 'horizontal';
    const SHAPE_SQUARE = 'square';

    static $shapes = [
        self::SHAPE_VETICAL,
        self::SHAPE_HORIZONTAL,
        self::SHAPE_SQUARE,
    ];

    const SMS  = 'sms';
    const WHATSAPP = 'whatsapp';
    const TELEGRAM = 'telegram';
    
    static $invoicing = [
        self::SMS,
        self::WHATSAPP,
        self::TELEGRAM,
    ];
}
