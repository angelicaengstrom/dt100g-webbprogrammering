//funktion som återställer alla inmatningsfält
function clear() {
    "use strict";
    document.getElementById("businesstxt").value = "";
    document.getElementById("firstnametxt").value = "";
    document.getElementById("lastnametxt").value = "";
    document.getElementById("titeltxt").value = "";
    document.getElementById("phonetxt").value = "";
    document.getElementById("emailtxt").value = "";
    document.getElementById("backgroundselect").value = "lightblue";
    document.getElementById("colorselect").value = "black";
    document.getElementById("fontselect").value = "Verdana";
}

//funktion som kollar om alla inmatningsfält är tom eller inte
function empty() {
    "use strict";
    if (document.getElementById("businesstxt").value === "" &&
    document.getElementById("firstnametxt").value === "" &&
    document.getElementById("lastnametxt").value === "" &&
    document.getElementById("titeltxt").value === "" &&
    document.getElementById("phonetxt").value === "" &&
    document.getElementById("emailtxt").value === "") {
        return true;
    }
    return false;
}

//funktion som sätter visitkortets attribut beroende på vad inmatningsfält och rullgardinsmenyerna innehåller
function display_card() {
    "use strict";
    document.getElementById("resultbox").style.display = "block";
    document.getElementById("business").innerHTML = document.getElementById("businesstxt").value;
    document.getElementById("firstname").innerHTML = document.getElementById("firstnametxt").value;
    document.getElementById("lastname").innerHTML = document.getElementById("lastnametxt").value;
    document.getElementById("titel").innerHTML = document.getElementById("titeltxt").value;
    
    document.getElementById("phone").innerHTML = "Tfn " + document.getElementById("phonetxt").value;
    document.getElementById("email").innerHTML = "Epost: " + document.getElementById("emailtxt").value;
    
    if (document.getElementById("phonetxt").value === "") {
        document.getElementById("phone").innerHTML = "";
    }
    if (document.getElementById("emailtxt").value === "") {
        document.getElementById("email").innerHTML = "";
    }

    document.getElementById("resultbox").style.background = document.getElementById("backgroundselect").value;
    document.getElementById("resultbox").style.color = document.getElementById("colorselect").value;
    document.getElementById("resultbox").style.fontFamily = document.getElementById("fontselect").value;
}

//Lyssnare som exekveras när DOM laddats upp för html dokumentet
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("resultbox").style.display = "none";

    //Hanterar klick event för knappen med id "print"
    document.getElementById("print").addEventListener("click", function() {
        if (!empty()) {
            //Visar visitkortet och döljer inmatningsfältena
            display_card();
            document.getElementById("orderbox").style.display = "none";
        }
        clear();
    })

     //Hanterar klick event för knappen med id "clear"
    document.getElementById("clear").addEventListener("click", function() {
        clear();
    })
})