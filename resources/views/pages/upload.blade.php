<h1> Uplaod File</h1>

<form action="upload" method="post" enctype="multipart/form-data">
@csrf
<input type="file" name="file" >

<button type="submit"> Upload file </button>  

</form>