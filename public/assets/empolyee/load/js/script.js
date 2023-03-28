

  function loadDoc(route) {
 
    const xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
    ;
       document.querySelector("div#app").innerHTML=this.responseText;
       console.log(this.responseText)

    };
    xhttp.open("GET",route);
    xhttp.send();
  }