<?php
namespace App\Repositories;

use App\Models\Calendar;

class CalendarRepository{

    private $calendar;

    public function __construct(Calendar $calendar){
        $this->calendar = $calendar;
    }

    public function create(array $data){
        return $this->calendar->create($data);
    }

    public function update(array $data, $id){
        return $this->calendar->where('id',$id)->update($data);
    }

    public function findOrFail($id){
        return $this->calendar->find($id);
    }

    public function getEvents(){
        return $this->calendar->get();
    }

    public function delete($id){
        $data = $this->calendar->find($id);
        return $data->delete();
    }

    public function deleteMultiple($ids){
        $data = $this->calendar->whereIn('id', $ids)->get();
        return $data->delete();
    }

}
