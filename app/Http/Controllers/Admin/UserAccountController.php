<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendVerificationLinkMail;
use App\Models\RequestAccountModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = RequestAccountModel::all();

        return view('admin.pages.users.permohonan-akun.index', compact('data'));
    }

    public function send($id)
    {
        $data = RequestAccountModel::find($id);

        $email =  $data->email;

        $mailData = [
            'title' => 'Hi👋,' . $data->name,
            'body' => 'Silahkan verifikasi akun anda melalui link berikut!',
        ];
        Mail::to($email)->send(new SendVerificationLinkMail($mailData));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
