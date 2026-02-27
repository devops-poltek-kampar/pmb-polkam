<?php

namespace App\DataTables;

use App\Models\PMBUsersModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<User> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'users.action')
            ->addIndexColumn()
            ->addColumn("status", function ($row) {
                $badgeDanger = <<<HTML
                    <span class="badge bg-danger">$row->status</span>
                HTML;
                $badgeSuccess = <<<HTML
                    <span class="badge bg-success">$row->status</span>
                HTML;
                return $row->status == "Suspend" ? $badgeDanger : $badgeSuccess;
            })
            ->addColumn("tanggal_register", function ($row) {
                return Carbon::parse($row->created_at)->locale('id')->translatedFormat('l, j F Y H:i');
            })
            ->rawColumns(['status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<User>
     */
    public function query(PMBUsersModel $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->minifiedAjax(url('/pmb/data-user'))
            ->scrollX(true)
            ->addTableClass('table table-striped table-hovered table-bordered')
            // ->parameters(['autoWidth' => false])
            ->orderBy(1)
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
            Column::make('username')->title("Username"),
            Column::make('email')->title("Email"),
            Column::make('nomor_hp')->title("Nomor HP"),
            Column::computed('tanggal_register')->title("Registrasi"),
            Column::computed("status")->title("Status"),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
