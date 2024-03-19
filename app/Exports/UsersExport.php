<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function collection()
    {
        return User::all();
    }

    public function view(): View
    {
        return view('admin.export_users', [
            'users' => User::where('role', '!=', 1)->get()
        ]);
    }
}
