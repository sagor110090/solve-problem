<?php

namespace App\Http\Controllers;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Http\Request;

class migrate extends Controller
{
    public function createTable()
    {
        Schema::table('users', function($table) {
            if (!Schema::hasColumn('users', 'paid'))
            {
                $table->string('paid');
            }
            if (!Schema::hasColumn('users', 'add'))
            {
                $table->string('add');
            }
        });
        return 'success';
    }
}
