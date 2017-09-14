<?php

namespace App\DataTables;

use App\Models\Docente;
use Form;
use Yajra\Datatables\Services\DataTable;

class DocenteDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'docentes.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $docentes = Docente::query();

        return $this->applyScopes($docentes);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'nombres' => ['name' => 'nombres', 'data' => 'nombres'],
            'apellidos' => ['name' => 'apellidos', 'data' => 'apellidos'],
            'dpi' => ['name' => 'dpi', 'data' => 'dpi'],
            'direccion' => ['name' => 'direccion', 'data' => 'direccion'],
            'telefono' => ['name' => 'telefono', 'data' => 'telefono']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'docentes';
    }
}
