<?php

namespace Controller;

use Model\User;
use Model\Specializations;
use Src\Request;
use Src\View;

class Admin
{

    public function adminPanel(Request $request): string
    {
        $specializations = Specializations::all();
        return (new View())->render('site.admin', ['specializations' => $specializations]);
    }

    public function addUser(Request $request): string
    {
        if ($request->method === 'POST' && User::create($request->all())) {
            return $this->adminPanel($request);
        }
        return $this->adminPanel($request);
    }

}