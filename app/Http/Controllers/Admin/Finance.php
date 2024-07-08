<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyChatRequest;
use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;



class Finance extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('chat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.finance.index');
    }

}
