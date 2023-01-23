<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class CompanyFilter extends ApiFilter{
    protected $safeparams =[
        'companyName' => ['eq'],
        'status' => ['eq','ne'],
    ];
    protected $columnMap = [
        'companyName' => 'company_name'
    ];
}
