<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       <meta charset="utf-8">
       <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

                       <!--  css/datepicker.css -->

    <link href="{{url('css/datepicker.css')}}" rel="stylesheet">
                           
                           <!--   js/datepicker.js -->

       <script src="{{url('js/datepicker.js')}}" rel="stylesheet"></script>
 


     

       <style>

       </style>
    </head>
      <body>
       
        {{csrf_field()}}
           <div class="header">
             <h2>
             </h2>
           </div>
                

                                <label for="" class="form-label"  style="margin-left: 7px"><span>CompanyId</span></label>
                        
                              <select class=""  name="CompanyName" id="CompanyName" style="width:170px;font-size:18px;padding-left:0px;margin-left: 1px" >
                               <option value="" selected disabled>--Select Id--</option>
                                @foreach($companyid as $company) 
                                           <option value="{{$company->company_id}}">{{$company->company_id}}</option>
                                             @endforeach
                                 
                              </select>
                                                                 
                                                                    <!-- Country -->

 <div id="body">
                                      <label for="" class="form-label"  style="margin-left: 32px"><span>Country</span></label>
                        
                                         <select class=""  name="country" id="country" style="width:170px;font-size:18px;padding-left:0px">
                                           <option value="" selected disabled>--Select Country--</option>
                                             @foreach($show as $country) 
                                           <option value="{{$country->id}}">{{$country->id}}-{{$country->country}}</option>
                                             @endforeach
                                         </select>
                                                                         <!-- Departments -->  


                  <label for="" class="form-label"  style="margin-left: 32px"><span>Departments</span></label>
                        
                              <select class=""  name="RequestType" id="departmenttype" style="width:225px;font-size:18px;padding-left:0px" >
                               <option value="" selected disabled>--Select Department--</option>
                                 @foreach($show2 as $shows) 
                               <option value="{{$shows->id}}">{{$shows->value}}</option>
                                @endforeach
                              </select>

                 
                                                                           <!--  Employee-type -->

                                  <label for="" class="form-label"  style="margin-left: 32px"><span>Employee-type</span></label>
                        
                                    <select class=""  name="Type" id="Type" style="width:230px;font-size:18px;padding-left:0px" >
                                      <option value="" selected disabled>--Select Employee-Type--</option>
                                        @foreach($show1 as $emp) 
                                      <option value="{{$emp->id}}">{{$emp->value}}</option>
                                        @endforeach
   
                                   </select>

                                                                          

                               
                                            <span style="margin-left:10px">Start-Date: <input type="text"  name="startdate" id="datepicker" style="height:25px; font-size:15px" autocomplete="off"></span>
                                              <span style="margin-left:10px">End-Date: <input type="text"  name="enddate" id="datepicker1" style="height:25px; font-size:15px" autocomplete="off"></span>
                                                 

                                   <select class=""  name="" id="date_select" style="width:140px;font-size:18px;padding-left:0px" >
                                      <option value="0" width:170px>--Select Date--</option>
                                        <option value="1" class="yesterday">Today</option>
                                           <option value="7"id="Last7days">Last-7days</option>
                                             <option value="30">Last-30days</option>
                                                <option value="365">Last-year</option>
                                               
                                                   <option value="2550">Last-7-years</option>
                                                     <option value=" 3650">Last-10-years</option>

                                  </select>


                                          <!--  <span style="margin-left:10px">End-Date: <input type="text" name="enddate" id="         
                                            datepicker1" style="height:25px;font-size:15px" autocomplete="off"></span> -->
                         
                        
                                              <button  class="btn btn-success" id="submit"  style=" padding-top:0px; margin-left:5px;margin-bottom:6px;height:30px"><span>submit</span></button>
                                              <input type="Reset" id="btnReset" value="Reset" onclick="Reset();"  style=" padding-top:0px; margin-left:0px;margin-bottom:6px;height:28px" />
                                              
                    
                           <div class="container">
                             <table class="table table-bordered"  >
                                <thead style="background: pink">
                                   <tr>
                                     <th>Id</th>
                                      <th>CompanyId</th>
                                     <th>First Name</th>
                                     <th>Last Name</th>
                                     <th>Department</th>
                                     <th>Employee_type</th>
                                     <th>Work_location</th>
                                     <th>Start_date</th>
                                   </tr>
                                 <tbody id="ajax">
                              
                                 </tbody>
                           </div>
            </div>
    </body>


    <script>
    // $("#country").onchange=(function(){
    //   console.log(123);
    //   var country=$("#country").val();
    /*  var country=$("#country").val();

       */
       $('#submit').on('click', function(){
          myFunction();
       });
       function myFunction() {
        
        var country = $("#country").val();
        var department = $("#departmenttype").val();
        var Type = $("#Type").val();
        var startdate=$("#datepicker").val();
        var enddate=$("#datepicker1").val();
  
  $.ajax({
        url:"{{url('date')}}",
        type:"get",
        data:{
           country:country,department: department,Type:Type, startdate:startdate,enddate:enddate
        },
        success:function(data){
          console.log(data);
     
           var tbbody = "";
          for(var i=0;i< data.length;i++){
            tbbody += "<tr>";
            
              tbbody += "<td>"+ data[i].id +"</td>";
               tbbody += "<td>"+ data[i].company_name +"</td>";
                tbbody += "<td>"+ data[i].fname +"</td>";
                  tbbody += "<td>"+ data[i].lname +"</td>";
                    tbbody += "<td>"+ data[i].department +"</td>";
                      tbbody += "<td>"+ data[i].configurations_value +"</td>";
                        tbbody += "<td>"+ data[i].workcountry +"</td>";
                          tbbody += "<td>"+ data[i].start_date +"</td>";
                            tbbody += "</tr>";

          } $("#ajax").html(tbbody);
        },
        error:function(data){
          console.log(data);
        }
      })
   }
 
</script>
<script>
  $('#date_select').on('change',function(){
  var date_select=$('#date_select').val();
  if(date_select==0){

  }






if(date_select==1){
      
        let today= new Date();
    $("#datepicker").val(today.getMonth()+1+'/'+today.getDate()+'/'+today.getFullYear());
    $("#datepicker1").val(today.getMonth()+1+'/'+today.getDate()+'/'+today.getFullYear());
  }
  if(date_select==7){
    
        let sevendays= new Date();
        let today= new Date();
        sevendays.setDate(sevendays.getDate()-7);

    $("#datepicker").val(sevendays.getMonth()+1+'/'+sevendays.getDate()+'/'+sevendays.getFullYear());
    $("#datepicker1").val(today.getMonth()+1+'/'+today.getDate()+'/'+today.getFullYear());
  }
   if(date_select==30){
    
        let sevendays= new Date();
        let today= new Date();
        sevendays.setDate(sevendays.getDate()-30)

    $("#datepicker").val(sevendays.getMonth()+1+'/'+sevendays.getDate()+'/'+sevendays.getFullYear());
    $("#datepicker1").val(today.getMonth()+1+'/'+today.getDate()+'/'+today.getFullYear());
  }
  if(date_select==365){
     
        let sevendays= new Date();
        let today= new Date();
        sevendays.setDate(sevendays.getDate()-365)

    $("#datepicker").val(sevendays.getMonth()+1+'/'+sevendays.getDate()+'/'+sevendays.getFullYear());
    $("#datepicker1").val(today.getMonth()+1+'/'+today.getDate()+'/'+today.getFullYear());
  }
  if(date_select==2550){
      
        let sevendays= new Date();
        let today= new Date();
        sevendays.setDate(sevendays.getDate()-2557)

    $("#datepicker").val(sevendays.getMonth()+1+'/'+sevendays.getDate()+'/'+sevendays.getFullYear());
    $("#datepicker1").val(today.getMonth()+1+'/'+today.getDate()+'/'+today.getFullYear());
  }
  if(date_select==3650){
      
        let sevendays= new Date();
        let today= new Date();
        sevendays.setDate(sevendays.getDate()-3652)

    $("#datepicker").val(sevendays.getMonth()+1+'/'+sevendays.getDate()+'/'+sevendays.getFullYear());
    $("#datepicker1").val(today.getMonth()+1+'/'+today.getDate()+'/'+today.getFullYear());
  }
//   if(date_select==0){
//       // $("#datepicker").prop("disable",true);
//       //   $("#datepicker1").prop("disable",true);
//        const d = new Date();
// d.setFullYear(0000, 00, 00);
// document.getElementById("datepicker").innerHTML = d;
// document.getElementById("datepicker1").innerHTML = d;

    // $("#datepicker").val();
    // $("#datepicker1").val();
 
 
  })
</script>
<script>

    function Reset() {
      var dropDown = document.getElementById("CompanyName");
          dropDown.selectedIndex = 0;
        var dropDown = document.getElementById("date_select");
        dropDown.selectedIndex = 0;
        var dropDown = document.getElementById("country");
        dropDown.selectedIndex = 0;
         var dropDown = document.getElementById("departmenttype");
         dropDown.selectedIndex = 0;
          var dropDown = document.getElementById("Type");
          dropDown.selectedIndex = 0;
          var dropDown = document.getElementById("datepicker");

// $dropDown = $("#date_select");
//         $dropDown.selectedIndex = 0;
//          $dropDown = ("#country");
//         $dropDown.selectedIndex = 0;
//           $dropDown = ("#departmenttype");
//          $dropDown.selectedIndex = 0;
//            $dropDown = ("#Type");
//           $dropDown.selectedIndex = 0;

        
    }

  </script>
  <script>

    // $("#country").onchange=(function(){
    //   console.log(123);
    //   var country=$("#country").val();
    /*  var country=$("#country").val();

       */
       $('#CompanyName').on('change',function(){
          myFunctions();
       });
       function myFunctions() {
         var CompanyName = $("#CompanyName").val();
        
  
  $.ajax({
        url:"{{url('Autofilldropdowndata')}}",
        type:"get",
        data:{
           CompanyName:CompanyName
        },
        headers: {'XSRF-TOKEN': $('meta[name="_token"]').attr('content')},
        success:function(data){
            // var ConfigDepartment="CompanyName";
            // var ConfigEmployeeType="CompanyName";
            // var WorklocationCountry="CompanyName";

           $('#country').html('<option value="" selected disabled>--Select Country--</option>');
                        $.each(data.WorklocationCountry,function (key,value) {
                            $("#country").append('<option value="' + value
                                .id + '">' + value.country + '</option>');
                            console.log(value);
                        });
                         $('#departmenttype').html('<option value="" selected disabled>--Select Department--</option>');
                        $.each(data.ConfigDepartment,function (key,value) {
                            $("#departmenttype").append('<option value="' + value
                                .id + '">' + value.value + '</option>');
                        });
                         $('#Type').html('<option value="" selected disabled>--Select Employee-type--</option>');
                        $.each(data.ConfigEmployeeType,function (key,value) {
                            $("#Type").append('<option value="' + value
                                .id + '">' + value.value + '</option>');
                        });console.log(data);
     
          
        },
        error:function(data){
          console.log(data);
        }
      })
   }
 

  </script>
  
</html>
