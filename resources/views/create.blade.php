<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script
          src="https://code.jquery.com/jquery-3.6.3.min.js"
          integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
          crossorigin="anonymous">
        </script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>




     
       <!-- -->
       <style>
form{
  border:1px solid #cdcaca;
 
}
body{
   
}
.header{
  height:60px;
  width:100% !important;
  border:1px solid #cdcaca;
   background:#f5f5f5;
   padding-top: 5px;
   padding-left: 10px;
}

.h2{
  padding:5px 0px 0px 10px;

}



label{
  padding :5px;
}
select{
  margin-bottom: 15px;
}
#RequestType{
  margin-right:10px;
  font-size: 15px;
}
.btn1{
  margin-left: 475px;
  padding-top:2px;
}


span{
  font-size:20px; 
}
input{
  font-size:10px;
}



       </style>
    </head>
     <body>
      
         
            
               {{csrf_field()}}
                    
                         <div class="header">
                           <!--  <button style="background: blue"><a href="http://localhost/newproject/blog/public/edit" style="color: white !important">Homepage</a></button> -->
                          <h2></h2>
                          </div>
                         
                       

 <div> 
                           
                            <h2 class="h2"> 

                       
                               <label for="" class="form-label" id="" style="margin-left: 32px"><span>Departments</span></label>
                        
                              <select class=""  name="RequestType" id="departmenttype" style="width:150px;font-size:18px;padding-left:0px" >
                                 @foreach($show2 as $shows) 
                              <option value="id">{{$shows->value}}</option>
                                @endforeach
                               </select>
                                
                                 <label for="" class="form-label"  style="margin-left: 32px"><span>Country</span></label>
                        
                              <select class=""  name="country" id="country" style="width:150px;font-size:18px;padding-left:0px" >
                               
                                @foreach($show as $country) 
                              <option value="country_id">{{$country->country}}</option>
                                @endforeach
                              
                                
                               </select>
                               
   
                           <label for="" class="form-label"  style="margin-left: 32px"><span>Employee-type</span></label>
                        
                              <select class=""  name="Type" id="Type" style="width:150px;font-size:18px;padding-left:0px" >
                              
                                @foreach($show1 as $emp) 
                              <option value="id">{{$emp->value}}</option>
                                @endforeach
   
                           </select>
                          
                        
                               <button  class="btn btn-success" id="submit"  style=" padding-top:0px; margin-left:105px"><span>submit</span></button>
                    
                        </h2>
                 <table class="table table-striped table-hover  border"  >
                 <thead style="background: pink">
                  <tr><th>Id</th>
                     <th></th>
                   <th>Start_date</th>
                  
                 
                 </tr>
                </thead>
                 <tbody id="ajax">
                     
              </tbody>
      </table>
                       
                      </div>
                    
                         </div>

         
           

     </body>
    <script>
    $("#submit").click(function(){
      console.log(123);
      var country=$("#country").val();
    /*  var country=$("#country").val();
       */
     
     
      $.ajax({
        url:"{{url('date')}}",
        type:"get",
        data:{
           country:country/*,country:country,Type:Type*/
        },
        success:function(tabledata){
          console.log(tabledata);
          $("#ajax").empty();
           var tbbody = "";
          for(var i=0;i< tabledata.length;i++){
            tbbody += "<tr>";
              tbbody += "<td>"+ tabledata[i].id +"<td>";
                tbbody += "<td>"+ tabledata[i].value +"<td>";
                tbbody += "<tr>";

          } $("#ajax").html(tbbody);
        },
        error:function(tabledata){
          console.log(tabledata);
        }
      })
    });
 
</script>
</html>
