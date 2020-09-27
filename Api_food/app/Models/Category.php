<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categorys';
    protected $fillable = ['name'];

    const INTERVAL = [
        'breakfast' => ['start' => '07:00:00', 'end' => '11:00:00'],
        'lunch'     => ['start' => '13:00:00', 'end' => '15:00:00'],
        'dinner'    => ['start' => '18:00:00', 'end' => '20:00:00'],
        'snack'     => ['start' => '00:00:00', 'end' => '23:00:00']
    ];

    static public function getIdCategory($name)
    {
        $arr = self::INTERVAL;
        return array_search($name, array_keys($arr)) + 1;
    }

    static public function getNowIdCategory($time = null)
    {
        $now = (new \DateTime($time))->format('H:i:s');
        foreach (self::INTERVAL as $label => $interval){
            if ($now >= $interval['start'] and $now < $interval['end'])
                return self::getIdCategory($label);
        }
        return self::getIdCategory('snack');
    }


}
