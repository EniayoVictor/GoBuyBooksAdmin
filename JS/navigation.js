var header = document.getElementById("sideNavigation");
var btns = document.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  }
  );
}

var id = document.getElementById(this);
if (id == "homebtn") {
    var eliminate = document.getElementById("inventory")
    eliminate.classList.add("d-none")
}

function getID(button) {
    if (button.id == "homebtn") {
        var eliminate = document.getElementById("home")
        eliminate.classList.remove("d-none")
        var effect = document.getElementById("inventory")
        effect.classList.add("d-none")
    }
    else if(button.id == "inventorybtn"){
        var eliminate = document.getElementById("inventory")
        eliminate.classList.remove("d-none")
        var effect = document.getElementById("home")
        effect.classList.add("d-none")
    }
}
