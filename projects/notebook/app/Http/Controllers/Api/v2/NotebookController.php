<?php

namespace App\Http\Controllers\Api\v2;

use App\Models\Notebook;
use Illuminate\Http\Request;
use App\Http\Resources\NotebookResource;
//use App\Http\Controllers\Api\v1\NotebookController as OldController;

class NotebookController extends \App\Http\Controllers\Api\v1\NotebookController
{
    /**
     * Срез данных из таблицы для постраничного вывода.
     */
    public function slice($offset, $limit)
    {
        return $this->check(
            Notebook::offset($offset)->limit($limit)->get()
        );
    }
}
