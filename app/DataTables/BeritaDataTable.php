<?php

namespace App\DataTables;

use App\Models\Beritum;
use App\Models\PMBBeritaModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Str;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BeritaDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Beritum> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'berita.action')
            ->addColumn('aksi', function ($row) {
                $urlEdit = url('/pmb/master-web/berita/edit') . "/" . $row->id;
                return <<<HTML
                    <a class="btn btn-sm btn-danger">Delete</a>
                    <a href="$urlEdit" class="btn btn-sm btn-warning">Edit</a>
                HTML;
            })
            ->addColumn('deskripsi', function ($row) {
                return Str::words($row->deskripsi, 20);
            })
            ->rawColumns(['aksi', 'deskripsi'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Beritum>
     */
    public function query(PMBBeritaModel $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('berita-table')
            ->columns($this->getColumns())
            ->minifiedAjax(url('/master-web/berita'))
            ->orderBy(1)
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
            Column::make("subjek"),
            Column::make('slug'),
            Column::computed('deskripsi'),
            Column::computed('aksi')
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
        return 'Berita_' . date('YmdHis');
    }
}
