<h1> Members List
</h1>

<table border="2">
                   <tr> 
                   	<th> Id</th>  
                      <th> Name</th>  
                    <th> Email </th>
                     <th> password</th>
                     <th> Operation</th>
                   </tr>
      <!-- dynamic data from db. for each loop first $ table_name as an item   -->          
        @foreach ($data as $item)
        
        	<tr>
        		<td> {{$item->id}}     </td> 
            <td> {{$item->name}}     </td>   
            <td> {{$item->email}}     </td>  
            <td> {{$item->password}}     </td>  

        	
        	</tr>
         @endforeach
             


	</table>