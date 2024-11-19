<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DataTable extends Component
{
    public $idTable;
    public $columns;
    public $columnsClass;
    public $datos;
    /**
     * Create a new component instance.
     *
     * @param string $idTable
     * @param array $columns
     * @param array $columnsClass
     * @param array $datos
     */
    public function __construct($idTable = null, $columns = [], $columnsClass = [], $datos = [])
    {
        //dd($idTable, $columns, $datos, $columnsClass);
        $this->idTable = $idTable;
        $this->columns = $columns;
        $this->columnsClass = $columnsClass;
        $this->datos = $datos;
    }

    public function render()
    {
        return view('components.data-table');
    }
}
