// this for changing the class of nav element to active when page load
// depend on session nav active value

const xhttp0 = new XMLHttpRequest();
xhttp0.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {

document.querySelectorAll("ul.head_nav li").forEach(element =>{
    element.classList.remove("active");
 
 

 })
 if(this.responseText!=""){

   document.getElementById(this.responseText+"Nav").classList.add("active");

 }

  }
};
xhttp0.open("GET",'get_nav_active_session');
xhttp0.send();

// this method for changing the class of nav element to active when click on it
// depend on session nav active value
function ChangeNavActive(){
    
const xhttp0 = new XMLHttpRequest();
xhttp0.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {

document.querySelectorAll("ul.head_nav li").forEach(element =>{
    element.classList.remove("active");
 })
  document.getElementById(this.responseText+"Nav").classList.add("active");

  }
};
xhttp0.open("GET",'get_nav_active_session');
xhttp0.send();
}

// this for get Current Page Route from session for show last route i visit it  before reload page and locate this route in local storge
// depend on session page value

    const xhttp1 = new XMLHttpRequest();
    xhttp1.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

if(this.responseText==""){
  document.getElementById("dashboardNav").classList.add("active");
}

       localStorage.setItem("currRoute", this.responseText=="" ? "page/client/dashboardPage" : this.responseText);
       // i here call the function to make its code run after i set last route in local stroge
       run_after_get_session_value();
      }
    };
    xhttp1.open("GET",'getCurrentPageRoute');
    xhttp1.send();


// this to get the page that returned from  the route located in local storge 

    function run_after_get_session_value() {
      // $(".preloader").fadeIn();  
const xhttp2 = new XMLHttpRequest();
xhttp2.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
   
   document.querySelector("div.content").innerHTML=this.responseText;

    // $(".preloader").fadeOut();

  }
};

xhttp2.open("GET",localStorage.getItem("currRoute"));
xhttp2.send();
}


// this to get the page that returned from the route that i click on it  
function loadDoc(route) {
 
    const xhttp3 = new XMLHttpRequest();
    document.getElementById("scrollToOffset").click();
    xhttp3.onreadystatechange = function() {
     
       document.querySelector("div.content").innerHTML=this.responseText;
       ChangeNavActive();
    };
    xhttp3.open("GET",route);
    xhttp3.send();
  }


