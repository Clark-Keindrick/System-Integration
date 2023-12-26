window.onload = function(){
    const sidebar = document.querySelector(".sidebar");
    const closeBtn = document.querySelector("#btn");
    const searchBtn = document.querySelector(".bx-search")

    closeBtn.addEventListener("click",function(){
        sidebar.classList.toggle("open")
        menuBtnChange()
    })

    searchBtn.addEventListener("click",function(){
        sidebar.classList.toggle("open")
        menuBtnChange()
    })

    function menuBtnChange(){
        if(sidebar.classList.contains("open")){
            closeBtn.classList.replace("bx-menu","bx-menu-alt-right")
        }else{
            closeBtn.classList.replace("bx-menu-alt-right","bx-menu")
        }
    }

    document.getElementById('addUser').addEventListener('click', function () {
        // Toggle visibility of the profile details and security details sections
        document.getElementById('profileDetailsHeading').style.display = 'block';
        document.getElementById('profileDetailsForm').style.display = 'block';
        document.getElementById('panelFooter').style.display = 'block';
      });

    function logout() {
        
     alert('Logging out...');  
    }
  
    function switchAccount() {
        
     alert('Switching account...'); 
    }
}