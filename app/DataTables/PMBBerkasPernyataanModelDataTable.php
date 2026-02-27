<?php

namespace App\DataTables;

use App\Models\PMBBerkasPernyataanModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PMBBerkasPernyataanModelDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<PMBBerkasPernyataanModel> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', 'pmbberkaspernyataanmodel.action')
            ->addColumn('status', function ($row) {
                switch ($row->status) {
                    case 'Review':
                        return <<<HTML
                            <span class="badge bg-warning">$row->status</span>
                        HTML;
                        break;
                    case 'Reject':
                        return <<<HTML
                            <span class="badge bg-danger">$row->status</span>
                        HTML;
                        break;
                    case 'Approve':
                        return <<<HTML
                            <span class="badge bg-success">$row->status</span>
                        HTML;
                        break;

                    default:
                        return "Nothing";
                        break;
                }
            })
            ->addColumn('aksi', function ($row) {

                $linkFile = asset('/storage') . $row->path;

                return <<<HTML
                
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#file$row->id">
                    Lihat File
                </button>

                <!-- Modal -->
                <div class="modal modal-xl fade" id="file$row->id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">File Pernyataan $row->nomor_registrasi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe src="$linkFile" class="w-100 h-100" frameborder="0"></iframe>
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary"></button>
                    </div> -->
                    </div>
                </div>
                </div>
                
                HTML;
            })
            ->rawColumns(['status', 'aksi'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<PMBBerkasPernyataanModel>
     */
    public function query(PMBBerkasPernyataanModel $model): QueryBuilder
    {
        // return $model->newQuery();
        return $model->with(['registrasi' => function ($queryRegistrasi) {
            return $queryRegistrasi->with(['jalur_masuk' => function ($queryJalurMasuk) {
                return $queryJalurMasuk->with(['jalur', 'gelombang']);
            }])->select(['id', 'nama', 'pmb_users_id', 'pmb_jalur_masuk_id', "nomor_registrasi"]);
        }]);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pmbberkaspernyataanmodel-table')
            ->columns($this->getColumns())
            ->minifiedAjax(url('/pmb/berkas-pernyataan'))
            ->orderBy(1)
            ->addTableClass('table table-striped table-hovered table-bordered')
            ->scrollX(true)
            ->parameters(['autoWidth' => false])
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
            Column::make('registrasi.nama')->title("Nama"),
            Column::make('nomor_registrasi'),
            Column::make('registrasi.jalur_masuk.gelombang.nama')->title("Gelombang"),
            Column::make('registrasi.jalur_masuk.gelombang.tahun')->title("Tahun"),
            Column::make('registrasi.jalur_masuk.jalur.nama')->title("Jalur"),
            Column::computed('status')->title("Status"),
            Column::make('aksi')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PMBBerkasPernyataanModel_' . date('YmdHis');
    }
}
