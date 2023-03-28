//-------------------------------------------------- register form ---------------
let client_section = document.getElementById("clientSection");
let empolyee_section = document.getElementById("empolyeeSection");

if(document.querySelector('input[name="options"]:checked').value=="client"){
    document.getElementById("basic-addon1").value="200-";
    client_section.style.display="block";
    empolyee_section.style.display="none";
       }else{
        document.getElementById("basic-addon1").value="100-";
        client_section.style.display="none";
        empolyee_section.style.display="block";
       }
  
  
  let radio=document.querySelectorAll('input[name="options"]');
  
  radio.forEach(element => {
    element.onchange=function(){
     if(document.querySelector('input[name="options"]:checked').value=="client"){
  document.getElementById("basic-addon1").innerHTML="200-";
  client_section.style.display="block";
  empolyee_section.style.display="none";

     }else{
      document.getElementById("basic-addon1").innerHTML="100-";

      client_section.style.display="none";
        empolyee_section.style.display="block";
     }
    }
  });
  