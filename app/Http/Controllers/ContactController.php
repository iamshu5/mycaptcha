<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index(Request $request) {

        $DataCaptcha = Contact::when(!empty($request->search_contact), function($query) use($request) {
            $query->where('id_contact', 'like', '%' . $request->search_contact . '%')
            ->orWhere('name', 'like', '%' . $request->search_contact . '%')
            ->orWhere('email', 'like', '%' . $request->search_contact . '%')
            ->orWhere('tempat_lahir', 'like', '%' . $request->search_contact . '%')
            ->orWhere('tanggal_lahir', 'like', '%' . $request->search_contact . '%')
            ->orWhere('jenis_kelamin', 'like', '%' . $request->search_contact . '%')
            ->orWhere('phone', 'like', '%' . $request->search_contact . '%')
            ->orWhere('website', 'like', '%' . $request->search_contact . '%')
            ->orWhere('message', 'like', '%' . $request->search_contact . '%');
        })->paginate(5);
        return view('mathcaptcha', ['contact' => $DataCaptcha]);
    }

    public function contactin(Request $request) 
    {
        $validet = Validator::make($request->all(), [
            'name' => 'required|max:35',
            'email' => 'required|email',
            'phone' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'website' => 'required',
            'message' => 'required|max:254',
            'mathcaptcha' => 'required|mathcaptcha',
        ]);

        if($validet->fails()) {
            app('mathcaptcha')->reset();
            return redirect('captchamath')
                ->withErrors($validet);
        }

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->tempat_lahir = $request->tempat_lahir;
        $contact->tanggal_lahir = $request->tanggal_lahir;
        $contact->jenis_kelamin = $request->jenis_kelamin;
        $contact->website = $request->website;
        $contact->message = $request->message;

        $contact->save();
        app('mathcaptcha')->reset();
        return redirect('/captchamath')->with('alert', ['bg' => 'success', 'message' => 'Berhasil dikirim']);
    }

    public function contactEdit(Contact $contact, Request $request) {

        // $validet = Validator::make($request->all(), [
        //     'name' => 'required|max:35',
        //     'email' => 'required|email',
        //     'phone' => 'required|min:5',
        //     'tempat_lahir' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'website' => 'required',
        //     'message' => 'required|max:254',
        //     // 'mathcaptcha' => 'required|mathcaptcha',
        // ]);
        // $valid = Validator::make($request->all());
        // if($validet->fails()) {
        //     app('mathcaptcha')->reset();
        //     return redirect('captchamath')
        //         ->withErrors($validet)->withInput();
        // }
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->tempat_lahir = $request->tempat_lahir;
        $contact->tanggal_lahir = $request->tanggal_lahir;
        $contact->jenis_kelamin = $request->jenis_kelamin;
        $contact->website = $request->website;
        $contact->message = $request->message;

        $contact->save();
        return redirect('/captchamath')->with('alert', ['bg' => 'success', 'message' => 'Data berhasil diubah!']);
    }

    public function contactHapus(Contact $contact) {
      $contact->delete();
      return redirect('/captchamath')->with('alert', ['bg' => 'success', 'message' => 'Data berhasil dihapus!']);
    }
}