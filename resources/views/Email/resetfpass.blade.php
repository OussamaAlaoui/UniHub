<h2> Hello {{$user->name}}</h2>
<p>
    Please click the reset button to reset your password 
    <a href="{{url('/reset/'.$user->email)}}">Reset Password</a>
</p>