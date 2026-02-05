<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KontakController extends Controller
{
    public function kirim(Request $request)
    {
        $data = $request->validate([
            'nama'    => 'required|string|max:100',
            'email'   => 'required|email',
            'telepon' => 'nullable|string|max:20',
            'pesan'   => 'required|string',
        ]);

        Mail::send('emails.kontak', $data, function ($message) use ($data) {
            $message->to('bhaktimedikafarma2@gmail.com') // email
                    ->subject('Pesan Kontak Website - Apotek Bhakti Medika Farma')
                    ->replyTo($data['email'], $data['nama']);
        });

        return back()->with('success', 'Pesan berhasil dikirim.');
    }
}
