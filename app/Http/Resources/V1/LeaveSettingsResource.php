<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class LeaveSettingsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
                'id' =>$this->id,
                'daysLimit'=> $this->days_limit ,
                'daysGap'=> $this->days_gap ,
                'casual'=>   $this->casual_per_month ,
                'sickLeaves'=> $this->sick_per_month ,
                'maternity'=> $this->max_maternity ,
                'paternity'=> $this->max_paternity ,
                'breaverment'=> $this->max_bereavement ,
                'otherLeave'=>  $this->max_other_leave ,
                'carryPerYear'=> $this->carry_forward_per_year

        ];
    }
}
