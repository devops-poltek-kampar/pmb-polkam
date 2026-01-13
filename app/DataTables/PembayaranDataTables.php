<?php

namespace App\DataTables;

use App\Models\PembayaranDataTable;
use App\Models\PMBBuktiPembayaranModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PembayaranDataTables extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<PembayaranDataTable> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'pembayarandatatables.action')
            ->addColumn('gelombang', function ($row) {
                return $row->registrasi->jalur_masuk->gelombang->nama;
            })
            ->addColumn('jalur', function ($row) {
                return $row->registrasi->jalur_masuk->jalur->nama;
            })
            ->addColumn('tahun', function ($row) {
                return $row->registrasi->jalur_masuk->gelombang->tahun;
            })
            ->addColumn('status', function ($row) {
                switch ($row->status) {
                    case 'Pending':
                        return <<<HTML
                                <span class="badge bg-info">$row->status</span> 
                            HTML;
                        break;

                    case 'Reject':
                        return <<<HTML
                                <span class="badge bg-danger">$row->status</span> 
                            HTML;
                        break;

                    case 'Accept':
                        return <<<HTML
                                <span class="badge bg-success">$row->status</span> 
                            HTML;
                        break;
                    default:
                        break;
                }
            })
            ->addColumn('aksi', function ($row) {
                $urlFile = asset('/storage') . "/$row->path";
                $urlAksi = url('/keuangan/set-status-pembayaran') . "/" . $row->pmb_registrasi_nomor_registrasi;
                return <<<HTML

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#file$row->id">
                Lihat File
                </button>

                <div class="dropdown">
                <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    $row->status
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="$urlAksi/Pending/$row->kategori">Pending</a></li>
                    <li><a class="dropdown-item" href="$urlAksi/Reject/$row->kategori">Reject</a></li>
                    <li><a class="dropdown-item" href="$urlAksi/Accept/$row->kategori">Accept</a></li>
                </ul>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="file$row->id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title" id="exampleModalLabel">Pembayaran $row->id $row->kategori Nomor Registrasi $row->pmb_registrasi_nomor_registrasi</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img class="w-100 h-100" src="$urlFile" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>
                    
                HTML;
            })
            ->rawColumns(['gelombang', 'aksi', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<PembayaranDataTable>
     */
    public function query(PMBBuktiPembayaranModel $model): QueryBuilder
    {
        return $model->with(['registrasi' => function ($queryRegistrasi) {
            return $queryRegistrasi->with(['jalur_masuk' => function ($queryJalurMasuk) {
                return $queryJalurMasuk->with(['gelombang']);
            }]);
        }]);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pembayarandatatables-table')
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
            Column::make('registrasi.nama')->title("Nama"),
            Column::make("pmb_registrasi_nomor_registrasi")->className('text-start')->title("Nomor Registrasi"),
            Column::computed('gelombang'),
            Column::computed('jalur'),
            Column::computed('tahun'),
            Column::make('kategori'),
            Column::computed('status'),
            Column::computed('aksi')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PembayaranDataTables_' . date('YmdHis');
    }
}
