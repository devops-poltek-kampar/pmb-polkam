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

        // $prodi = MasterProgramStudiModel::lazy();
        return (new EloquentDataTable($query))
            ->addColumn('action', 'pindahprodi.action')
            ->addColumn("aksi", function ($row) {
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
            ->addIndexColumn()
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
            return $queryRegistrasi->with(['jalur_masuk' => function ($queryJalurMasuk) {
                return $queryJalurMasuk->with(['jalur' => function ($queryJalur) {
                    return $queryJalur->select(['id', 'nama']);
                }, 'gelombang' => function ($queryGelombang) {
                    return $queryGelombang->select(['id', 'nama', 'tahun']);
                }]);
            }])->select(['id', 'nomor_registrasi', "pmb_jalur_masuk_id", "nama", "hp_mahasiswa"]);
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
            ->addTableClass('table table-bordered border-primary table-success table-hover')
            ->orderBy(1)
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
            Column::computed('DT_RowIndex')
                ->title('No')
                ->searchable(false)
                ->orderable(false)
                ->width(50)
                ->addClass('text-center'),
            Column::make('nomor_registrasi')->addClass('text-start'),
            Column::computed('nama'),
            Column::make('prodi.nama')->title("Prodi"),
            Column::computed('hp')->addClass('text-start'),
            Column::make('registrasi.jalur_masuk.gelombang.nama')->title("Gelombang"),
            Column::make('registrasi.jalur_masuk.gelombang.tahun')->title("Tahun"),
            Column::make('registrasi.jalur_masuk.jalur.nama')->title("Jalur"),
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
