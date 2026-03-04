<?php

namespace App\DataTables;

use App\Models\MasterProgramStudiModel;
use App\Models\PengajuanBerka;
use App\Models\PMBPengajuanBerkasModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PengajuanBerkasDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<PengajuanBerka> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        // $prodi = MasterProgramStudiModel::get(['kode_prodi', 'nama']);
        return (new EloquentDataTable($query))
            ->addColumn('aksi', function ($row) {

                $htmlProdi = "";
                $urlLulus = url('/pmb/pengajuan-berkas/lulus');
                $csrfToken = csrf_field();
                // $url = url('/pmb/pengajuan-berkas/detail') . "/$row->id";

                $url = url('/pmb/pengajuan-berkas/detail') . "/" . $row->id;

                $htmlProdi .= "<option value='{$row->registrasi->prodi_pilihan_1}' selected>{$row->registrasi->prodi_1->nama}</option>";
                $htmlProdi .= "<option value='{$row->registrasi->prodi_pilihan_2}'>{$row->registrasi->prodi_2->nama}</option>";

                return <<<HTML
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#pengajuan$row->id">
                    Lulus
                </button>
                <a class="btn btn-sm btn-info" href="$url">Lihat Berkas</a>


                <!-- Modal -->
                <div class="modal fade" id="pengajuan$row->id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                             <form action="$urlLulus" method="POST">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Program Studi Kelulusan $row->nomor_registrasi</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                $csrfToken

                                <input type="hidden" name="pmb_pengajuan_berkas_id" value="$row->id">
                                <input type="hidden" name="nomor_registrasi" value="$row->nomor_registrasi">
                                
                                <label for="">Program Studi</label>
                                
                                <select name="kode_prodi" class="form-select" id="">
                                    <!-- <option>Pilih</option> -->
                                    $htmlProdi

                                </select>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>                
                HTML;
            })->addColumn('tanggal_pengajuan', function ($row) {
                $date = Carbon::parse($row->created_at)->locale('id');
                return  $date->translatedFormat('j F Y H:i');
            })->addColumn('nomor-registrasi', function ($row) {
                return $row->registrasi->nomor_registrasi;
            })
            ->addIndexColumn()
            ->addColumn("status", function ($row) {
                switch ($row->status) {
                    case "Review":
                        return <<<HTML
                        <span class="badge bg-info">$row->status</span>
                        HTML;
                    case "Reject":
                        return <<<HTML
                        <span class="badge bg-danger">$row->status</span>
                        HTML;
                        break;

                    case "Verified":
                        return <<<HTML
                        <span class="badge bg-success">$row->status</span>
                        HTML;
                }
            })
            ->rawColumns(['aksi', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<PengajuanBerka>
     */
    public function query(PMBPengajuanBerkasModel $model): QueryBuilder
    {
        return $model->with(['registrasi' => function ($queryRegistrasi) {
            return $queryRegistrasi->with(['jalur_masuk' => function ($queryJalurMasuk) {
                return $queryJalurMasuk->with(['jalur']);
            }, 'prodi_1', 'prodi_2'])->select('id as registrasi_id', 'prodi_pilihan_1', 'prodi_pilihan_2', 'pmb_users_id', 'pmb_gelombang_id', 'pmb_jalur_masuk_id', 'nomor_registrasi', 'nama', 'tempat_lahir');
        }])->select(['*']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pengajuanberkas-table')
            ->columns($this->getColumns())
            ->minifiedAjax(url('/pmb/pengajuan-berkas'))
            ->orderBy(1)
            ->scrollX(true)
            ->addTableClass('table table-striped table-hovered table-bordered')
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

            Column::make('nomor_registrasi'),
            Column::make('registrasi.nama')->title('Nama'),
            Column::computed("nomor-registrasi")->title("Nomor Registrasi"),
            Column::make('registrasi.jalur_masuk.jalur.nama')->title("Jalur Masuk"),
            Column::computed("tanggal_pengajuan")->title("Tanggal Pengajuan"),
            Column::make('registrasi.prodi_1.nama')->title("Pilihan 1"),
            Column::make('registrasi.prodi_2.nama')->title("Pilihan 2"),
            Column::computed('status'),
            Column::computed('aksi')->title("Aksi")
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PengajuanBerkas_' . date('YmdHis');
    }
}
