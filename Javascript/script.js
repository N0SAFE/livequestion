window.onload = link1

function link1() {
    document.querySelector("#firstlink").classList.remove("display-none");
    document.querySelector("#secondlink").classList.add("display-none");
    document.querySelector("#thirdlink").classList.add("display-none");
    document.querySelector("#firstButton").classList.add("cadre");
    document.querySelector("#secondButton").classList.remove("cadre");
    document.querySelector("#thirdButton").classList.remove("cadre");
}

function link2() {
    document.querySelector("#firstlink").classList.add("display-none");
    document.querySelector("#secondlink").classList.remove("display-none");
    document.querySelector("#thirdlink").classList.add("display-none");
    document.querySelector("#firstButton").classList.remove("cadre");
    document.querySelector("#secondButton").classList.add("cadre");
    document.querySelector("#thirdButton").classList.remove("cadre");
}

function link3() {
    document.querySelector("#firstlink").classList.add("display-none");
    document.querySelector("#secondlink").classList.add("display-none");
    document.querySelector("#thirdlink").classList.remove("display-none");
    document.querySelector("#firstButton").classList.remove("cadre");
    document.querySelector("#secondButton").classList.remove("cadre");
    document.querySelector("#thirdButton").classList.add("cadre");
}
function showDiv1(data, name) {
    document.getElementById(name).style.visibility = data;
}
function timeOut(data, nameing, timeout=1000)
setTimeout("showDiv1('"+data+"'", "'"+nameing+"')", timeout);
function showDiv2() {
    document.getElementById("div2").style.visibility = "visible";
}
setTimeout("showDiv2()", 30000); // aprés 30 secs