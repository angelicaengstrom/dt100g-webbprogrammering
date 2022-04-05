/*
Angelica Engström, TDTEA
Laboratory 2 - DT058G
2022-02-04
*/
"use strict";

document.addEventListener("DOMContentLoaded", function() {
    let channels = new Map();
    var audio = document.createElement("audio");

    let url = "http://api.sr.se/api/v2/channels?format=json";

    channels = fetch_channels(url);

    document.getElementById("searchbutton").addEventListener("click", function(){
        //Tar bort all text från rutan innan ny text adderas
        remove_txt();
        
        //Sätter rätt id beroende på kanal som valts
        let id = channels.get(document.getElementById("searchProgram").value)[0];
        
        audio.src = "http://sverigesradio.se/topsy/direkt/srapi/" + id + ".mp3";
        audio.play();

        let url = "http://api.sr.se/v2/scheduledepisodes?channelid=" + id + "&format=json";
        fetch_tableu(url);
    })
    
    document.getElementById("mainnavlist").addEventListener("click", function(event){
        if(event.target.id != "mainnavlist"){
            //Tar bort all text från rutan innan ny text adderas
            remove_txt();

            //Sätter rätt id beroende på kanal som valts
            let id = channels.get(event.target.id)[0];
            
            audio.src = "http://sverigesradio.se/topsy/direkt/srapi/" + id + ".mp3";
            audio.play();

            //Sätter select till samma val till det som trycktes på navigationslistan
            document.getElementById("searchProgram").value = event.target.id;

            //Skapar rubrik beroende på det tryckta objektet
            var h2 = document.createElement("h2");
            h2.innerHTML = event.target.id;
            document.getElementById("info").appendChild(h2);

            //Skapar underrubrik som matchar det tryckta objektet
            var h3 = document.createElement("h3");
            h3.innerHTML = channels.get(event.target.id)[1];
            document.getElementById("info").appendChild(h3);

            //Radbrytning efter underrubriken
            document.getElementById("info").appendChild(document.createElement("hr"));
            
            let url = "http://api.sr.se/api/v2/playlists/rightnow?channelid=" + id + "&format=json";
            fetch_playlist(url);
        }
    })

    document.getElementById("logo").addEventListener("click", function(){
        //Tar bort all text från rutan innan ny text adderas
        remove_txt();
        audio.pause();
    })
})

function fetch_channels(url){
    let data = new Map();

    let f = fetch(url);
    f.then(response => response.json())
    .then(d => {
        let size = `${d.pagination.size}`;
        for(var i = 0; i < size; i++){
            //Hämtar namn, id, tagline och image från API
            let name = `${d.channels[i].name}`;
            let info = [`${d.channels[i].id}`, `${d.channels[i].tagline}`];
            let img = `${d.channels[i].image}`;
            data.set(name, info);

            //Skapar alternativ till select per namn från API
            var option = document.createElement("option");
            option.value = name;
            option.innerHTML = name;
            document.getElementById("searchProgram").appendChild(option);
            
            //Skapar en bild och sätter dess attribut
            var image = document.createElement("img");
            image.id = name;
            image.src = img;
            image.style.width = "10%";
            image.style.height = "10%";
            image.style.float = "left";
            
            //Sätter attributet för innehållet i navigationslistan
            var li = document.createElement("li");
            li.innerHTML = image.outerHTML + name;
            li.id = name;
            li.style.margin = "10%";
            li.style = "a";
            document.getElementById("mainnavlist").appendChild(li);
        }
    })

    return data;
}

function remove_txt(){
    while(document.getElementById("info").firstChild){
        document.getElementById("info").removeChild(document.getElementById("info").firstChild);
    }
}

function fetch_tableu(url){
    //Hämtar innehåll från länken
    let f = fetch(url);
    f.then(response => response.json())
    .then(data => {
        var size = `${data.pagination.size}`;
        for(var i = 0; i < size; i++){
            //Skapar titel
            var h2 = document.createElement("h2");
            h2.innerHTML = `${data.schedule[i].title}`;
            document.getElementById("info").appendChild(h2);

            //Skapar beskrivning
            var h3 = document.createElement("h3");
            h3.innerHTML = `${data.schedule[i].description}`;
            document.getElementById("info").appendChild(h3);
    
            //Omformaterar datum till en läsbar brödtext
            var jsondate = `${data.schedule[i].starttimeutc}`;
            var date = new Date(jsondate.match(/\d+/)[0] * 1);
            var p = document.createElement("p");
            p.innerHTML = date;
            document.getElementById("info").appendChild(p);

            //Radbrytning efter varje innehåll
            document.getElementById("info").appendChild(document.createElement("hr"));
        }
    });
}

function fetch_playlist(url){
    //Hämtar innehåll från länken
    let f = fetch(url);
    f.then(response => response.json())
    .then(data => {
        //Sätter brödtext för föregående låt
        var p = document.createElement("p");
        p.innerHTML = "Previous song: " + `${data.playlist.previoussong.description}`;
        document.getElementById("info").appendChild(p);

        //Sätter brödtext för nuvarande låt
        var p2 = document.createElement("p");
        p2.innerHTML = "Right now: " + `${data.playlist.song.description}`;
        document.getElementById("info").appendChild(p2);
    })
}