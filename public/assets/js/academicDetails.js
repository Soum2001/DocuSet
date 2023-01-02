$(document).ready(function() {

    // $(".btn-success").click(function(){ 
    //     var html = $(".clone").html();
    //     $(".increment").after(html);
    // });

    // $("body").on("click",".btn-danger",function(){ 
    //     $(this).parents(".control-group").remove();
    // });
   
    var files = [];
    var file_name = [];
   $("#imageInput").change(function() {
    selDiv = document.querySelector("#selectedFiles");
       for(var i=0;i<this.files.length;i++)
       {     
            if(file_name.indexOf(this.files[i].name)==-1)
            {
              file_name.push(this.files[i].name);
              
              selDiv.innerHTML += this.files[i].name+"</br>";
            }
            
        }
       console.log(file_name);
   });

  });

