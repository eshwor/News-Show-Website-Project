
  function validate()
  {

     if( document.addPosts.postTitle.value == "" )
     {

        document.getElementById("postTitleErrorMsg").innerHTML = "Please Provide Your Post Title!";
        document.addPosts.postTitle.focus() ;
        return false;
     }
       if( document.addPosts.postAuthor.value == "" )
     {
        document.getElementById("postAuthorErrorMsg").innerHTML = "Please Provide Your Post Author!";
        document.addPosts.postAuthor.focus() ;
        return false;
     }
      
       if( document.addPosts.postContent.value == "" )
     {
       document.getElementById("postContentErrorMsg").innerHTML = "Please Provide Your Post Content!";
        document.addPosts.postContent.focus() ;
        return false;
     }
      if(document.addPosts.fileToUpload.value == "" )
    {
         alert("Mind it you are not selecting image for this post!");
        return true;
     }
  return true;  
  }
// this is for update validation only
    
 



//for delete error message
function postTitleErrorMsgDelete(){
document.getElementById("postTitleErrorMsg").innerHTML = "";
return true;
}

function postAuthorErrorMsgDelete(){
document.getElementById("postAuthorErrorMsg").innerHTML = "";
return true;
}

function postImageErrorMsgDelete(){
document.getElementById("postImageErrorMsg").innerHTML = "";
return true;
}

function postContentErrorMsgDelete(){
document.getElementById("postContentErrorMsg").innerHTML = "";
return true;
}


//Conformation for delete warning message
function conformForDelete(){
       var confirmation = confirm("Are you sure to delete this post ?");
    if(confirmation){
        return true;
    }
    else{
        return false;
    }

}
