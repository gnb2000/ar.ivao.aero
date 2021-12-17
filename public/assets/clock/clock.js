
function GetClock(){
now = new Date();

        var nhour = ((now.getUTCHours()<10) ? "0" : "")+ now.getUTCHours();
        var nmin = ((now.getUTCMinutes()<10) ? "0" : "")+ now.getUTCMinutes();
        var nsec = ((now.getUTCSeconds()<10) ? "0" : "")+ now.getUTCSeconds();

document.getElementById('clockbox').innerHTML=""+nhour+":"+nmin+":"+nsec+" UTC";
setTimeout("GetClock()", 1000);
}