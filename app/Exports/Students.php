<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;

class Students implements FromCollection
{

    protected $classId;

    public function __construct($classId)
    {
        $this->classId = $classId;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::where('class_id', $this->classId)->pluck('last_name','first_name');
    }
    // public function view(): View
    // {
    //     return view('exports.invoices', [
    //         'invoices' => Invoice::all()
    //     ]);
    // }
}
