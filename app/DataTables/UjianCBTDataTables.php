<?php

namespace App\DataTables;

use App\Models\PMBCBTModel;
use App\Models\UjianCBTDataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UjianCBTDataTables extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<UjianCBTDataTable> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'ujiancbtdatatables.action')
            ->addColumn("aksi", function ($row) {
                $url = url("/pmb/ujian-cbt/lulus/" . $row->id);
                return <<<HTML
                    <a href="$url" class="btn btn-sm btn-primary">Lulus</a>
                HTML;
            })->addColumn("nama", function ($row) {
                return $row->registrasi->nama;
            })
            ->addColumn("gelombang", function ($row) {
                return $row->registrasi->jalur_masuk->gelombang->nama;
            })
            ->addColumn("jalur", function ($row) {
                return $row->registrasi->jalur_masuk->jalur->nama;
            })
            ->addColumn("tahun", function ($row) {
                return $row->registrasi->jalur_masuk->gelombang->tahun;
            })
            ->addColumn('aksi', function ($row) {
                $urlLulusWawancara = url('/pmb/ujian-cbt/lulus') . "/" . $row->id;
                return <<<HTML
                    <a href="$urlLulusWawancara" class="btn btn-sm btn-primary">Lulus</a>
                HTML;
            })
            ->addColumn("status", function ($row) {
                $html = "";
                switch ($row->status) {
                    case 'Menunggu':
                        $html = <<<HTML
                            <span class="badge bg-info">$row->status</span>
                        HTML;
                        break;

                    case 'Tidak Lulus':
                        $html = <<<HTML
                            <span class="badge bg-danger">$row->status</span>
                        HTML;
                        break;
                    case 'Lulus':
                        $html = <<<HTML
                            <span class="badge bg-primary">$row->status</span>
                        HTML;
                        break;
                }
                return $html;
            })
            ->rawColumns(['aksi', 'status', 'gelombang', 'jalur', 'nama'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<UjianCBTDataTable>
     */
    public function query(PMBCBTModel $model): QueryBuilder
    {
        // return $model->newQuery();
        return $model->with(['registrasi' => function ($queryRegistrasi) {
            return $queryRegistrasi->with(['jalur_masuk' => function ($queryJalurMasuk) {
                return $queryJalurMasuk->with(['gelombang', 'jalur']);
            }]);
        }]);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('ujiancbtdatatables-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters(['autoWidth' => false])
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
            Column::computed('nama'),
            Column::make('nomor_registrasi'),
            Column::computed('gelombang'),
            Column::computed('tahun'),
            Column::computed('jalur'),
            Column::computed('status')->title("Status Ujian"),
            Column::computed("aksi")
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'UjianCBTDataTables_' . date('YmdHis');
    }
}
