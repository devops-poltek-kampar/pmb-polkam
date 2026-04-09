<?php

namespace App\DataTables;

use App\Models\DataRegistrasi;
use App\Models\PMBRegistrasiModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
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
            ->addIndexColumn()
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
            ->addColumn('tanggal_registrasi', function ($row) {
                return Carbon::parse($row->created_at)->locale('id')->translatedFormat('l, j F Y');
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
        return $model->with(['lampiran', 'users' => function ($queryUsers) {
            return $queryUsers->select(['id', 'username', 'email']);
        }, 'bukti_pembayaran', 'jalur_masuk', 'prodi_1', 'prodi_2'])
            ->orderBy('pmb_registrasi.created_at', 'DESC');
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
            ->minifiedAjax(url('/pmb/calon-mahasiswa'))
            ->orderBy(1)
            ->addTableClass("table table-striped table-hovered table-bordered")
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
            Column::make("nama")->addClass("text-start"),
            Column::make("nomor_registrasi")->addClass("text-start"),
            Column::make('hp_mahasiswa')->title("Nomor HP"),
            Column::make("users.email")->addClass("text-start")->title("Email"),
            Column::computed('gelombang'),
            Column::computed('tahun'),
            Column::computed('jalur'),
            Column::computed("status")->title("Pembayaran Registrasi"),
            Column::computed('status_registrasi')->title("Status Registrasi"),
            Column::make('prodi_1.nama')->title("Pilihan 1"),
            Column::make('prodi_2.nama')->title("Pilihan 2"),
            Column::computed('tanggal_registrasi'),
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
