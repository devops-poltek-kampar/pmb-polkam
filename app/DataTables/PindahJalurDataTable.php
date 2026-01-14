<?php

namespace App\DataTables;

use App\Models\PindahJalur;
use App\Models\PMBJalurMasukModel;
use App\Models\PMBRegistrasiModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PindahJalurDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<PindahJalur> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $jalurHtml  = "";
        $jalur = PMBJalurMasukModel::with(['jalur', 'gelombang'])->get();

        foreach ($jalur as $key => $value) {
            $jalurHtml .= "<option value='{$value->id}'>{$value->jalur->nama} {$value->gelombang->nama} {$value->gelombang->tahun}</option>";
        }

        return (new EloquentDataTable($query))
            ->addColumn('action', 'pindahjalur.action')
            ->addColumn("gelombang", function ($row) {
                return $row->jalur_masuk->gelombang->nama;
            })
            ->addColumn("tahun", function ($row) {
                return $row->jalur_masuk->gelombang->tahun;
            })
            ->addColumn("jalur", function ($row) {
                return $row->jalur_masuk->jalur->nama;
            })
            ->addColumn("aksi", function ($row) use ($jalurHtml) {
                $tokenField = csrf_field();
                $url = url('/pmb/pindah-jalur');
                return <<<HTML
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal$row->id">Pindah</button>

                    <!-- Modal -->
                    <div class="modal fade" id="modal$row->id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content"> 
                            <form action="$url" method="POST">

                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Pindah Jalur $row->nomor_registrasi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            
                                    $tokenField
                                    

                                <div class="alert alert-warning">
                                    <strong>PERHATIAN :</strong>
                                    JIKA JALUR REGISTRASI MAHASISWA BARU DIPINDAHKAN, MAKA MAHASISWA BARU HARUS MENGUPLOAD ULANG KEMBALI DOKUMEN SYARAT PENDAFTARAN!
                                </div>

                                    <input type="hidden" name="nomor_registrasi" value="$row->id">

                                    <label for="" class="form-label">Jalur</label>
                                    <select name="pmb_jalur_masuk_id" id="" class="form-control">
                                        <option>Pilih</option>
                                        $jalurHtml
                                    </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    </div>
                HTML;
            })
            ->rawColumns(['gelombang', 'jalur', 'aksi'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<PindahJalur>
     */
    public function query(PMBRegistrasiModel $model): QueryBuilder
    {
        return $model->with(['jalur_masuk' => function ($queryJalurMasuk) {
            return $queryJalurMasuk->with(['jalur', 'gelombang',]);
        }, 'prodi_pilihan_1', 'prodi_pilihan_2'])->select(['id', 'nama', 'nomor_registrasi', "pmb_jalur_masuk_id", "prodi_pilihan_1", 'prodi_pilihan_2']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pindahjalur-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->addTableClass('table table-striped table-hovered table-bordered')
            ->scrollX(true)
            ->selectStyleSingle()
            ->parameters(['autoWidth' => false])
            ->addTableClass('table table-bordered table-striped')
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
            Column::make('nama'),
            Column::make('nomor_registrasi'),
            Column::computed("gelombang"),
            Column::computed('tahun'),
            Column::computed("jalur"),
            Column::make('prodi_pilihan_1.nama')->title("Prodi 1"),
            Column::make('prodi_pilihan_2.nama')->title("Prodi 2"),
            Column::computed('aksi')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PindahJalur_' . date('YmdHis');
    }
}
