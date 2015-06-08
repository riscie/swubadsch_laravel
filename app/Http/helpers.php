<?php
/**
 * Created by PhpStorm.
 * User: lh
 * Date: 03.06.2015
 * Time: 14:58
 */

function getCurrentDates()
{

    $first = new DateTime();
    $last = new DateTime();
    $last->modify('+7 day');
    $period = new DatePeriod($first,new DateInterval('P1D'),$last);

    return iterator_to_array($period);
}