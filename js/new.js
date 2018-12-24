var response ='';
function getMatches (date) {
    // var keyID = '7c59dfd7f4a44181a6691c5baca090a8';
    var keyID = '2f6e926a95a54f3da3c3310573bfb797';
    if(!date) {
        var d = new Date();
        var curr_date = d.getDate();
        var curr_month = d.getMonth() + 1;
        var curr_year = d.getFullYear();
        var dat = curr_year + "-" + curr_month + "-" + curr_date;
    }else {
        var dat = date;
    }
    $.ajax({
        url: "https://api.fantasydata.net/v3/soccer/scores/json/GamesByDate/" + dat,
        beforeSend: function(xhrObj){
            // Request headers
            xhrObj.setRequestHeader("Content-Type","application/json");
            xhrObj.setRequestHeader("Ocp-Apim-Subscription-Key",keyID);
        },
        type: "GET",
        // Request body
        data: "",
    })
        .done(function(data) {
            response = data;
            renderTableMatches(response);

        })
        .fail(function() {
            alert("error");
        });
};

//    getMatches();

var activities = document.getElementById("days");

activities.addEventListener("change", function() {
    var options = activities.querySelectorAll("option");
    var count = options.length;
    if(typeof(count) === "undefined" || count < 2)
    {
        addActivityItem(options);
    }
    let date = (activities.value);

    getMatches(date);

}, true);
function goBack() { window.history.back()
}

function addActivityItem(e) {
    var date = e.value;

}

function matchTime (string) {
   string =  string.replace(/T/, ' ');
   string =  string.replace(/-/g, '/');

   let t = (new Date(string).getTime()/1000);
    t += 120*60;
    var date = new Date(t*1000);
    var hours = date.getHours();
    var minutes = "0" + date.getMinutes();

    var formattedTime = hours + ':' + minutes.substr(-2) ;


    return formattedTime;
}

function renderTableMatches(obj) {
    let txt ='';
    console.log(obj);
    txt += "<table border='1'>";
    for (x in obj) {
        if (obj[x].Status !== 'Canceled') {
            txt += "<tr><td>" + matchTime( obj[x].DateTime ) + "</td>";
            if (obj[x].Status == 'InProgress') {
                txt += "<td>" + obj[x].HomeTeamName  + "  "+ obj[x].HomeTeamScore + " - " + obj[x].AwayTeamScore + " "  + obj[x].AwayTeamName  + "</td>";
            }
            else {
                txt += "<td>" + obj[x].HomeTeamName  + " - " + obj[x].AwayTeamName  + "</td>";
            }
            txt += "</tr>";
        }
    }
    txt += "</table>";
    document.getElementById("outside").innerHTML = txt;
}


function calendarSelect (){
    var timeInMs = Date.now();
    // console.log(timeInMs);
    // var date = new Date(timeInMs);
    var selects = [];
    var limit = -3;
    while(limit < 4) {
    var ss = 86400 * 1000 * limit;

    let tesst = 0;

        tesst = parseInt(timeInMs) + parseInt(ss);

        // console.log(timeInMs);

        date = new Date(tesst);
        limit++;
        var curr_date = date.getDate();
        var curr_month = date.getMonth() + 1;
        var curr_year = date.getFullYear();
        var dat = curr_year + "-" + curr_month + "-" + curr_date;
        console.log(dat);
        selects.push(dat);
        tesst = 0;
    }
    return(selects);

}

function renderCalendar() {
    var selectArray = calendarSelect();
    var html ="";
    for (index in selectArray) {
        html += "<option class='day_item dropdown-item' value='"+ selectArray[index]+ "'>"+ selectArray[index] +"</option>";
    }
    html += "";
    console.log(html);
    document.getElementById("days").innerHTML = html;

}
renderCalendar();
