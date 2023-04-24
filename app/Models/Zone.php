<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $table = 'zone';
    protected $guarded = [
        'id'
    ];
    function getList($where = null, $root = 1, $lv = 0, $strLevel = "--", &$index = 0)
    {
        $cate = Zone::where(array('parent_id' => $root))->where('id', '!=', '1')->get();
        // dd($cate);  
        $result = null;
        foreach ($cate as $c) {
            $c->name = str_repeat($strLevel, $lv) . '' . $c->name;
            $result[$index++] = $c;
            $datatemp = $this->getList($where, $c->id, $lv + 1, $strLevel, $index);
            if ($datatemp != null) {
                $result = $result + $datatemp;
            }

        }
        
        return $result;
    }
    function getIDs($id = 1, $index = 0)
    {
        $cate = Category::where(array('parent_id' => $id))->where("id", "!=", "1")->select('id')->get();
        $result = null;
        foreach ($cate as $c) {
            $result[$c->id] = $c->id;
            $dataTemp = $this->getIDs($c->id, $index);
            if ($dataTemp != null) {
                $result = $result + $dataTemp;
            }
        }
        return $result;
    }
}
