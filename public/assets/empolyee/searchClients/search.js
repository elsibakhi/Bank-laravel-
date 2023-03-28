

function searchClient(page){


  
 const xhttp3 = new XMLHttpRequest();

 xhttp3.onreadystatechange = function() {

  if (this.readyState == 4 && this.status == 200) {

 
    let response = JSON.parse(this.responseText);

   if(response["state"]==0){


    let selectedID=response["user"]["personal_id"];
   let action = page == "transactions" ?   `
 
    <input type="radio" class="btn-check" name="personal_id" id="option1" value="${response["user"]["personal_id"]}" autocomplete="off"  required >
        <label class="btn btn-primary m-1" for="option1">Select</label>
    
     ` : page == "delete" ? `
        <!-- Button trigger modal -->
    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal1">
      Delete
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete a client</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           Are you sure ? 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a  id="deleteLink" type="button" class="btn btn-danger" >Delete</a>
          </div>
        </div>
      </div>
    </div>
        
        ` : page == "trash" ?  `<!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
          Restore
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Restore a client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
               Are you sure ? 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a id="restoreLink" type="button" class="btn btn-success"  >Restore</a>
              </div>
            </div>
          </div>
        </div>` : ``;


    document.querySelector("#clientTable").innerHTML=`
    <thead>
      
      <tr>
        <th>#</th>
  
        <th class="col-md-4 col-xs-4">Personal Id</th>
        <th class="col-md-5 col-xs-5">Name</th>
        <th class="col-md-5 col-xs-5"> Account Type</th>
       
      </tr>
      <tr class="warning no-result">
        <td colspan="4"><i class="fa fa-warning"></i> No result</td>
      </tr>
    </thead>
    <tbody>

  
  

  <tr >
    <th scope="row" >1</th>
    <td>${response["user"]["personal_id"]}</td>
    <td>${response["user"]["name"]}</td>
    <td>${response["user"]["account_type"]}</td>
    <td>
  <!-- Button trigger modal -->` + action +`


    </td>
    
  </tr> 

  
  

    </tbody>
`;

if(page=="delete"){
  document.getElementById("deleteLink").href=`delete/`+selectedID;
}else if (page=="trash"){
  document.getElementById("restoreLink").href=`restore/`+selectedID;
}


document.querySelector("#alertRes").innerHTML= ``;

   } else if(response["state"]==2){
    document.querySelector("#alertRes").innerHTML= `  <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>The client is not found</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>`;
  }
  
   
    

  }
   
 };


 if(page=="trash"){
  xhttp3.open("GET", "search/Clients/transaction"+document.querySelector("#searchInput").value +`/trash`);

 }else{

   xhttp3.open("GET", "search/Clients/transaction"+document.querySelector("#searchInput").value );

 }


 xhttp3.send();

}


