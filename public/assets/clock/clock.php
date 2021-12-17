<!-- Clock Part 1 - Put Anywhere Before Part 2 -->

<script>
// Anytime Anywhere Web Page Clock Generator
// Clock Script Generated at
// http://www.rainbow.arch.scriptmania.com/tools/clock

function tS(){ x=new Date(tN().getUTCFullYear(),tN().getUTCMonth(),tN().getUTCDate(),tN().getUTCHours(),tN().getUTCMinutes(),tN().getUTCSeconds()); x.setTime(x.getTime()); return x; } 
function tN(){ return new Date(); } 
function lZ(x){ return (x>9)?x:'0'+x; } 
var fr=0,oT="lZ(tS().getHours())+':'+lZ(tS().getMinutes())+':'+lZ(tS().getSeconds())+' '+'UTC'";	
function dT(){ if(fr==0){ fr=1; document.write('<span id="tP">'+eval(oT)+'</span>'); } document.getElementById('tP').innerHTML=eval(oT); setTimeout('dT()',1000); } 

</script>

<!-- Clock Part 1 - Ends Here  -->


<!-- Clock Part 2 - This Starts/Displays Your Clock -->

<script>dT();</script>

<!-- Clock Part 2 - Ends Here -->

