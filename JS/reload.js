
//start
function start() 
{
    // Pobierz elementy diva
    var wyborDiv = document.getElementById("wybor");
    var plikDiv = document.getElementById("plik");
    var tekstDiv = document.getElementById("tekst");
    var wynikiDiv = document.getElementById("wyniki");
    
    // Podmień zawartość divów
    wyborDiv.style.display="block";
    plikDiv.style.display="none";
    tekstDiv.style.display="none";
    wynikiDiv.style.display="none";
}

//plik
function plik() 
{
    var wyborDiv = document.getElementById("wybor");
    var plikDiv = document.getElementById("plik");

    wyborDiv.style.display="none";
    plikDiv.style.display="block";
}

//wpisywanie
function tekst() 
{
    var wyborDiv = document.getElementById("wybor");
    var tekstDiv = document.getElementById("tekst");
    
    wyborDiv.style.display="none";
    tekstDiv.style.display="block";  
}

//wyniki
function wyniki()
{
    var wyborDiv = document.getElementById("wybor");
    var plikDiv = document.getElementById("plik");
    var tekstDiv = document.getElementById("tekst");
    var wynikiDiv = document.getElementById("wyniki");

    wyborDiv.style.display="block";
    plikDiv.style.displey="none";
    tekstDiv.style.display="none";
    wynikiDiv.style.display="none";

}


//back
function back() 
{
    var wyborDiv = document.getElementById("wybor");
    var plikDiv = document.getElementById("plik");
    var tekstDiv = document.getElementById("tekst");
    var wynikiDiv = document.getElementById("wyniki");
    
    wyborDiv.style.display="block";
    plikDiv.style.display="none";
    tekstDiv.style.display="none";
    wynikiDiv.style.display="none";
}



