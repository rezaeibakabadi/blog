<?php

namespace App\Http\Controllers;

use App\Post;
use illuminate\http\request;
use illuminate\support\facades\mail;
use session;
use validate;


class PageController extends controller
{

    public function Index()
    {

        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.welcome')->withposts($posts);

    }

    public function getabout()
    {

        $first = 'reza';
        $name = 'رضا';
        $last = 'eibakabadi';
        $family = 'ایبک آبادی';


        $fullname = $first . " " . $last;
        $fullname2 = $name . " " . $family;
        $email = 'reza.eibak@gmail.com';
        $github = 'github: rezaeibakabadi';
        $linkedin = 'linkedin: reza eibakabadi';
        $twitter = 'twitter: eibakabadi';
        $stackoverflow = 'stackoverflow: reza eibakabadi';
        $telegram = 'telegram: reza_eibakabadi';
        $socialmedia = $github . " " . $linkedin . " " . $stackoverflow . " " . $telegram . " " . $twitter;
        $phonenumber = '+989224791077';
        return view('pages.about')->withfullname($fullname)->withemail($email)->withphone($phonenumber)->withfullname2($fullname2);

    }

    public function getcontact()
    {
        return view('pages.contact');
    }

    public function postcontact(request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10',
        ]);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodymessage' => $request->message,
            'survey' => ['q1' => "hello", 'q2' => 'yes']

        );

        mail::send('emails.contact', $data, function ($message) use ($data) {

            $message->from($data['email']);
            $message->to('reza.eibak-959c33@inbox.mailtrap.io');
            $message->subject($data['subject']);

        });

        session::flash('success', 'your email was sent successfully');

        return redirect('Index');

    }
}