<?php

namespace App\DataTables;

use App\Models\PMBWawancaraModel;
use App\Models\WawancaraDataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class WawancaraDataTables extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<WawancaraDataTable> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'wawancaradatatables.action')
            ->addColumn('nomor', function ($row) {
                return 1;
            })
            ->addColumn("nama", function ($row) {
                return $row->registrasi->nama;
            })
            ->addColumn("email", function ($row) {
                return $row->registrasi->users->email;
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
                $urlLulusWawancara = url('/pmb/wawancara/lulus') . "/" . $row->id;
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
     * @return QueryBuilder<WawancaraDataTable>
     */
    public function query(PMBWawancaraModel $model): QueryBuilder
    {

        return $model->with(['registrasi' => function ($queryRegistrasi) {
            return $queryRegistrasi->with(['users' => function ($queryUsers) {
                return $queryUsers->select(['id', 'username', 'email']);
            }, 'jalur_masuk' => function ($queryJalurMasuk) {
                return $queryJalurMasuk->with(['jalur', 'gelombang']);
            }])->select(['id', 'pmb_jalur_masuk_id', 'pmb_users_id', 'nama', 'nomor_registrasi', 'jenis_kelamin', 'hp_mahasiswa']);
        }]);
        // return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('wawancaradatatables-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->addTableClass('table table-striped table-hovered table-bordered')
            ->selectStyleSingle()
            ->scrollX(true)
            ->parameters(['autoWidth' => false])
            ->parameters([
                'columnDefs' => [
                    [
                        'targets'   => '_all',
                        'className' => 'text-center',
                    ],
                ],
            ])
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
            Column::computed("nomor")->title("NO"),
            Column::computed('nama'),
            Column::computed('email'),
            Column::make('nomor_registrasi'),
            Column::computed('gelombang'),
            Column::computed('jalur'),
            Column::computed('tahun'),
            Column::computed('status')->title("Status Wawancara"),
            Column::computed('aksi')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'WawancaraDataTables_' . date('YmdHis');
    }
}
