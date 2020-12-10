<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
class NoticeMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    //creating two public properties 
    public $users; 
    public $count;
    public function __construct($var1,$var2)  /* receving parameter values when object is created 
      where objects are passing parameters */
    {
        //
        $this->users = $var1;  //initializing the parameter's values to the public properties
        $this->count = $var2;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()  /* this is the main function which executes whenever an object of this 
    mailable class is created after the execution of the constructor function */
    {
        return $this->from('tuhin.womenindigital@gmail.com', 'Irin Jahan')  
                    ->subject('Enroll '. now())
                    ->with(['message' => $this])
                    ->replyTo('tuhin.womenindigital@gmail.com', 'Reply Address')
                    ->view('mail');
    }
}