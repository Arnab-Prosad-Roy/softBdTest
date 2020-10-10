<!doctype html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee List</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
  </head>
   


  

<body>

<div class="container">

    <h1>Employee List</h1>

    <div id="tag_container">

           @include('empDatas')

    </div>

</div>

  

<script type="text/javascript">
$(document).ready(function(){
   
  $.ajaxSetup({
    headers:{
      'X-CSRF-Token' : $("input[name=_token]").val()
    }
  });

  $('#editable').Tabledit({
    url:'{{ route("tabledit.action") }}',
    dataType:"json",
    columns:{
      identifier:[0, 'id'],
      editable:[[1, 'employee_no'], [2, 'name'], [3, 'designation_id', '{"1":"CEO", "2":"IT Officer", "3":"HR", "4":"Accountant", "5":"Senior IT Officer", "6":"Software Engineer", "7":"Sr. Software Engineer"}'], [4, 'department'], [5, 'company'], [6, 'salary'], [7, 'joining_date']]
    },
    restoreButton:false,
    onSuccess:function(data, textStatus, jqXHR)
    {
      if(data.action == 'delete')
      {
        $('#'+data.id).remove();
      }
    }
  });

}); 

//ajax paginate
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {

                return false;
            }else{

                getData(page);
            }
        }
    });

    $(document).ready(function()
    {
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
            getData(page);
        });
    });

    function getData(page){

        $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            datatype: "html"

        }).done(function(data){

            $("#tag_container").empty().html(data);

            location.hash = page;
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');

        });
    }

</script>

<script type="text/javascript">
 
</script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>