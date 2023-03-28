


function refresh() {
 
    const xhttp3 = new XMLHttpRequest();

    xhttp3.onreadystatechange = function() {
     
      const obj = JSON.parse(this.responseText);
  
   document.getElementById("number_of_transactions_last_7_days").innerHTML=obj.number_of_transactions_last_7_days;
   document.getElementById("number_users_active").innerHTML=obj.number_users_active;
   document.getElementById("number_of_complaints").innerHTML=obj.number_of_complaints;


    };
    xhttp3.open("GET","/Admin/get/refresh");
    xhttp3.send();
  }

  setInterval(refresh, 10000);




  function loadDoc(route) {
 
    const xhttp3 = new XMLHttpRequest();
    
    xhttp3.onreadystatechange = function() {
     
       document.querySelector("div.content").innerHTML=this.responseText;
       $(".preloader").fadeOut();
    };
    xhttp3.open("GET",route);
    xhttp3.send();
  }