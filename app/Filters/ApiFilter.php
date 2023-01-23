<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter {
    protected $safeparams =[];
    protected $columnMap = [];
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'gte' => '>=',
        'lte' => '<=',
        'ne' => '!='
    ];

    public function transform(Request $request){
        $eloquery = [];
        foreach($this->safeparams as $parm => $operators){
            $query = $request->query($parm);
            if(!isset($query)){
                continue;
            }
            $column = $this->columnMap[$parm] ?? $parm;
            foreach($operators as $operator){
                if(isset($query[$operator])){
                    $eloquery[] = [$column,$this->operatorMap[$operator],$query[$operator]];
                }
            }
        }
        return $eloquery;
    }
}
