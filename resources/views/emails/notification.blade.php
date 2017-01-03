<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Email Notification</title>
    <link href="{{url('images/favicon.png')}}" rel="icon" type="image/x-icon">
   <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
  </head>

  <body style="font-family: 'Open Sans', sans-serif;background-color:#e2e7ed;">
    <div style="background-color:#e2e7ed;width:100%;float:left;">
      <div style="width:571px;margin:30px auto;">

        <div style="background-color:#fff;padding:10px 15px;">
        <a href="{{url('/')}}"><img src="https://s4.postimg.org/81ln39zu5/logo.jpg" alt="" title=""/></a></div>
        <div style="background-color:#6666ff;height:8px; margin-bottom:12px;"></div>

        <!-- body -->
         <div style="background-color:#fff;padding:10px 15px;margin-bottom:10px;">
            <p style="font-size: 14px;  font-weight: normal;  margin-bottom: 10px;">Hi,</p>            
           
           
            
            
            
            <p style="font-size: 14px;  font-weight: normal;  margin-bottom: 10px;">{{$details}}</p> <br/><br/>
            <p style="font-size: 14px;  font-weight: normal;  margin-bottom: 10px;">
            {{empty($email)?'':"Email: ".$email}}<br/>
            {{empty($password)?'':"Password: ".$password}}

            </p> <br/><br/>

            <p style="font-size: 14px;  font-weight: normal;  margin-bottom: 10px;">Thank you for using travel portal!<br>   Travel Portal Team</p>
        
      <!-- /content -->
      </div>
  <!-- /body -->
        <div style="background-color:#e2e7ed;padding:0px 10px;text-align:center;margin-bottom:20px;">
      
         <p style="font-size:14px;margin-top:20px;margin-bottom:0;">This email has been sent to <a href="mailto:{{$email}}" style="font-weight:bold;">{{$email}}</a></p>
        </div>
  <!-- footer -->      
      <div style="background-color:#fff;padding:10px 15px;text-align:center;">
      <p style="font-size:12px;margin-top:15px;margin-bottom:15px;">If you have any questions, then please contact at <a href="mailto:contact@travels.com" >contact@travels.com </a></p>
      </div>
      <div style="background-color:#6666ff;height:8px; margin-bottom:15px;width:100%;"></div>
    </div>
  </div>
  </body>
</html>


