<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name;
    public $email;
    public $author;
    public $book;
     public $dateTime;


    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->author = $data['author'];
        $this->book = $data['book'];
        $this->dateTime = $data['dateTime'];

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail')->with([
            'name'=> $this->name,
            'email'=> $this->email,
            'author'=> $this->author,
            'book'=> $this->book,
            'dateTime'=> $this->dateTime,
        ]);
    }
}
