<?php 
namespace App\Mail;
use App\Helper\Cart;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Auth;

	class SendMail extends Mailable
	{
		use Queueable, SerializesModels;
		public $order;
		public function __construct($order)
		{
			$this->order= $order;
		}
		public function build()
		{
			return $this->view('emails.email')->with([
				'cart' => new Cart,
				'name' => Auth::user()->name,
				'order' => $this->order

			]);
		}
	}
?>