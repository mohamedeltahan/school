<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkpermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //if(!Auth::check()){ return redirect()->route("login");}
        if($request->getRequestUri()=="/school/public/technical_users" && !Auth::user()->can("ادارة المستخدمين")){
            return redirect()->route("home");}

        else if(str_contains($request->getRequestUri(),"technical_users") && str_contains($request->getRequestUri(),"edit") && !Auth::user()->can("تعديل مستخدم")){
            return redirect()->route("home");}
        else if($request->getRequestUri()=="/school/public/technical_users/create" && !Auth::user()->can("اضافة المستخدمين")){return redirect()->route("home");}


        //
        else if($request->getRequestUri()=="/school/public/schools" && !Auth::user()->can("ادارة المدارس")){return redirect()->route("home");}
        else if(str_contains($request->getRequestUri(),"schools") && str_contains($request->getRequestUri(),"edit") && !Auth::user()->can("تعديل مدرسة")){return redirect()->route("home");}
        else if($request->getRequestUri()=="/school/public/schools/create" && !Auth::user()->can("اضافة المدارس")){

            return redirect()->route("home");}

        //
        else if($request->getRequestUri()=="/school/public/teachers" && !Auth::user()->can("ادارة المعلمين")){return redirect()->route("home");}
        else if(str_contains($request->getRequestUri(),"teachers") && str_contains($request->getRequestUri(),"edit") && !Auth::user()->can("تعديل معلم")){return redirect()->route("home");}
        else if($request->getRequestUri()=="/school/public/teachers/create" && !Auth::user()->can("اضافة المعلمين")){return redirect()->route("home");}

        //
        else if($request->getRequestUri()=="/school/public/students" && !Auth::user()->can("ادارة الطلاب")){
            return redirect()->route("home");}
        else if(str_contains($request->getRequestUri(),"students") && str_contains($request->getRequestUri(),"edit") && !Auth::user()->can("تعديل طالب")){
          return redirect()->route("home");}
        else if($request->getRequestUri()=="/school/public/students/create" && !Auth::user()->can("اضافة الطلاب")){
            return redirect()->route("home");}


        //
        else if($request->getRequestUri()=="/school/public/assets" && !Auth::user()->can("ادارة الدعم")){return redirect()->route("home");}
       // else if(str_contains($request->getRequestUri(),["assets","edit"]) && !Auth::user()->can("تعديل الدعم")){return redirect()->route("home");}
        else if($request->getRequestUri()=="/school/public/assets/create" && !Auth::user()->can("اضافة الدعم")){return redirect()->route("home");}




        return $next($request);
    }
}
