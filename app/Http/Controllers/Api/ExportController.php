<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use PDF;
class ExportController extends Controller
{
    //
    public function exportCSV()
    {
        return Excel::download(new UsersExport, 'users.csv');
    }

    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportPDF()
    {
        $pdf = PDF::loadView('pdf.users', ['users' => User::all()]);
        return $pdf->download('users.pdf');
    }
}
