<center>
<h1> User Login </h1>


       <form  action="addmember" method="POST"> 
	@csrf
       <input type="text" name="name"  placeholder="Enter user name">
       <br><br>

        <input type="text" name="email"  placeholder="Enter email">
       
       <br><br>
       <input type="password" name="password"  placeholder="Enter password">
       <br><br>
       

       <button type="submit"> Add Member
                    
                     </button>

</form>
</center>