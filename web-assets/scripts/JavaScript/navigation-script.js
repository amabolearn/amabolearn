function openMenu() {
  document.getElementById('sideBAR').style.display = 'block';
 } 
 function closeMenu() {
 document.getElementById('sideBAR').style.display = 'none'; 
}

function showSubj() {
  var x = document.getElementById("subj-links");
  
  if (x.className.indexOf("w3-show") == -1) { 
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}
