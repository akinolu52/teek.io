<?php

namespace Teek\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Teek\Notify;
use Teek\Task;
use Illuminate\Http\Request;
use Illuminate\Contracts\Mail\Mailer;
use Teek\User;

class TaskController extends Controller
{
    protected $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function index()
    {
        if (Auth::user()->role == 'user')
            return view('user.task.index');
        else
            return view('user.task.index')->with([
                'tasks' => Task::all()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $task = Task::create([
            'user_id' => Auth::id(),
            'title'     => $request->title,
            'description' => $request->description,
            'end_date'     => $request->edate,
        ]);
        $notify = new NotifyController();
        //        'user_id', 'action', 'message', 'read', 'for'
        $request->message = Auth::user()->name." created a task!";
        $request->action = 'user';
        $notify->store($request);

        /*$assistants = User::where('role', 'assistant')->get();
        foreach ($assistants as $assistant) {
            $this->mailer->send('emails.create-task', ['user' => $assistant], function ($m) use ($assistant) {
                $m->from('support@teek.com', 'Teek Support');
                $m->to($assistant->email, $assistant->name)->subject('Task Created');
            });
        }*/

        return $res[] = array(
            'id' => $task->id,
            'text' =>$request->title,
            'done' => 'false',
            'end_date' => $request->edate == null ? '' :$request->edate ,
        );

    }

    public function userTask(Request $request)
    {
        if ($request->ajax()) {
            $res = [];
            foreach (Auth::user()->task as $key => $task){
                $res[] = array(
                    'id' => ++$key,
                    'text' => $task->title,
                    'done' => $task->done,
                    'end_date' => $task->end_date == null ? '' : $task->end_date,
                );
            }
            return response()->json(($res));
        }

    }

    public function calendarChart()
    {
        $res = [];
        foreach (Auth::user()->task as $task) {
            $res[] = array(
                "title" => $task->title,
                "start" => $task->created_at->format('Y-m-d'),
                "end" => $task->end_date,
            );
        }
        return response()->json(($res));
    }

    public function weeklyChart()
    {
        $monday = date('Y-m-d 00:00:00', strtotime("next Monday - 1week "));
        $sunday = date('Y-m-d 00:00:00', strtotime("next Monday - 1week + 6days"));

        $tasks = Task::where([
            ['created_at', '>=', $monday],
            ['created_at', '<=', $sunday],
            ['user_id', Auth::id()]
        ])->get();

        $tasks = $tasks->groupBy(function ($item, $key){
            return $item['created_at']->format('l');
        });
        $tasks->toArray();

        $res = [];
        foreach ($tasks as $task) {
//            echo count($task->where('status', 'pending'));
            $res[] = array(
                "y" => $task->first()->created_at->format('l'),
                "a" => count($task->where('status', 'complete')),  /*complete*/
                "b" => count($task->where('status', 'ongoing')) , /*pending*/
                "c" => count($task->where('status', 'pending')) , /*ongoing*/
            );
        }
        return response()->json(($res));

    }

    public function assign(Request $request)
    {
        $task = Task::find($request->id);
        $task->update([
            'status' => 'ongoing'
        ]);

        Notify::create([
            'user_id' => Auth::id(),
            'action'     => 'assistant',
            'for'     => $task->user_id,
            'message'     => 'You task have been assigned',
        ]);

        /*$user = User::find($task->user_id);
        $this->mailer->send('emails.assign-task', ['user' => $user], function ($m) use ($user) {
            $m->from('support@teek.com', 'Teek Support');
            $m->to($user->email, $user->name)->subject('Task Assigned');
        });*/

        echo true;
    }

    public function complete(Request $request)
    {
        $task = Task::find($request->id);
        $task->update([
            'status' => 'complete',
            'done' => 'true'
        ]);
        /*notify*/
        Notify::create([
            'user_id' => Auth::id(),
            'action'     => 'assistant',
            'for'     => $task->user_id,
            'message'     => 'You task have been completed',
        ]);

        /*$user = User::find($task->user_id);
        $this->mailer->send('emails.complete-task', ['user' => $user], function ($m) use ($user) {
            $m->from('support@teek.com', 'Teek Support');
            $m->to($user->email, $user->name)->subject('Task Assigned');
        });*/

        echo true;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Teek\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Teek\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Teek\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
