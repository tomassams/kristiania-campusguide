var bGenerateForm = true;
const columnSize = 5;
let lastRoom = null;

function process(roomObjectID) {
    var dateInput = document.getElementById('date-input');

    var dateInputString = dateInput.value; // get value from element
    var dateArray = dateInputString.split(/\s*\-\s*/g); // split string by forward slash
    var today = new Date(dateInputString);
    lastRoom = roomObjectID;
    
    var year = dateArray[0];

    var future = new Date(today);
    future.setDate(today.getDate() + 7);
    var futureStr = future.toLocaleDateString('en-US');
    // remove the slash
    var futureArray = futureStr.split(/\s*\/\s*/g);
    
    prependZero(futureArray);
    
    let nextWeekFormatted = futureArray[2] + futureArray[0] + futureArray[1];
    let thisWeekFormatted = dateArray[0] + dateArray[1] + dateArray[2];
    requestInfo(dateArray[2], thisWeekFormatted, nextWeekFormatted, roomObjectID);

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
    var obj = null; 
    
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            var timeEditObject = JSON.parse(xhttp.response);
            
            // remove unrelated instances
            for (let i = 0; i < timeEditObject.reservations.length; ++i) {
                let startdate = timeEditObject.reservations[i].startdate;
                let startdateArr = startdate.split(/\s*\.\s*/g);
                if (startdateArr[0] < day) {
                    let item = timeEditObject.reservations.splice(i, 1);
                }
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
    let url = part1 + roomObjectID + part2 + thisWeek + part3 + nextWeek + part4;
    
    xhttp.open("GET", url, true);
    xhttp.send();
    
    return obj;
}

// Generates the form with rows and columns based on
// the number of reservations found in timeedit
function generateForm(timeEditObject) {
    let rowSize = timeEditObject.reservations.length;
    let table = document.getElementById('content-table');

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
    let table = document.getElementById('content-table');

    for (let i = 0; i < rowSize; ++i) { 
        table.rows[i+1].cells[0].innerHTML = timeEditObject.reservations[i].startdate;
        table.rows[i+1].cells[1].innerHTML = timeEditObject.reservations[i].starttime;
        table.rows[i+1].cells[2].innerHTML = timeEditObject.reservations[i].columns[0];
        table.rows[i+1].cells[3].innerHTML = timeEditObject.reservations[i].columns[1];
        table.rows[i+1].cells[4].innerHTML = timeEditObject.reservations[i].columns[2];
    }
}

function emptyForm() {
    let table = document.getElementById('content-table');
    table.innerHTML = '';
}

function generateHeader() {
    let table = document.getElementById('content-table');
    let header = table.createTHead();
    let row = header.insertRow(0);
    let cell = row.insertCell(0);
    cell.innerHTML = '<b>Dato</b>';
    cell = row.insertCell(1);
    cell.innerHTML = '<b>Tid</b>';
    cell = row.insertCell(2);
    cell.innerHTML = '<b>Emne</b>';
    cell = row.insertCell(3);
    cell.innerHTML = '<b>Klasse/Student</b>';
    cell = row.insertCell(4);
    cell.innerHTML = '<b>Aktivitet</b>';
    header.style.backgroundColor = '#000000';
    header.style.color = '#FFFFFF';
}

function previousRoom() {
    process(lastRoom);
}