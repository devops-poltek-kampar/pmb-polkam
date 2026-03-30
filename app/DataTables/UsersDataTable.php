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
            ->addColumn("aksi", function ($row) {

                $button = "";

                if ($row->status == "Suspend") {
                    $button = <<<HTML
                        <button type="button" onclick="setStatus('$row->id', 'Verified')" class="btn btn-sm btn-success" title="Aktifkan">
                           
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-x" viewBox="0 0 16 16">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708"/>
                        </svg>

                        </button>

                        <button  class="btn btn-sm btn-info" onclick="ResetPassword('$row->id')">Reset</button>
                        
                    HTML;
                } else {
                    $button = <<<HTML
                        <button type="button" onclick="setStatus('$row->id', 'Suspend')" class="btn btn-sm btn-danger" title="Non Aktifkan">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-check" viewBox="0 0 16 16">
                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                            </svg>

                        </button>

                        <button  class="btn btn-sm btn-info" onclick="ResetPassword('$row->id')">Reset</button>
                        
                    HTML;
                }

                return $button;
            })
            ->rawColumns(['status', 'aksi'])
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
            Column::computed("aksi")
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
