<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Auth;
use App\Note;

class NotesController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

    public function store($value = '')
    {
        $request = Request::all();

        $request['user_id'] = Auth::id();

        $changes = [];

        if (isset($request['status_id']) && isset($request['ticket_id'])) {

    // Update the ticket status

            $ticket = \App\Ticket::findOrFail($request['ticket_id']);

            if($ticket->status_id != $request['status_id']){

              $ticket->update(['status_id' => $request['status_id']]);

              $changes[] = 'Status changed to '.$ticket->status->name;

            }

            if($request['hours'] != 0){

              $changes[] = 'Hours added: '.$request['hours'];

            }

            $change_list = '';

            if(count($changes) > 0){

              foreach($changes as $change){

                $change_list .= '<li>'.$change.'</li>';

              }

              $request['body'] = $request['body'].'<hr><ul>'.$change_list.'</ul>';

            }


        }

        Note::create($request);

        return redirect('tickets/'.$request['ticket_id']);
    }

    public function hide($id){

      $note = Note::findOrFail($id);

      $note->hide = 1;

      $note->update();

      return "Note Removed!";

    }
}
