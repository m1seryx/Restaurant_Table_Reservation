function ShowSidebar(){
  const sidebar = document.querySelector('.sidebar');
  sidebar.style.display = 'flex';
}
function HideSidebar(){
  const sidebar = document.querySelector('.sidebar');
  sidebar.style.display = 'none';

}


function logout(){
  let logOut = document.getElementById("logoutForm");
  logOut.style.display = "flex";
};

function cancel(){
  let logOut = document.getElementById("logoutForm");

  logOut.style.display = "none";
}