<?php

namespace App\DataTables;

use App\Models\Kelulusan;
use App\Models\PMBKelulusanModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KelulusanDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Kelulusan> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'kelulusan.action')
            ->addColumn('aksi', function ($row) {
                return <<<HTML
                    <button class="btn btn-sm btn-primary">Edit</button>
                HTML;
            })
            ->addColumn('prodi', function ($row) {
                return $row->prodi->jenjang . " " . $row->prodi->nama;
            })
            ->addColumn('status', function ($row) {
                switch ($row->status) {
                    case 'LULUS':
                        return <<<HTML
                           <span class="badge bg-success">$row->status</span>
                        HTML;
                        break;

                    default:
                        return <<<HTML
                           <span class="badge bg-danger">$row->status</span>
                        HTML;
                        break;
                }
            })
            ->rawColumns(['aksi', 'status', 'prodi'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Kelulusan>
     */
    public function query(PMBKelulusanModel $model): QueryBuilder
    {
        return $model->with(['registrasi' => function ($queryRegistrasi) {
            return $queryRegistrasi->with(['jalur_masuk' => function ($queryJalurMasuk) {
                return $queryJalurMasuk->with(['gelombang' => function ($queryGelombang) {
                    return $queryGelombang->select(['id', 'nama', 'tahun']);
                }, 'jalur' => function ($queryJalur) {
                    return $queryJalur->select(['id', 'nama']);
                }])->select(['id', 'pmb_gelombang_id', 'pmb_jalur_id']);
            }])->select(['id', 'nomor_registrasi', 'nama', 'pmb_jalur_masuk_id']);
        }, 'prodi' => function ($queryProdi) {
            return $queryProdi->select(['id', 'kode_prodi', 'nama', 'jenjang']);
        }])->select();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('kelulusan-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
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
            Column::make('registrasi.nama'),
            Column::make('nomor_registrasi'),
            Column::make("registrasi.jalur_masuk.gelombang.nama")->title("Gelombang"),
            Column::make("registrasi.jalur_masuk.gelombang.tahun")->title("Tahun"),
            Column::make("registrasi.jalur_masuk.jalur.nama")->title("Jalur Registrasi"),
            Column::computed('prodi'),
            Column::computed('status'),
            Column::make("aksi")
            // Column::computed('action')
            //     ->exportable(false)
            //     ->printable(false)
            //     ->width(60)
            //     ->addClass('text-center'),
            // Column::make('id'),
            // Column::make('add your columns'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Kelulusan_' . date('YmdHis');
    }
}
