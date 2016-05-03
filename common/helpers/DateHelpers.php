<?php

class DateHelpers
{
    const DATE_FORMAT = 'php:Y-m-d';
    const DATETIME_FORMAT = 'php:Y-m-d H:i:s';
    const TIME_FORMAT = 'php:H:i:s';


    public static function dateToHumanFormat($date)
    {
        return $formatted_date;
    }

    public static function monthNumToHuman($month)
    {

    }

    /**
     * Convert date in format dd-mm-yyyy to timestamp
     *
     * @param $date
     * @return int
     */
    public static function dateToTimestamp($date)
    {
        $date_to_convert = DateTime::createFromFormat("d-m-Y", $date);
        return $date_to_convert->getTimestamp();
    }

    /**
     * Convert timestamp to date format
     *
     * @param $timestamp
     * @return bool|string
     */
    public static function timestampToDate($timestamp)
    {
        return date("d-m-Y", $timestamp);
    }
}