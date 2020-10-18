<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\DataTables\admintableDataTable;


class adminController extends Controller
{
    public function index(admintableDataTable $admin)
    {
        return $admin->render('adminlte.index');
    }
}
