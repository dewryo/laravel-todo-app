<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class TodoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $new_todo; // メール内で利用するデータベースの情報を保持するプロパティ
    public $user_email;

    public function __construct($new_todo, $user_email)
    {
        $this->new_todo = $new_todo;
        $this->user_email = $user_email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope();
    }

    public function build()
    {
        return $this->from('wvnm370god@gmail.com', 'Todolist')
        ->to($this->user_email) // 送信先のメールアドレスを設定
        ->subject('TODO？')
        ->view('emails.todo_mail');
    }



    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function __invoke()
    {
        // ここにMailableが呼ばれたときの処理を追加
    }
}
