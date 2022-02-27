<?php

namespace App\Http\Controllers;
use App\Account;
use App\enrollee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use PhpOption\None;
use Illuminate\Support\Facades\DB;
use App\post;
use phpDocumentor\Reflection\Types\Null_;

class PostController extends Controller
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

    public function About()
    {
        return view('About');
    }

    public function Setting()
    {
        $user = auth()->user();
        $user_id = $user->id;
        $Data = DB::select('SELECT * FROM users WHERE id = ?', [$user_id]);
        return view('Setting')->with('Data',$Data);
    }

    public function home()
    {
        $user = auth()->user();
        $user_id = $user->id;
        $total_course = DB::select('SELECT * FROM enrollees WHERE User_id = ?', [$user_id]);
        $key = 1;
        if($total_course == null)
        {
            $key = 1;
            $Popular = DB::select('SELECT Course,Description FROM enrollees GROUP BY Course,Description ORDER BY COUNT(Course) DESC LIMIT 3');
            return view('home')->with('key',$key)->with('Popular',$Popular);
        }
        else
        {
            $key = 0;
            $Popular = DB::select('SELECT Course,Description FROM enrollees GROUP BY Course,Description ORDER BY COUNT(Course) DESC LIMIT 3');
            return view('home')->with('key',$key)->with('total_course',$total_course)->with('Popular',$Popular);
        }

    }
    public function Course(Request $request)
    {
        $method = $request->method();
        $user = auth()->user();
        $user_id = $user->id;
        if ($request->isMethod('post'))
        {
            $data = $request->input('submit');
            $Data = DB::select('SELECT Title FROM posts WHERE Title = "'.$data.'"');
            if($Data == null)
            {
                $error = "The course that choosen is not available";
                return view('Error')->with('error',$error);
            }
            $user_c = DB::select('SELECT Course FROM enrollees WHERE User_id = "'.$user_id.'"');
            foreach($user_c as $co)
            {
                if($co->Course === $data)
                {
                    $error = "You have already enrolled";
                    return view('Error')->with('error',$error);
                }
            }
            $Desc = DB::select('SELECT Description FROM posts WHERE Title = "'.$data.'"');
            $enrollee = new enrollee;
            $enrollee->User_id = $user_id;
            $enrollee->Course = $data;
            foreach($Desc as $desc)
            {
                $enrollee->Description = $desc->Description;
            }
            $enrollee->save();
            return redirect('/home');
        }
        else
        {
            $Data = DB::select('SELECT * FROM posts');
            if($Data == null)
            {
                $key = 1;
                return view('Course')->with('key',$key);
            }
            else
            {
                $key = 0;
                return view('Course')->with('Data',$Data)->with('key',$key);
            }
        }
    }
    public function Add(Request $request)
    {
        $method = $request->method();

        if ($request->isMethod('post'))
        {
            $post = new Post;
            $post->Title = $request->Course_Title;
            $post->Description = $request->Description;
            $post->Material = $request->Material;
            $post->save();
            return redirect('/Course');
        }
        else
        {
            $user = auth()->user();
            $user_id = $user->id;
            $Username = $user->Username;
            if($user_id == 1 && $Username == "Acerola")
            {
                return view('Add');
            }
            else
            {
                $error = "Can't Access Because you are not the admin";
                return view('Error')->with('error',$error);
            }
        }
    }
    public function not()
    {
        return view('not');
    }
}
