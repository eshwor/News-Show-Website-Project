//Form Validation for Edit Posts 
function validateForUpdate(){
      if( document.editPosts.postTitle.value == "" )
     {

        document.getElementById("postTitleErrorMsg").innerHTML = "Please Provide Your Post Title!";
        document.editPosts.postTitle.focus() ;
        return false;
     }
       if( document.editPosts.postAuthor.value == "" )
     {
        document.getElementById("postAuthorErrorMsg").innerHTML = "Please Provide Your Post Author!";
        document.editPosts.postAuthor.focus() ;
        return false;
     }
      
       if( document.editPosts.postContent.value == "" )
     {
       document.getElementById("postContentErrorMsg").innerHTML = "Please Provide Your Post Content!";
        document.editPosts.postContent.focus() ;
        return false;
     }
        if(document.editPosts.fileToUpload.value == "" )
    {
        return true;
     }
      
  return true;  
  }
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