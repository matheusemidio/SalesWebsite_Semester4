//Revision History
//Matheus Emidio (1931358) 2021-05-01 Created file
//Matheus Emidio (1931358) 2021-05-02 Created functions to handle error, search and delete on the event of buttons being clicked.
//Matheus Emidio (1931358) 2021-05-02 Fixed the delete purchase 

function handleError(error)
{
    alert("An error occurred in the JavaScript code: " + error);
}
function search()
{
    try
    {
        //document.getElementById("replace").innerHTML = "Planche a neige";
        //alert("The button was clicked and the function was called!");
        var xhr = new XMLHttpRequest();
        var year = document.getElementById("year").value;        //since you are dealing with textbox, it's the value, not innerHtml
        //var body = document.getElementsByTagName("body")[0];
        //var div = document.getElementById("replace");
        //var table = document.createElement("table");
        //table.style.width = "100%";
        //table.setAttribute("border", "1");
        
        xhr.open("POST", "search-dates.php");     //preparing to call the page, but not calling
        //
        //specify that I am not sending binary data
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        
        //var tableBody = document.createElement("tbody");
        //Call this function everytime the state changes
        xhr.onreadystatechange = function()
        {
            /*
                states:
                    0=unitialized
                    1=loading
                    2=loaded
                    3=interactive
                    4=complete
             */
            //Use contants
            //stauts 200 = page found
            if(xhr.readyState == 4 && xhr.status == 200)
            {
                //alert("My page was loaded correctly");
                document.getElementById("replace").innerHTML = xhr.responseText;
            }
            //alert("The state of the variable changed: " + xhr.readyState);
            
        }
        //alert("Now I will send my request. ")
        xhr.send("year=" + year);
    }
    catch(myError)
    {
        handleError(myError);
    }
}

function deletePurchase(id)
{
     try
    {
        //document.getElementById("replace").innerHTML = "Planche a neige";
        //alert("The button was clicked and the function was called!");
        var xhr = new XMLHttpRequest();
        //var id = document.getElementsByClassName("purchaseId").innerHTML;        //since you are dealing with textbox, it's the value, not innerHtml
        var purchaseId = id;
        //var body = document.getElementsByTagName("body")[0];
        //var div = document.getElementById("replace");
        //var table = document.createElement("table");
        //table.style.width = "100%";
        //table.setAttribute("border", "1");
        
        xhr.open("POST", "delete.php");     //preparing to call the page, but not calling
        //
        //specify that I am not sending binary data
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        //var tableBody = document.createElement("tbody");
        //Call this function everytime the state changes
        xhr.onreadystatechange = function()
        {
            /*
                states:
                    0=unitialized
                    1=loading
                    2=loaded
                    3=interactive
                    4=complete
             */
            //Use contants
            //stauts 200 = page found
            if(xhr.readyState == 4 && xhr.status == 200)
            {
                search();
                //alert("My page was loaded correctly");
                //document.getElementById("replace").innerHTML = xhr.responseText;
            }
            //alert("purchaseid=" + id);
            //alert("The state of the variable changed: " + xhr.readyState);
            
        }
        //alert("Now I will send my request. ")
        xhr.send("purchaseId=" + purchaseId);
        
    }
    catch(myError)
    {
        handleError(myError);
    }
}

