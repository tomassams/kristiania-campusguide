let bGenerateForm = true;
const columnSize  = 5;
let lastRoom      = null;

// for dynamic modal title
let roomMapping = [
    {id: 53, room: "F101"},
    {id: 57, room: "F103"},
    {id: 61, room: "F204"},
    {id: 62, room: "F205"},
    {id: 63, room: "F206"},
    {id: 64, room: "F207"},
    {id: 65, room: "F208"},
    {id: 66, room: "F209"},
    {id: 67, room: "F210"},
    {id: 58, room: "F201"},
    {id: 59, room: "F202"},
    {id: 60, room: "F203"},
    {id: 70, room: "F303"},
    {id: 71, room: "F304"},
    {id: 72, room: "F305"},
    {id: 73, room: "F306"},
    {id: 74, room: "F307"},
    {id: 75, room: "F308"},
    {id: 76, room: "F309"},
    {id: 77, room: "F310"},
    {id: 78, room: "F311"},
    {id: 68, room: "F301"},
    {id: 79, room: "F312"},
    {id: 69, room: "F302"}
];

function process(roomObjectID) {
    var dateInput       = document.getElementById('date-input'); // get the input object
    var dateInputString = dateInput.value;                       // get value from element
    var dateArray       = dateInputString.split(/\s*\-\s*/g);    // remove dash
    var today           = new Date(dateInputString);             // create a date object from string
    lastRoom            = roomObjectID;                          // last visited room is this one
    var future          = new Date(today);

    future.setDate(today.getDate() + 7);
    
    var futureStr   = future.toLocaleDateString('en-US');
    var futureArray = futureStr.split(/\s*\/\s*/g);              // remove slash

    prependZero(futureArray);
    
    // needs to be in yyyymmdd format for url
    let nextWeekFormatted = futureArray[2] + futureArray[0] + futureArray[1];
    let thisWeekFormatted = dateArray[0] + dateArray[1] + dateArray[2];
    // request data
    requestInfo(dateArray[2], thisWeekFormatted, nextWeekFormatted, roomObjectID);

    // find current room title
    let roomTitle = getRoomTitle(roomObjectID);
    
    // change modal title
    $('#modalLabel').text("Rom: " + roomTitle);

    // open the modal window
    if (!$('.floorplan-modal').is(':visible')) {
        $('.floorplan-modal').modal();
    }
}

// prepend a zero to day or month
function prependZero(futureArray) {
    if (futureArray[1].length < 2) {
        futureArray[1] = '0' + futureArray[1];
    }
    if (futureArray[0].length < 2) {
        futureArray[0] = '0' + futureArray[0];       
    }
    
    return futureArray;
}

// Requests information from timeedit
// based on the input from user.
function requestInfo(day, thisWeek, nextWeek, roomObjectID) {
    var xhttp = new XMLHttpRequest();
    var obj   = null; 
    
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            var timeEditObject = JSON.parse(xhttp.response);
            
            // remove unrelated instances
            let startdate = timeEditObject.reservations[0].startdate;
            let startdateArr = startdate.split(/\s*\.\s*/g);
            if (startdateArr[0] < day) {
                let item = timeEditObject.reservations.splice(0, 1);
            }
            
            if (bGenerateForm) {
                generateForm(timeEditObject);
                
                bGenerateForm = false;
            } else {
                emptyForm(timeEditObject);
                generateForm(timeEditObject);
            }
            
            fillForm(timeEditObject);
        }
    }
    
    // put together the URL
    const part1 = 'https://no.timeedit.net/web/westerdals/db1/student/ri.json?h=t&sid=3&objects=';
    const part2 = '.4&ox=0&p=';
    const part3 = '.x%2C';
    const part4 = '.x';
    let url     = part1 + roomObjectID + part2 + thisWeek + part3 + nextWeek + part4;
    
    xhttp.open("GET", url, true);
    xhttp.send();
    
    return obj;
}

// Generates the form with rows and columns based on
// the number of reservations found in timeedit
function generateForm(timeEditObject) {
    let rowSize = timeEditObject.reservations.length;
    let table   = document.getElementById('content-table');

    for (let i = 0; i < rowSize; ++i) {
        table.insertRow(0);
        for (let j = 0; j < columnSize; ++j) {
            table.rows[0].insertCell(j);
        }
    }    

    generateHeader();
}

function fillForm(timeEditObject) {
    let rowSize = timeEditObject.reservations.length;
    let table   = document.getElementById('content-table');

    for (let i = 0; i < rowSize; ++i) { 
        table.rows[i+1].cells[0].innerHTML = timeEditObject.reservations[i].startdate;
        table.rows[i+1].cells[1].innerHTML = timeEditObject.reservations[i].starttime;
        table.rows[i+1].cells[2].innerHTML = timeEditObject.reservations[i].columns[0];
        table.rows[i+1].cells[3].innerHTML = timeEditObject.reservations[i].columns[1];
        table.rows[i+1].cells[4].innerHTML = timeEditObject.reservations[i].columns[2];
    }
}

function emptyForm() {
    let table       = document.getElementById('content-table');
    table.innerHTML = '';
}

function generateHeader() {
    let table  = document.getElementById('content-table');
    let header = table.createTHead();
    let row    = header.insertRow(0);
    let cell   = row.insertCell(0);

    // insert cells
    cell.innerHTML = '<b>Dato</b>';
    cell = row.insertCell(1);
    cell.innerHTML = '<b>Tid</b>';
    cell = row.insertCell(2);
    cell.innerHTML = '<b>Emne</b>';
    cell = row.insertCell(3);
    cell.innerHTML = '<b>Klasse/Student</b>';
    cell = row.insertCell(4);
    cell.innerHTML = '<b>Aktivitet</b>';

    // style header
    header.style.backgroundColor = '#000000';
    header.style.color = '#FFFFFF';
}

function previousRoom() {
    process(lastRoom);
}

function getRoomTitle(roomID) {
    let title = "";

    roomMapping.forEach(function(element) {
        if (element.id === roomID) {
            title = element.room;
        }
    });

    return title;
}