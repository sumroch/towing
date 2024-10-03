<?php

namespace App\Domain\MasterData\Application;

use App\Domain\MasterData\Entities\User;

class UserManagement
{
    public function getData($request)
    {
        return [
            'name'      => $request->name,
            'email'     => $request->email,
            'username'  => $request->username,
            'password'  => bcrypt($request->password),
            'telephone' => $request->telephone,
            'store_id'  => $request->store_id,
        ];
    }

    public function getUpdate($request, $id)
    {
        $data = User::findOrFail($id);

        $data->update(
            [
                'name'      => $request->name,
                'email'     => $request->email,
                'username'  => $request->username,
                'password'  => bcrypt($request->password ? $request->password : $data->password),
                'telephone' => $request->telephone,
                'store_id'  => $request->store_id,
            ]
        );

        return $data;
    }
}