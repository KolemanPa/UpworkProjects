
//Javascript.js FIle for rockets and stuff
$(document).ready(function(){
    console.log("line 2");
    var httpRequestNextFive = new XMLHttpRequest();
    httpRequestNextFive.open("get", "https://launchlibrary.net/1.4/launch/next/6");
    httpRequestNextFive.send();
    
    
    
    
    var httpRequestFalcon = new XMLHttpRequest();
    httpRequestFalcon.open("get", "https://launchlibrary.net/1.4/launch/Falcon");
    httpRequestFalcon.send();
    // httpRequestNextFive.onreadystatechange = rockets;


    var httpRequestAriane = new XMLHttpRequest();
    httpRequestAriane.open("get", "https://launchlibrary.net/1.4/launch/ariane");
    httpRequestAriane.send();
    
    
    
    
    // var i =0;
    // function rockets(){
    
    //     var maxRocket = JSON.parse(httpRequestNextFive.responseText);
    //     var max = maxRocket.count;
    //     console.log(max);
    //     for(var i = 0; i<max; i++){
    //     if(httpRequestNextFive.readyState == 4 && httpRequestNextFive.status == 200){
    //         var rocketObj = JSON.parse(httpRequestNextFive.responseText);
    //         document.getElementById(`rocket${i}name`).innerHTML = rocketObj.launches[i].rocket.name;
    //         document.getElementById(`rocket${i}Info`).innerHTML = rocketObj.launches[i].windowstart;
    //     };
    //     };
    // };
    
    console.log("HEY");
    
        $("button.nextSix").click(function(){
            console.log("you made it here")
            var maxRocket = JSON.parse(httpRequestNextFive.responseText);
            var maxFive = maxRocket.count;
            for(var i = 0; i<maxFive; i++){
            if(httpRequestNextFive.readyState == 4 && httpRequestNextFive.status == 200){
                console.log("can yo see this?");
                var rocketObj = JSON.parse(httpRequestNextFive.responseText);
                document.getElementById(`rocket${i}name`).innerHTML = rocketObj.launches[i].rocket.name;
                document.getElementById(`rocket${i}Info`).innerHTML = rocketObj.launches[i].windowstart;
            };
        };
        });
        
        
        
        
        $("button.nextSixFalcon").click(function(){
           var maxRocket = JSON.parse(httpRequestFalcon.responseText);
           var maxFalcon = maxRocket.count;
           console.log(3);
            for(var j = 0; j<6;j++){
                console.log(4);
                if(httpRequestFalcon.readyState == 4 && httpRequestFalcon.status == 200){
                    var falconObj = JSON.parse(httpRequestFalcon.responseText);
                    document.getElementById(`rocket${j}name`).innerHTML = falconObj.launches[j].name;
                    document.getElementById(`rocket${j}Info`).innerHTML = falconObj.launches[j].windowstart;
                }
           };
        });




        $("button.nextSixAriane").click(function(){
            var maxRocket = JSON.parse(httpRequestAriane.responseText);
            var maxFalcon = maxRocket.count;
            console.log(3);
             for(var j = 0; j<6;j++){
                 console.log(4);
                 if(httpRequestAriane.readyState == 4 && httpRequestAriane.status == 200){
                     var arianeObj = JSON.parse(httpRequestAriane.responseText);
                     document.getElementById(`rocket${j}name`).innerHTML = arianeObj.launches[j].name;
                     document.getElementById(`rocket${j}Info`).innerHTML = arianeObj.launches[j].windowstart;
                 }
            };
         });
    });