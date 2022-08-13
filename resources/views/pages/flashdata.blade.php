<center>
<h1> User Login </h1>

<!-- to show data saved for the user -->
@if(session('username'))
<h3> Data Saved for {{session ('username')}}</h3>
@endif

       <form  action="flashdata" method="POST"> 
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