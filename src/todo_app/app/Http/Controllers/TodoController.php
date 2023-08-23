<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ToDoMail;
use Illuminate\Support\Facades\Queue;

class TodoController extends Controller
{
    public function index(){
        $user = Auth::user();
        $todos = Todo::where('user_id',$user->id)->orderBy('created_at', 'desc')->get();
        return view('todo/index',['user'=>$user,'todos'=>$todos]);}



        public function addtodo(TodoRequest $request){
            
            $user_id = Auth::id();
            $user_email = Auth::user()->email;
            try {
                Todo::create([
                    'user_id' => $user_id,
                    'todo' => $request->input('todo'), // Use input method
                    'addtime' => $request->input('addtime'),
                    'exist' => $request->input('exist')
                ]);
                $addtimes = $request->input('addtime'); // 送信を遅らせる時間（例: 5時間後）

                // if($addtimes != 0){
                $delayedTime = now()->addHours($addtimes);
                $new_todo = $request->input('todo');
                Mail::later($delayedTime, new TodoMail($new_todo, $user_email));
                
                // }
             
                    // $delayedTime = now()->addHours($addtimes);
                    // $new_todo = $request->input('todo');
                    // $todoMail = new TodoMail($new_todo, $user_email);
                    // Queue::later($delayedTime, $todoMail);
                    
                    
                
                

                    
                return redirect()->route('todo.index')->with('success', '登録完了');
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors(['error' => '登録に失敗しました。' . $e->getMessage()]);
            }
        }


        public function deletetodo(Request $request){
            $todoId = $request->input('todo_id');
            Todo::where('id', $todoId)->delete();
            return redirect()->route('todo.index');
        }
}
