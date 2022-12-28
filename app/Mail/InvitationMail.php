<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;

class InvitationMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($params)
    {
        $this->data = $params;
        
       
        // $this->email = $params['email'];
        // $this->position = $params['position'];

    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
       
       
        return $this->view('invitationMailForm')
        ->with([
            'Name' => $this->data['name'],
            'email' => $this->data['email'],
            'position'=> $this->data['position'],
            'url'    => $this->data['url']
        ]);
        
      
    }

}
