<?php

/**
 * This file is part of seat-connector and provides user synchronization between both SeAT and third party platform
 *
 * Copyright (C) 2019, 2020  Loïc Leuilliot <loic.leuilliot@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Warlof\Seat\Connector\Http\Controllers;

use Seat\Web\Http\Controllers\Controller;
use Warlof\Seat\Connector\Http\DataTables\LogsDataTable;
use Warlof\Seat\Connector\Http\DataTables\Scopes\LogsDataTableScope;
use Warlof\Seat\Connector\Models\Log;

/**
 * Class LogsController.
 *
 * @package Warlof\Seat\Connector\Http\Controllers
 */
class LogsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(LogsDataTable $datatable)
    {
        $level  = request()->query('level')  ?: '';
        $driver = request()->query('driver') ?: '';

        return $datatable
            ->addScope(new LogsDataTableScope($driver, $level))
            ->render('seat-connector::logs.list');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        Log::truncate();

        return redirect()->back();
    }
}
