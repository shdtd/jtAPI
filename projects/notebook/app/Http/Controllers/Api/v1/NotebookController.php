<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Notebook;
use Illuminate\Http\Request;
use App\Http\Resources\NotebookResource;
use Illuminate\Support\Facades\Validator;

class NotebookController extends \App\Http\Controllers\Controller
{
    /**
     * Подготовка ответа на запрос
     */
    protected function check($notebook, $error = '')
    {
        if (is_null($notebook)) {
            return response()->json(
                ['success' => false, 'message' => 'Записи не найдены']
            );
        } elseif (in_array(gettype($notebook), ['integer', 'boolean'])) {
            return response()->json(
                ['success' => (bool)$notebook, 'message' => $error]
            );
        }

        return response()->json(
            ['success' => true, 'notebook' => new NotebookResource($notebook)]
        );
    }

    /**
     * 
     */
    protected function doRequest($request)
    {
        $validated = $this->doValidate($request);

        if ($request->photo) {
            /* Перемещаем временный файл в директорию с фотографиями */
            $path = __DIR__ . '/../../../../../public/img/photos/';
            $file = md5_file($request->photo) . "." . $request->extension;
            rename($request->photo, $path . $file);
            /* В поле фото пишем новое название файла фотографии */
            $validated['photo'] = $file;
        }
        return $validated;
    }

    protected function doValidate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'        => 'nullable|integer',
            'fullname'  => 'required',
            'company'   => 'nullable|string',
            'phone'     => 'required',
            'mail'      => 'required|email:rfc',
            'birthdate' => 'nullable|date_format:d/m/Y',
            'photo'     => 'nullable|mimes:jpeg,png'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->first();
        }

        $validated = $validator->validated();
        /* Пересобираем validated удаляя пустые поля */
        foreach ($validated as $key => $value) {
            if (!$value) {
                unset($validated[$key]);
            }
        }

        return $validated;
    }

    /**
     * Отображение всех записей
     */
    public function index()
    {
        return $this->check(
            Notebook::all()
        );
    }

    /**
     * Отображение одной записи по ID
     */
    public function show(int $id)
    {
        return $this->check(
            Notebook::query()->find($id)
        );
    }

    /**
     * Добавление новой записи (записей)
     */
    public function create(Request $request)
    {
        $data = $this->doRequest($request);
        if (gettype($data) == 'string') {
            return $this->check(false, $data);
        }
        return $this->check(
            Notebook::create($data)
        );
    }

    /**
     * Обновление записи по ID
     */
    public function update(int $id, Request $request)
    {
        $data = $this->doRequest($request);
        if (gettype($data) == 'string') {
            return $this->check(false, $data);
        }
        return $this->check(
            Notebook::where('id', $id)->update($data)
        );
    }

    /**
     * Удаление записи по ID
     */
    public function destroy(int $id)
    {
        return $this->check(
            Notebook::destroy($id)
        );
    }
}
