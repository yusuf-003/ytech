<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contact; 
use App\User;
use Mail;
use Illuminate\Support\Facades\Session;


class ContactUsController extends Controller
{
    
    public function index()
    {
        //
        $contacts = Contact::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.mail.index', compact('contacts'));
    }

    public function show($id)
    {
        //
        $contact= Contact::find($id);
        return view('admin.mail.show')->with(['contact' => $contact]);


    }

    public function getContact() { 

        
       return view('contact_us'); 
      } 
 
       public function saveContact(Request $request) { 
 
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

         $contact = new Contact;
         
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;

 
         
         $contact->save();
         \Mail::send('contact_email',
             array(
                 'name' => $request->get('name'),
                 'email' => $request->get('email'),
                 'subject' => $request->get('subject'),
                 'user_message' => $request->get('message'),
             ), function($message) use ($request)
               {
                  $message->from($request->email);
                  $message->to('yaliyu003@gmail.com');
               });
         
         
         return back()->with('success', 'Thank you for contact us!');

 
     }

     public function destroy($id)
    {
        //
       $contact = Contact::findOrfail($id);
       $contact->delete();
       Session::flash('deleted_mail','The mail has been deleted');
     return redirect('/admin/mail');
    }
}
