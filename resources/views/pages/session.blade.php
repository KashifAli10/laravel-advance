<center>
<h1> User Login </h1>

  <!-- to show errors in row we just write this    {{$errors}}  
to show error on the top we can use the following code
@if($errors->any())
@foreach ($errors->all() as $err)
<li>   {{$err}} </li>
@endforeach
@endif -->
       <form  action="session_login" method="POST"> 
	@csrf
       <input type="text" name="username"  placeholder="Enter user id">
       <br>

       <span style="color:red">  @error ('username') {{$message}} @enderror
       </span> 
       <br><br>

        <input type="password" name="password"  placeholder="Enter password">
       <br>
       <span style="color:red">  @error ('password') {{$message}} @enderror
       </span> 
       <br><br>

       <button type="submit"> login
                    
                     </button>

</form>
</center>