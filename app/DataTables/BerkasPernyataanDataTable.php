<?php

namespace App\DataTables;

use App\Models\BerkasPernyataan;
use App\Models\PMBBerkasPernyataanModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BerkasPernyataanDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<BerkasPernyataan> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'berkaspernyataan.action')
            ->addColumn('status', function ($row) {
                switch ($row->status) {
                    case 'Approve':
                        return <<<HTML
                            <span class="badge bg-success">$row->status</span>
                        HTML;
                        break;

                    case 'Reject':
                        return <<<HTML
                            <span class="badge bg-danger">$row->status</span>
                        HTML;

                        break;

                    default:
                        return <<<HTML
                            <span class="badge bg-info">$row->status</span>
                        HTML;
                        break;
                }
            })
            ->addColumn('nama', function ($row) {
                return $row->registrasi->nama;
            })
            ->addColumn('gelombang', function ($row) {
                return $row->registrasi->jalur_masuk->gelombang->nama;
            })
            ->addColumn('tahun', function ($row) {
                return $row->registrasi->jalur_masuk->gelombang->tahun;
            })
            ->addColumn('jalur', function ($row) {
                return $row->registrasi->jalur_masuk->jalur->tahun;
            })
            ->addColumn("aksi", function ($row) {

                $linkBerkas = asset('/storage') . "/" . $row->path;
                $linkApprove = url('/akademik/berkas-pernyataan/Approve') . "/" . $row->id;
                $linkReject = url('/akademik/berkas-pernyataan/Reject') . "/" . $row->id;
                $nama = $row->registrasi->nama;
                return <<<HTML
                
                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#berkas$row->id">Lihat File</button>
            
                <div class="modal modal-xl fade" id="berkas$row->id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Berkas Pernyataan $nama</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe class="w-100" height="700" src="$linkBerkas" frameborder="0"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- <a href="$linkApprove" class="btn btn-primary">Approve</a> -->

                        <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Status
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="$linkReject">Reject</a></li>
                            <li><a class="dropdown-item" href="$linkApprove">Approve</a></li>
                        </ul>
                        </div>

                    </div>
                    </div>
                </div>
                </div>

                HTML;
            })
            ->rawColumns(['aksi', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<BerkasPernyataan>
     */
    public function query(PMBBerkasPernyataanModel $model): QueryBuilder
    {
        return $model->with(['registrasi' => function ($queryRegistrasi) {
            return $queryRegistrasi->with(['jalur_masuk' => function ($queryJalurMasuk) {
                return $queryJalurMasuk->with(['jalur', 'gelombang']);
            }])->select(['nomor_registrasi', "pmb_jalur_masuk_id", 'nama']);
        }])->select();
        // return $model->with(['registrasi'])->select();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('berkaspernyataan-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->scrollX(true)
            ->addTableClass('table table-striped table-hovered table-bordered')
            ->parameters([
                'autoWidth' => false,
                // 'dom' => 'Bfrtip',
                // 'buttons' => ['export', 'print', 'reset', 'reload'],
            ])
            ->orderBy(1)
            ->selectStyleSingle();
        // ->buttons([
        //     Button::make('excel'),
        //     Button::make('csv'),
        //     Button::make('pdf'),
        //     Button::make('print'),
        //     Button::make('reset'),
        //     Button::make('reload')
        // ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('nomor_registrasi'),
            Column::computed('nama'),
            Column::computed('gelombang'),
            Column::computed('tahun'),
            Column::computed('jalur'),
            Column::computed('status'),
            Column::computed('aksi')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'BerkasPernyataan_' . date('YmdHis');
    }
}
