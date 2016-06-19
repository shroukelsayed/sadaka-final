<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Userperson;
use App\usercompaign;
use App\CompaignDonateType;
use Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    view()->composer('layouts.adminlayout', function($view)
        {
            $data = array();
            $checked=Userperson::where('checked','=','0')->get();
            foreach ($checked as $key ) {
                if( Auth::user()->id == $key->person->user->id){ 
                    // echo"<pre>";   
                    array_push($data, $key);                     
                }                     
            }
            // echo"<pre>";
            
            $compagins=array();
            $compa=usercompaign::where('checked','=','0')->get();
                foreach ($compa as $k) {
                    if(Auth::user()->id==$k->compaign->user->id){ 
                    
                       array_push($compagins,$k);

                     }   
                }
            // var_dump($compagins);die;
            $res=count($compagins)+count($data);
            // var_dump($res);die;
            $view->with(['res'=>$res,'data'=>$data,
                'compagins'=>$compagins]);
        });

        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Laralib\L5scaffold\GeneratorsServiceProvider');
        }
    }
}
