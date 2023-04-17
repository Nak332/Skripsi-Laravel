<?php

namespace App\Services\V1;

use Illuminate\Http\Request;

class PatientQuery{
    protected $allowedParamater = [
        'id' => ['eq','gt','lt'],
        'name'=> ['eq'],
        'current_gender'=> ['eq'],
        'phone'=> ['eq'],
        'address'=> ['eq'],
        
            
    ];

    protected $columnMap = [
         'current_gender' => 'gender'  
    ];

    protected $operands = [
        'eq'=> '=',
        'lt'=>'<',
        'lte'=>'<=',
        'gt'=>'>',
        'gte'=>'>='
    ];

    public function transform(Request $request){
        $eloQuery = [];

        foreach($this->allowedParamater as $ap => $operands){
            $query = $request->query($ap);

            if(!isset($query)){
                continue;
            }

        $column = $this->columnMap[$ap] ?? $ap;

        foreach($operands as $op){
            if(isset($query[$op])){
                $eloQuery[] = [$column, $this->operands[$op],$query[$op]];
            }
        }
    }
    return $eloQuery;
}

}