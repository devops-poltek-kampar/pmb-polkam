<?php

namespace App\DataTables;

use App\Models\MasterProgramStudiModel;
use App\Models\PindahProdi;
use App\Models\PMBKelulusanModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PindahProdiDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<PindahProdi> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {

        $prodi = MasterProgramStudiModel::lazy();
        return (new EloquentDataTable($query))
            ->addColumn('action', 'pindahprodi.action')
            ->addColumn("aksi", function ($row) use ($prodi) {
                $html = "";
                foreach ($prodi as $key => $value) {
                    $html .= "<option>" . $value->nama . "</option>";
                }
                $data = json_encode($row);
                return <<<HTML
                    <button type="button" onclick='openModal($data)' class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modal-ganti-prodi" title="Pindah program studi"><i class="bi bi-arrow-left-right"></i></button>
                HTML;
            })
            ->addColumn("nama", function ($row) {
                return $row->registrasi->nama;
            })
            ->addColumn("hp", function ($row) {
                return $row->registrasi->hp_mahasiswa;
            })
            ->rawColumns(['aksi'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<PindahProdi>
     */
    public function query(PMBKelulusanModel $model): QueryBuilder
    {
        return $model->newQuery()->with(['prodi' => function ($queryProdi) {
            return $queryProdi->select(['kode_prodi', "nama"]);
        }, 'registrasi' => function ($queryRegistrasi) {
            return $queryRegistrasi->select(['id', 'nomor_registrasi', "pmb_jalur_masuk_id", "nama", "hp_mahasiswa"]);
        }]);
        // return $model->with(['prodi', 'registrasi' => function ($queryRegistrasi) {
        //     return $queryRegistrasi->select(['id', 'nomor_registrasi', "pmb_jalur_masuk_id", "nama", "hp_mahasiswa"]);
        // }])->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pindahprodi-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            // ->addTableClass('table table-striped table-bordered table-hovered')
            ->parameters(['autoSize' => false])
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('nomor_registrasi')->addClass('text-start'),
            Column::computed('nama'),
            Column::make('prodi.nama')->title("Nama"),
            Column::computed('hp'),
            Column::computed('aksi'),

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PindahProdi_' . date('YmdHis');
    }
}
