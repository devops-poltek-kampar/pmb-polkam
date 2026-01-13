<?php

namespace App\DataTables;

use App\Models\DataRegistrasi;
use App\Models\PMBRegistrasiModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DataRegistrasiDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<DataRegistrasi> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                return "Data";
            })->addColumn("aksi", function ($row) {
                $url = url("/pmb/calon-mahasiswa/detail-registrasi/" . $row->id);
                return <<<HTML
                 <a href="$url" class="btn btn-sm btn-primary"><i class="bi bi-eye-fill"></i></a>
                HTML;
            })
            ->addColumn("gelombang", function ($row) {
                return $row->jalur_masuk->gelombang->nama;
            })
            ->addColumn("tahun", function ($row) {
                return $row->jalur_masuk->gelombang->tahun;
            })
            ->addColumn("jalur", function ($row) {
                return $row->jalur_masuk->jalur->nama;
            })
            ->addColumn("status", function ($row) {

                $color = match ($row->status_bayar_registrasi) {
                    'Pending' => 'warning',
                    'Done'    => 'success',
                    default   => 'danger',
                };
                return <<<HTML
                    <span class="badge text-bg-$color">$row->status_bayar_registrasi</span>
                HTML;
            })
            ->addColumn('status_registrasi', function ($row) {
                $color = match ($row->status_registrasi) {
                    'Review' => 'warning',
                    'Approve'    => 'success',
                    "Reject" => "danger"
                };
                return <<<HTML
                    <span class="badge text-bg-$color">$row->status_registrasi</span>
                HTML;
            })
            ->rawColumns(['aksi', 'status', 'jalur', 'gelombang', 'status_registrasi'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<DataRegistrasi>
     */
    public function query(PMBRegistrasiModel $model): QueryBuilder
    {
        return $model->with(['lampiran', 'users', 'bukti_pembayaran', 'jalur_masuk']);
        // return $model->with(['lampiran', 'users', 'bukti_pembayaran', 'jalur_masuk' => function ($queryJalurMasuk) {
        //     return $queryJalurMasuk->with(['jalur', 'gelombang']);
        // }])->select(["id", "status_bayar_registrasi", "nama", "pmb_users_id", "nomor_registrasi"]);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('dataregistrasi-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
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
            Column::make("nama")->addClass("text-start"),
            Column::make("nomor_registrasi")->addClass("text-start"),
            Column::make('hp_mahasiswa')->title("Nomor HP"),
            Column::make("users.email")->addClass("text-start")->title("Email"),
            Column::computed('gelombang'),
            Column::computed('tahun'),
            Column::computed('jalur'),
            Column::computed("status")->title("Pembayaran Registrasi"),
            Column::computed('status_registrasi')->title("Status Registrasi"),
            Column::computed("aksi")->title("Aksi"),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'DataRegistrasi_' . date('YmdHis');
    }
}
