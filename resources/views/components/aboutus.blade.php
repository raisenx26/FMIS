@extends('layouts.app')
<style>

    #separator {
        width: 92%;
        height: 10px;
        border-top: 1px solid #6f6d6d;
        margin-top: 50px;
        margin-left: auto;
        margin-right: auto;
    }

    #content {
        margin-top: 50px;
    }

    #header
    {
        text-align: center;
        margin-right: 100px;
    }
    #container1
    {
        margin-top: 100px;
    }
    #names
    {
        text-align: left;
    }
    #logo_mail
    {
        margin-top: 5px;
    }
</style>
@section('content')

<div id="content">

    <div id="header">
    <h2> ABOUT US </h2>
    <h4>Get in touch witht the team dev</h4>
   
    </div>

    <div id="separator"></div>


 
      
    <div id="container1">
        
        <div class="row">
            <div class="col-6 col-md-3">
                <div class="card card-stats">
                    <div class="card-content" id="names">
                        <h4 class="title">Clint James S. Pardilla</h4>   
                        <p><i id="logo_mail" class="material-icons">mail_outline</i>
                            cjspardilla.dostxi@gmail.com
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                             Team Supervisor
                        </div>
                       
                    </div>
                </div>
            </div>


            <div class="col-6 col-md-3">
                <div class="card card-stats">
                    <div class="card-content" id="names">
                        <h4 class="title">Elnathan Timothy dela Cruz</h4>   
                        <p><i id="logo_mail" class="material-icons">mail_outline</i>
                            etcdc08141998@gmail.com
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                             Back-end Developer
                        </div>
                       
                    </div>
                </div>
            </div>
         
        <div class="col-6 col-md-3">
            <div class="card card-stats">
                <div class="card-content" id="names">
                    <h4 class="title">Jawad M. Agantal</h4>   
                    <p><i id="logo_mail" class="material-icons">mail_outline</i> agantal789@gmail.com</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                         Front-end Developer
                    </div>
                   
                </div>
            </div>
        </div>
      

        <div class="col-6 col-md-3">
            <div class="card card-stats">
                <div class="card-content" id="names">
                    <h4 class="title">Joshua N. Castro</h4>   
                    <p><i id="logo_mail" class="material-icons">mail_outline</i> officialjoshuac@yahoo.com</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                         Front-end Developer
                    </div>
                   
                </div>
            </div>
        </div>
    </div>

</div>
        
     
     
         
</div>

@endsection()




