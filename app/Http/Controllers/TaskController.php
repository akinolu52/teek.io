<?php

namespace Teek\Http\Controllers;

use function foo\func;
use Illuminate\Support\Facades\Auth;
use Teek\Notify;
use Teek\Task;
use Illuminate\Http\Request;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Session;

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
            'month' => date('n'),
            'description' => $request->description,
            'end_date'     => $request->edate,
        ]);
        $notify = new NotifyController();

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
        $sunday = date('Y-m-d 00:00:00', strtotime("last Sunday "));
        // echo "<br>";
        $saturday = date('Y-m-d 00:00:00', strtotime("this Saturday"));


        // echo $monday = date('Y-m-d 00:00:00', strtotime("next Monday - 1week "));
        // echo $sunday = date('Y-m-d 00:00:00', strtotime("next Monday - 1week + 6days"));

        $tasks = Task::where([
            ['created_at', '>=', $sunday],
            ['created_at', '<=', $saturday],
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

    public function yearlyChart()
    {
//        { y: '2017-01', a: 75,  b: 65 },
//        { y: '2017-02', a: 20,  b: 40 },
//        { y: '2017-03', a: 15,  b: 65 },
//        { y: '2017-04', a: 120, b: 90 },
//        { y: '2017-05', a: 30,  b: 40 },
//        { y: '2017-06', a: 45,  b: 65 },
//        { y: '2017-07', a: 150, b: 90 },
//        { y: '2017-08', a: 60,  b: 40 },
//        { y: '2017-09', a: 74,  b: 65 },
//        { y: '2017-10', a: 130, b: 92},
//        { y: '2017-11', a: 250, b: 52},
//        { y: '2017-12', a: 190, b: 80}
        $results = \DB::table('tasks')
            ->selectRaw('count(*) as task, extract(month from tasks.created_at) as m')
//            ->leftjoin('user', 'message.user_id', '=', 'user.id')
            ->where('user_id', Auth::id())
            ->groupBy('m')
            ->pluck('task', 'm');
        $months = array_replace(array_fill_keys(range(1, 12), 0), $results->all());

        $res = [];

        foreach ($months as $k => $month) {

//            echo $k < 10 ? date('Y').'-0'.$k : date('Y').'-'.$k ;
//            echo "\n";
            $pendingTask = count(Task::where([
                ['month', $k],
                ['status', 'pending'],
                ['user_id', Auth::id()],
            ])->get());

            $completedTask = count(Task::where([
                ['month', $k],
                ['status', 'complete'],
                ['user_id', Auth::id()],
            ])->get());

            $res[] = array(
                "y" => $k < 10 ? date('Y').'-0'.$k : date('Y').'-'.$k ,
                "b" => $pendingTask ,
                "c" => $completedTask
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
            'message'     => 'Your task have been assigned',
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
            'message'     => 'Your task have been completed',
        ]);

        /*$user = User::find($task->user_id);
        $this->mailer->send('emails.complete-task', ['user' => $user], function ($m) use ($user) {
            $m->from('support@teek.com', 'Teek Support');
            $m->to($user->email, $user->name)->subject('Task Assigned');
        });*/

        echo true;
    }

    public function edit(Task $task)
    {
        return view('user.task.edit')->with([
            'task' =>$task
        ]);
    }

    public function undone(Request $request, Task $task)
    {
        $task->update([
            'status' => 'ongoing',
            'done' => 'false'
        ]);


        Notify::create([
            'user_id' => Auth::id(),
            'action'     => 'assistant',
            'for'     => $task->user_id,
            'message'     => 'This task needs review!',
        ]);

        Session::flash('message', 'Task updated!');
        return redirect()->back();
    }

    public function update(Request $request, Task $task)
    {
//        dd($request->all());
        $task->update($request->all());

        Session::flash('message', 'Task updated!');
        return redirect()->back();
    }

    public function destroy(Task $task)
    {
        $task->delete();

        Session::flash('message', 'Task deleted!');
        return redirect()->back();
    }
}
